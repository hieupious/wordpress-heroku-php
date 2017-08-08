<?php
/*
 * Enqueue Scripts and Style
 */

function admin_enqueue_easy_profile_scripts() {
	wp_enqueue_style( 'easy-profile-widget-admin', plugins_url( 'assets/css/easy-profile-admin.css' , dirname(__FILE__) ) , array(), null );
	wp_enqueue_script(
        'jquery-easy-profile',
        plugins_url( 'assets/js/easy-profile.js' , dirname(__FILE__) ),
        array( 'jquery', 'jquery-ui-tabs'),
        '',
        true
    );
}
add_action( 'admin_enqueue_scripts', 'admin_enqueue_easy_profile_scripts' );

function enqueue_easy_profile_scripts() {
	wp_enqueue_style( 'easy-profile-widget', plugins_url( 'assets/css/easy-profile-widget.css' , dirname(__FILE__) ) , array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_easy_profile_scripts' );
?>