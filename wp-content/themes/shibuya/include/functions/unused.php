<?php

/**
 * List of all function to optimize theme
 * Remove unused function/style/service
 */

/**
 * Theme Optimization
 */

// Rimuovo Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Rimuovo Client Link
remove_action ('wp_head', 'rsd_link');

// Rimuovo Windows Live Writer Manifest Link
remove_action( 'wp_head', 'wlwmanifest_link');

// Rimuovo Short Link
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// Rimuovo Versione
remove_action('wp_head', 'wp_generator');

// Rimuovo e disablito Feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link

function remove_query_strings() {
    if(!is_admin()) {
        add_filter('script_loader_src', 'remove_query_strings_split', 15);
        add_filter('style_loader_src', 'remove_query_strings_split', 15);
    }
}
function remove_query_strings_split($src){
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
add_action('init', 'remove_query_strings');
