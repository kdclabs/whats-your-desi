<?php
/**
 * Plugin Name: what\'s your .desi
 * Plugin URI: http://www.kdclabs.com
 * Description: Register your very own .desi, no settings, simply insert [whatsyourdesi] and the registration box will be populated.
 * Version: 1.0
 * Author: Vachan Kumdule (_KDC-Labs)
 * Author URI: http://www.kdclabs.com
 * License: GPL3
 */

/*  Copyright 2014  Vachan Kudmule (_KDC-Labs - labs@kdc.in)

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
 * Proper way to enqueue scripts and styles
 */
function whats_your_desi_assets() {
	wp_enqueue_style( 'style-desi', plugins_url( 'assets/css/desi.css', __FILE__ ) );
	wp_enqueue_script( 'script-desi', plugins_url( 'assets/js/desi.js', __FILE__ ), array(), '1.0', true );
	wp_enqueue_script( 'script-desi-autogrow', plugins_url( 'assets/js/desi-autogrow.js', __FILE__ ), array('jquery'), '1.7.1', true );
}
add_action( 'wp_enqueue_scripts', 'whats_your_desi_assets' );


// Add Shortcode
function whats_your_desi_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'color' => 'dark',
		), $atts )
	);
	
	// Code
	$whatsyourdesi_form = '<form action="http://meradesi.in/portal/?ccce=domainchecker" method="post">
	<input type="hidden" name="token" value="4750546117a8299e56e1663e7f3d5ff9e8299bc9">
	<input type="hidden" name="direct" value="true">
	<input type="hidden" name="select" value=".desi">
  <div id="dotdesi">
    <input type="text" name="domain" id="desidomain" placeholder="domain" maxlength="59" />
    <input type="image" id="desiext" src="' . plugins_url( 'assets/img/dot-desi-' . esc_attr($a['color']) . '.png', __FILE__ ) . '" />
  </div>
  <div id="whatsyourdesi"></div>
</form>';

	return $whatsyourdesi_form;
	
}
add_shortcode( 'whatsyourdesi', 'whats_your_desi_shortcode' );
