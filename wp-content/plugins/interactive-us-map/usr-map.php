<?php
/*
Plugin Name: US REGIONAL MAP
Plugin URI: http://www.wpmapplugins.com/
Description: Customize each region (colors, link, etc) through the admin panel and use the shortcode in your page.
Version: 2.0
Author: WP Map Plugins
Author URI: http://www.wpmapplugins.com/
*/

class USR_Map {

	public function __construct(){
		$this->constant();
		$this->options = get_option( 'usr_map' );
		add_action( 'admin_menu', array($this, 'usr_map_options_page') );
	 	add_action( 'admin_footer', array( $this,'add_js_to_wp_footer') );
	 	add_action( 'wp_footer', array($this,'add_span_tag') );
		add_action( 'admin_enqueue_scripts', array($this,'init_admin_script') );
		add_shortcode( 'usr_map', array($this, 'usr_map') );
		$this->default = array(
			'borderclr' => '#6B8B9E',
			'visnames' => '#666666',
			'lakesfill' => '#66CCFF',
			'lakesoutline' => '#6B8B9E',
		);
		foreach (array(
			'STANDARD FEDERAL REGION I','STANDARD FEDERAL REGION II','STANDARD FEDERAL REGION III','STANDARD FEDERAL REGION IV','STANDARD FEDERAL REGION V','STANDARD FEDERAL REGION VI','STANDARD FEDERAL REGION VII','STANDARD FEDERAL REGION VIII','STANDARD FEDERAL REGION IX','STANDARD FEDERAL REGION X'
		) as $k=>$area) {
			$this->default['upclr_'.($k+1)] = '#E0F3FF';
			$this->default['ovrclr_'.($k+1)] = '#8FBEE8';
			$this->default['dwnclr_'.($k+1)] = '#477CB2';
			$this->default['url_'.($k+1)] = '';
			$this->default['turl_'.($k+1)] = '_self';
			$this->default['info_'.($k+1)] = $area;
			$this->default['enbl_'.($k+1)] = 1;
		}
		if(isset($_POST['usr_map']) && isset($_POST['submit-clrs'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['upclr_'.$i] = $_POST['upclr_all'];
				$_POST['ovrclr_'.$i] = $_POST['ovrclr_all'];
				$_POST['dwnclr_'.$i] = $_POST['dwnclr_all'];
				$i++;
			}
			update_option('usr_map', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['usr_map']) && isset($_POST['submit-url'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['url_'.$i] = $_POST['url_all'];
				$_POST['turl_'.$i] = $_POST['turl_all'];
				$i++;
			}
			update_option('usr_map', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}	
		if(isset($_POST['usr_map']) && isset($_POST['submit-info'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['info_'.$i] = $_POST['info_all'];
				$i++;
			}
			update_option('usr_map', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['usr_map']) && !isset($_POST['preview_map'])){
			update_option('usr_map', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['usr_map']) && isset($_POST['restore_default'])){
			update_option('usr_map', $this->default);
			$this->options = $this->default;
		}
		if(!is_array($this->options)){
			$this->options = $this->default;
		}
	}

	protected function constant(){
		define( 'USRMAP_VERSION', '1.0' );
		define( 'USRMAP_DIR', plugin_dir_path( __FILE__ ) );
		define( 'USRMAP_URL', plugin_dir_url( __FILE__ ) );
	}

	public function usr_map(){
		ob_start();
		include 'design/map.php';
		?>
		<script type="text/javascript">
			<?php include 'config.php'; ?>
		</script>
		<?php
		wp_enqueue_style( 'usr-mapstyle-frontend', USRMAP_URL . 'map-style.css', false, '1.0', 'all' );
		wp_enqueue_script( 'usr-map-interact', USRMAP_URL . 'map-interact.js', array('jquery'), 10, '1.0', true );
		$html = ob_get_clean();
		return $html;
	}

	public function usr_map_options_page() {
		add_menu_page('US Reg. Map', 'US Reg. Map', 'manage_options', 'usr-map-', array($this, 'options_screen'), USRMAP_URL . 'images/map-icon.png');
	}

	public function admin_ajax_url(){
		$url_action = admin_url( '/' ) . 'admin-ajax.php';
		echo '<div style="display:none" id="wpurl">'. $url_action.'</div>';
	}

	public function options_screen(){ ?>
		<script type="text/javascript">
			<?php include 'config.php'; ?>
		</script>
	<?php include 'design/admin.php';
	}

	public function add_js_to_wp_footer(){ ?>
	<span id="tipusr" style="margin-top:-32px"></span>
	<?php }

	public function add_span_tag(){
		?>
		<span id="tipusr"></span>
		<?php
	}

	public function stripslashes_deep($value) {
		$value = is_array($value) ?
		array_map(array($this, 'stripslashes_deep'), $value) : stripslashes($value);
		return $value;
	}

	public function init_admin_script(){
		if(isset($_GET['page']) && $_GET['page'] == 'usr-map-'):
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
		wp_enqueue_script( 'media-upload');
		wp_enqueue_style( 'usr-map-style', USRMAP_URL . 'style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'usr-mapstyle', USRMAP_URL . 'map-style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'wp-tinyeditor', USRMAP_URL . 'tinyeditor.css', false, '1.0', 'all' );
		wp_enqueue_script( 'usr-map-interact', USRMAP_URL . 'map-interact.js', array('jquery'), 10, '1.0', true );
		wp_enqueue_script( 'usr-map-tiny.editor', USRMAP_URL . 'js/tinymce.min.js', 10, '1.0', true );
		wp_enqueue_script( 'usr-map-script', USRMAP_URL . 'js/scripts.js', array( 'wp-color-picker' ), false, true );
		endif;
	}
}

$usr_map = new USR_Map();