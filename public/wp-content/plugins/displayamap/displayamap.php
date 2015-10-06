<?php
/*
Plugin Name: Display a Map
Plugin URI: https://github.com/amyevans
Description: A plugin for displaying a Google map. Has shortcode functionality.
Author: Amy Evans
Version: 1.0
Author URI: http://amyevans.github.io
*/

function display_a_map($atts, $content=null) {
	shortcode_atts( array(
		'title'=>'Your Map:',
		'address'=>'' ),
		$atts );
	$base_map_url = 'http://maps.google.com/maps/api/staticmap?sensor=false&size=256x256&format=png&center=';

	return '
	<h2>' . $atts['title'] . '</h2>
	<img width="256" height="256" src="' . $base_map_url . urlencode($atts['address']) . '" />';
}

add_shortcode( 'display-map', 'display_a_map' );

?>