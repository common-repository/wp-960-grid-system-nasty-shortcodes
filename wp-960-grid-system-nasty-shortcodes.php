<?php
/*
Plugin Name: Wordpress 960 Grid System Nasty Shortcodes!
Plugin URI: http://opensource.clubkoncepto.com/wordpress-960-grid-system-shortcodes
Description: 960 Grid System is an effort to streamline web development workflow by providing commonly used dimensions, based on a width of 960 pixels and this plugin helps you format your wordpress posts and pages easily by providing shortcodes. Your WordPress theme must be 960gs ready for this plugin to work effeciently.
Version: 1.0
Author: dunhakdis
Author URI: http://profiles.wordpress.org/dunhakdis
License: GPL2
*/
?>

<?php

/*  Copyright 2012  Joseph G.  (email : dunhakdis@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Very simple. Provides a function that serves as a callback for two actions we can see in line 66 and line 67.
 *
 * @return string html format of the content wrapped in shortcode
 */
 
function __d960shortCode( $atts, $content ) {
	
	/**
	 * no defaults for this chokes
	 */
	$collection = array(
		'grid' =>  '', 'push' =>  '', 'pull' =>  '',
		'suffix' => '', 'nested_as' => '', 'prefix' => '',
	);
	
	extract(shortcode_atts( $collection, $atts ) );
	
	foreach( $collection as $attr => $val ){
		
		$attribute = $$attr;
		
		if( !empty( $attribute ) )
			
			$str.= ( $attr == 'nested_as' ) ? $attribute : $attr . '_' . $attribute . ' ';
		
	}
	
	$gridHtml = sprintf( '<div class="%s">%s</div>', rtrim( $str ), do_shortcode( $content ) );
	
	return $gridHtml;
	
}

add_shortcode( '960', '__d960shortCode' );
add_shortcode( 'wrap', '__d960shortCode' );

?>