<?php

/**
 * Plugin Name: Wikidata Query Service Embeder
 * Description: Allows embeding Wikidata Query Service URLs
 * Version: 1.0
 * Author: Martin Urbanec
 * Author URI: https://urbanec.cz
 * License: GPLv3
**/

function wdqs_embed_handler( $matches, $attr, $url, $rawattr ) {
	return sprintf(
			'<iframe style="width: 80vw; height: 50vh; border: none;" src="https://query.wikidata.org/embed.html#%s" referrerpolicy="origin" sandbox="allow-scripts allow-same-origin allow-popups"></iframe>',
			esc_attr($matches[1])
	);
}

add_action( 'init', function() {
	wp_embed_register_handler(
		'wdqs',
		'@https?://query\.wikidata\.org/[^#]*#(.*)@i',
		'wdqs_embed_handler'
	);
} );