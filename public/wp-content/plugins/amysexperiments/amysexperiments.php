<?php
/*
Plugin Name: Amy's Plugin Experiments
Plugin URI: https://github.com/amyevans
Description: A plugin for learning purposes.
Author: Amy Evans
Version: 1.0
Author URI: http://amyevans.github.io
*/


// activate the plugin
function amys_plugin_activate() {
	error_log("Amy's plugin activated");
}

register_activation_hook(__FILE__, "amys_plugin_activate" );

function amys_plugin_deactivate() {
	error_log("Amy's plugin deactivated");
}

register_deactivation_hook(__FILE__, "amys_plugin_deactivate" );


// plugin using filter which modifies content (appends a copyright to a feed)
function add_content_watermark ( $content ) {

	if ( is_feed() ) {
		return $content . ' Created by Amy Evans, copyright ' .
		date('Y') . 
		' all rights reserved.';
	}

	return $content;
}

add_filter( 'the_content' , 'add_content_watermark' );


// Template tag version
function add_content_watermark_anywhere () {
	$copyright_message = ' Created by Amy Evans, copyright ' . date('Y') . ' all rights reserved.';
	echo $copyright_message;
}

?>