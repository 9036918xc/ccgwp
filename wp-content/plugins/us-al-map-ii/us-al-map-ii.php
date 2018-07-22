<?php
/*
Plugin Name: ALABAMA MAP II
Plugin URI: http://www.wpmapplugins.com/
Description: Customize each county (colors, link, etc) through the admin panel and use the shortcode in your page.
Version: 2.2.0
Author: WP Map Plugins
Author URI: http://www.wpmapplugins.com/
*/

class USAL_Map_II {

	public function __construct(){
		$this->constant();
		$this->options = get_option( 'us_al_map_ii' );
		add_action( 'admin_menu', array($this, 'us_al_map_ii_options_page') );
	 	add_action( 'admin_footer', array( $this,'add_js_to_wp_footer') );
	 	add_action( 'wp_footer', array($this,'add_span_tag') );
		add_action( 'admin_enqueue_scripts', array($this,'init_admin_script') );
		add_shortcode( 'us_al_map_ii', array($this, 'us_al_map_ii') );
		$this->default = array(
			'borderclr' => '#6B8B9E',
			'visnames' => '#666666',
		);
		foreach (array(
			'AUTAUGA', 'BALDWIN', 'BARBOUR', 'BIBB', 'BLOUNT', 'BULLOCK', 'BUTLER', 'CALHOUN', 'CHAMBERS', 'CHEROKEE', 'CHILTON', 'CHOCTAW', 'CLARKE', 'CLAY', 'CLEBURNE', 'COFFEE', 'COLBERT', 'CONECUH', 'COOSA', 'COVINGTON', 'CRENSHAW', 'CULLMAN', 'DALE', 'DALLAS', 'DEKALB', 'ELMORE', 'ESCAMBIA', 'ETOWAH', 'FAYETTE', 'FRANKLIN', 'GENEVA', 'GREENE', 'HALE', 'HENRY', 'HOUSTON', 'JACKSON', 'JEFFERSON', 'LAMAR', 'LAUDERDALE', 'LAWRENCE', 'LEE', 'LIMESTONE', 'LOWNDES', 'MACON', 'MADISON', 'MARENGO', 'MARION', 'MARSHALL', 'MOBILE', 'MONROE', 'MONTGOMERY', 'MORGAN', 'PERRY', 'PICKENS', 'PIKE', 'RANDOLPH', 'RUSSELL', 'SHELBY', 'ST CLAIR', 'SUMTER', 'TALLADEGA', 'TALLAPOOSA', 'TUSCALOOSA', 'WALKER', 'WASHINGTON', 'WILCOX', 'WINSTON'
		) as $k=>$area) {
			$this->default['upclr_'.($k+1)] = '#E0F3FF';
			$this->default['ovrclr_'.($k+1)] = '#8FBEE8';
			$this->default['dwnclr_'.($k+1)] = '#477CB2';
			$this->default['url_'.($k+1)] = '';
			$this->default['turl_'.($k+1)] = '_self';
			$this->default['info_'.($k+1)] = $area;
			$this->default['enbl_'.($k+1)] = 1;
		}
		if(isset($_POST['us_al_map_ii']) && isset($_POST['submit-clrs'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['upclr_'.$i] = $_POST['upclr_all'];
				$_POST['ovrclr_'.$i] = $_POST['ovrclr_all'];
				$_POST['dwnclr_'.$i] = $_POST['dwnclr_all'];
				$i++;
			}
			update_option('us_al_map_ii', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['us_al_map_ii']) && isset($_POST['submit-url'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['url_'.$i] = $_POST['url_all'];
				$_POST['turl_'.$i] = $_POST['turl_all'];
				$i++;
			}
			update_option('us_al_map_ii', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}	
		if(isset($_POST['us_al_map_ii']) && isset($_POST['submit-info'])){
			$i = 1;
			while (isset($_POST['url_'.$i])) {
				$_POST['info_'.$i] = $_POST['info_all'];
				$i++;
			}
			update_option('us_al_map_ii', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['us_al_map_ii']) && !isset($_POST['preview_map'])){
			update_option('us_al_map_ii', array_map('stripslashes_deep', $_POST));
			$this->options = array_map('stripslashes_deep', $_POST);
		}
		if(isset($_POST['us_al_map_ii']) && isset($_POST['restore_default'])){
			update_option('us_al_map_ii', $this->default);
			$this->options = $this->default;
		}
		if(!is_array($this->options)){
			$this->options = $this->default;
		}
	}

	protected function constant(){
		define( 'USALMAPII_VERSION', '1.0' );
		define( 'USALMAPII_DIR', plugin_dir_path( __FILE__ ) );
		define( 'USALMAPII_URL', plugin_dir_url( __FILE__ ) );
	}

	public function us_al_map_ii(){
		ob_start();
		include 'design/map.php';
		?>
		<script type="text/javascript">
			<?php include 'config.php'; ?>
		</script>
		<?php
		wp_enqueue_style( 'us-al-mapstyle-frontend', USALMAPII_URL . 'map-style.css', false, '1.0', 'all' );
		wp_enqueue_script( 'us-al-map-interact', USALMAPII_URL . 'map-interact.js', array('jquery'), 10, '1.0', true );
		$html = ob_get_clean();
		return $html;
	}

	public function us_al_map_ii_options_page() {
		add_menu_page('Alabama Map II', 'Alabama Map II', 'manage_options', 'us-al-map-ii', array($this, 'options_screen'), USALMAPII_URL . 'images/map-icon.png');
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
	<span id="tipusal" style="margin-top:-32px"></span>
	<?php }

	public function add_span_tag(){
		?>
		<span id="tipusal"></span>
		<?php
	}

	public function stripslashes_deep($value) {
		$value = is_array($value) ?
		array_map(array($this, 'stripslashes_deep'), $value) : stripslashes($value);
		return $value;
	}

	public function init_admin_script(){
		if(isset($_GET['page']) && $_GET['page'] == 'us-al-map-ii'):
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style('thickbox');
		wp_enqueue_script('thickbox');
		wp_enqueue_script( 'media-upload');
		wp_enqueue_style( 'us-al-map-style', USALMAPII_URL . 'style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'us-al-mapstyle', USALMAPII_URL . 'map-style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'wp-tinyeditor', USALMAPII_URL . 'tinyeditor.css', false, '1.0', 'all' );
		wp_enqueue_script( 'us-al-map-interact', USALMAPII_URL . 'map-interact.js', array('jquery'), 10, '1.0', true );
		wp_enqueue_script( 'us-al-map-tiny.editor', USALMAPII_URL . 'js/tinymce.min.js', 10, '1.0', true );
		wp_enqueue_script( 'us-al-map-script', USALMAPII_URL . 'js/scripts.js', array( 'wp-color-picker' ), false, true );
		endif;
	}
}

$us_al_map_ii = new USAL_Map_II();