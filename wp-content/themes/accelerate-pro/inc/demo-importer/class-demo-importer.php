<?php
/**
 * Accelerate Demo Importer.
 *
 * @class    Accelerate_Demo_Importer
 * @version  1.0.0
 * @package  Importer/Classes
 * @category Admin
 * @author   ThemeGrill
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Accelerate_Demo_Importer Class.
 */
class Accelerate_Demo_Importer {

	/**
	 * Version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Plugin data.
	 * @var array
	 */
	public $plugin_data;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->plugin_data = array(
			'slug' => 'themegrill-demo-importer',
			'name' => __( 'ThemeGrill Demo importer', 'accelerate' ),
		);

		// Checks if ThemeGrill Demo Importer is installed.
		if ( class_exists( 'ThemeGrill_Demo_Importer' ) ) {
			$this->includes();

			// Hooks.
			add_action( 'admin_init', array( $this, 'admin_redirects' ) );
			add_filter( 'themegrill_demo_importer_installer', '__return_false' );
		} else {
			add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}
	}

	/**
	 * Include required core files.
	 */
	public function includes() {
		include_once( dirname( __FILE__ ) . '/demos/functions-demo-config.php' );
		include_once( dirname( __FILE__ ) . '/includes/functions-demo-importer.php' );
	}

	/**
	 * Handle redirects after install and updates.
	 */
	public function admin_redirects() {
		if ( get_transient( '_tg_demo_importer_activation_redirect' ) ) {
			delete_transient( '_tg_demo_importer_activation_redirect' );

			// If the user can import, send them to the demo importer page.
			if ( ( ! empty( $_GET['page'] ) && ! in_array( $_GET['page'], array( 'demo-importer' ) ) ) || ! is_network_admin() || ! isset( $_GET['activate-multi'] ) ) {
				wp_safe_redirect( admin_url( 'themes.php?page=demo-importer' ) );
				exit;
			}
		}
	}

	/**
	 * Add menu item.
	 */
	public function add_admin_menu() {
		add_theme_page( __( 'Demo Importer', 'accelerate' ), __( 'Demo Importer', 'accelerate' ), 'switch_themes', 'demo-importer', array( $this, 'demo_importer' ) );
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {
		$screen      = get_current_screen();
		$screen_id   = $screen ? $screen->id : '';
		$suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$assets_path = get_template_directory_uri() . '/inc/demo-importer/assets/';

		// Register Scripts.
		wp_register_style( 'tg-demo-importer', $assets_path . 'css/demo-importer.css', array(), self::VERSION );
		wp_register_script( 'tg-demo-importer', $assets_path . 'js/demo-importer' . $suffix . '.js', array( 'jquery', 'updates' ), self::VERSION, true );

		// Demo Importer appearance page.
		if ( 'appearance_page_demo-importer' === $screen_id ) {
			wp_enqueue_style( 'tg-demo-importer' );
			wp_enqueue_script( 'tg-demo-importer' );
		}
	}

	/**
	 * Demo Importer page output.
	 */
	public function demo_importer() {
		$theme = wp_get_theme();

		// Demo Views.
		include_once( dirname( __FILE__ ) . '/includes/views/html-admin-page-importer.php' );
	}
}

new Accelerate_Demo_Importer();
