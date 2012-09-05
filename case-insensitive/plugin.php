<?php /*
Plugin Name: Case Insensitive
Plugin URI: http://yourls.org/
Description: Makes all keywords case insensitive (creates all keywords and calls all keywords lowercase.) Only works if you are using Base 36. Fixes disappearing capital letters. 
Version: 1.0
Author: Sean Hendrickson
Author URI: http://flavors.me/seandrickson
*/

// Lets other plugins see that this plugin is enabled
// (QR Code plugin uses this to use capitals in the QR which allows for a smaller QR Code)
define( 'SEAN_CASE_INSENSITIVE', true );

function sean_allow_capitals( $in ) {
	if( YOURLS_URL_CONVERT == 36 )
		$in = $in.'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	return $in;
} yourls_add_filter( 'get_shorturl_charset', 'sean_allow_capitals' );

function sean_case_insensitive( $keyword ) {
	if( YOURLS_URL_CONVERT == 36 )
		$keyword = strtolower( $keyword );
			
	return $keyword;
}
yourls_add_filter( 'sanitize_string', 'sean_case_insensitive' );
yourls_add_filter( 'get_request',     'sean_case_insensitive' );