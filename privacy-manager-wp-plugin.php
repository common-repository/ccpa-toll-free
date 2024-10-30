<?php 
/**
 * Plugin Name: CCPA Privacy Manager
 * Plugin URI: #
 * Description: This is the CCPA Toll Free plugin. Use it activate the 866-I-OPT-OUT privacy hotline and webform for your privacy policy.
 * Author: Privacy Toll Free, LLC
 * Author URI: https://www.ccpatollfree.com/
 * Version: 1.1.2
 */

Class Privacy_Manager_Plugin {
	public function __construct() {
		add_action( 'admin_menu', array(&$this, 'wordpres_review') );
		add_action( 'admin_enqueue_scripts', array(&$this, 'wordpres_review_assets') );
	}
	public function wordpres_review() {
		$icon = plugins_url('assets/img/menu_icon.png', __FILE__);
		add_menu_page('Privacy Hotline', 'Privacy Hotline', 'manage_options', 'privacy-hotline', array(&$this,'gettting_started'), $icon );
	}

	public function wordpres_review_assets() {
		wp_enqueue_style( 'bootstrap-min-css', plugins_url('assets/css/bootstrap.min.css', __FILE__),array(), '3.2.0' );
		wp_enqueue_script( 'bootstrap-min-js', plugins_url('assets/js/bootstrap.min.js', __FILE__),array(), '3.1.1' );
	}

	public function gettting_started() {
		include("inc/privacy_manager_wp.php");
	}
}
$Privacy_Manager_Plugin = new Privacy_Manager_Plugin();

/* Begin Adding Shortcode */
add_shortcode('CCPA-Toll-Free','privacy_manager_head_script');

function privacy_manager_head_script( $atts ) {
  	ob_start();
		do_action('CCPA-Toll-Free');
		$below_shortcode = ob_get_contents();
  	return ob_get_clean();
}

add_action('wp_head', 'privacy_manager_header_shortcode' );
add_action('CCPA-Toll-Free', 'privacy_manager_body_shortcodes');

function privacy_manager_header_shortcode() { ?>
	<script type="text/javascript" src="https://assets.privacytollfree.com/integration-wp.js"></script>
<?php
}

function privacy_manager_body_shortcodes() { ?>
	<div id="ccpatollfree" data="<?php echo get_option('privacy_manager_hotline_code'); ?>"></div>
<?php
}
/* End Adding Shortcode */