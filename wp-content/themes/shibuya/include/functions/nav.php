<?php

// Nav Menu
function cg_location_nav() {
    register_nav_menu('site-nav-left',__( 'Site Nav Left' ));
    register_nav_menu('site-nav-right',__( 'Site Nav Right' ));
    register_nav_menu('footer-1',__( 'Footer 1' ));
    register_nav_menu('footer-2',__( 'Footer 2' ));
    register_nav_menu('footer-3',__( 'Footer 3' ));
    register_nav_menu('social',__( 'Social' ));
}
add_action( 'init', 'cg_location_nav' );
