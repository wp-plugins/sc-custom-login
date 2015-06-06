<?php
/**
 * Plugin Name: SC Custom Login
 * Plugin URI: https://profiles.wordpress.org/sergiuscosta
 * Description: Simple way to customize your login page
 * Version: 1.0.0
 * Author: Sergio Costa
 * Author URI: http://sergiocosta.net.br/
 * Text Domain: sclogin
 * License: GPLv2 or later
 */

require_once plugin_dir_path( __FILE__ ) . '/options-page.php';

/**
 * Custom logo URL.
 */
function sclogin_admin_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'sclogin_admin_logo_url' );

/**
 * Custom logo title.
 */
function sclogin_admin_logo_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'sclogin_admin_logo_title' );

/**
 * Change error msgs
 */
function sclogin_login_error_msg() { 
	$options = get_option( 'sclogin_settings' );
	$options = explode("\r\n", $options['sclogin_errormsgs']);
	$custom_error_msgs = $options;
    return $custom_error_msgs[array_rand($custom_error_msgs)];;
}
add_filter( 'login_errors', 'login_error_msg' );