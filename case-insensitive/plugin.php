<?php
/*
Plugin Name: Case Insensitive
Plugin URI: https://github.com/seandrickson/YOURLS-Case-Insensitive
Description: Makes all keywords case-insensitive (creates all keywords and calls lowercase.) Just a copy of Ozh's version, but made to work with <a href="https://github.com/seandrickson/YOURLS-QRCode-Plugin">Sean's QR Code plugin</a>
Version: 1.0
Author: Sean Hendrickson
Author URI: https://github.com/seandrickson
*/

// No direct call
if( !defined( 'YOURLS_ABSPATH' ) ) die();


// Redirection: http://sho.rt/ABC first converted to http://sho.rt/abc
yourls_add_filter( 'get_request', 'sean_convert_to_lowercase' );
function sean_convert_to_lowercase( $keyword ) {
	return (YOURLS_URL_CONVERT==36) ? $keyword=strtolower($keyword) : $keyword;
}


// Short URL creation: custom keyword 'ABC' converted to 'abc'
yourls_add_action( 'add_new_link_custom_keyword', 'sean_case_insensitive_add_filter' );
function sean_case_insensitive_add_filter() {
	yourls_add_filter( 'get_shorturl_charset', 'sean_allow_capitals' );
	yourls_add_filter( 'custom_keyword', 'sean_convert_to_lowercase' );
}

function sean_allow_capitals( $charset ) {
	return (YOURLS_URL_CONVERT==36) ? $charset=$charset.strtoupper($charset) : $charset;
}
