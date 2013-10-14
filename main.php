<?php 
/* 
Plugin Name: SLB: Image Handler Extender (Example)
Plugin URI: https://github.com/archetyped/slb-content-handler-image-match-example
Description: Example of how to extend Simple Lightbox's Image content handler
Version: 0.1
Author: Archetyped
Author URI: http://archetyped.com
Support URI: https://github.com/archetyped/slb-content-handler-image-match-example/wiki/Reporting-Issues

Copyright 2013 Sol Marchessault (sol@archetyped.com)
*/

/**
 * Extend Simple Lightbox's Image handler
 * Adds support for Steam screenshots
 * @param bool $match TRUE if $uri has already been matched
 * @param string $uri URI to match
 * @return bool TRUE if match found for URI
 */
function slb_handler_image_match_extend($match, $uri) {
	//Do not process if match already found
	if ( $match )
		return $match;
	
	//Match custom image URI pattern
	$ptn = '|^https?://cloud-\d+?\.steampowered\.com/ugc/\d{18}/[0-9a-z]{40}/$|i';
	return ( preg_match($ptn, $uri) === 1 ) ? true : false;
}

//Extend image handler
add_filter('slb_content_handlers_image_match', 'slb_handler_image_match_extend', 10, 2);