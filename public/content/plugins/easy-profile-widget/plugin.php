<?php

/*
Plugin Name: Easy Profile Widget
Plugin URI: https://wordpress.org/plugins/easy-profile-widget
Description: Display User Profile Block with Gravatar on your sidebar widget
Version: 1.3
Author: Phpbits Creative Studio
Author URI: https://phpbits.net
*/

//avoid direct calls to this file
if ( !function_exists( 'add_action' ) ) {
    header( 'Status: 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    exit();
}

// Load translation (by JP)
load_plugin_textdomain( 'easy-profile', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

/*##################################
	REQUIRE
################################## */
require_once( dirname( __FILE__ ) . '/core/functions.enqueue.php');
require_once( dirname( __FILE__ ) . '/core/functions.widget.php');
require_once( dirname( __FILE__ ) . '/core/functions.notices.php');
