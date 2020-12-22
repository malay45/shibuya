<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d72d3a0b211"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/functions_2020-11-23-19.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'WhiteSand', get_stylesheet_directory_uri() . '/css/app.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    // //wp_enqueue_style('select2', '../wp-content/woocommerce/assets/css/select2.css');
    // wp_enqueue_script('select2_init',get_site_url() . '/wp-content/woocommerce/assets/js/select2/selectWoo.full.min.js', false, true, true);
    wp_enqueue_script( 'WhiteSand', get_stylesheet_directory_uri() . '/js/app.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'AjaxSearch', get_stylesheet_directory_uri() . '/js/ajax_search.js', array(), $the_theme->get( 'Version' ), true );
    wp_localize_script( 'AjaxSearch', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'Admin', get_stylesheet_directory_uri() . '/js/admin.js', array(), $the_theme->get( 'Version' ), true );
    wp_deregister_script( 'wp-embed' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	wp_enqueue_media();

}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
    
    register_nav_menus( array(
        'admin_sidebar' => __( 'Admin Sidebar'),
    ) );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

// Image Size
add_image_size( 'griglia', 800, 600, true );

// Include
require_once( get_stylesheet_directory() . '/include/page-options/page-options.php');

// Woocommerce
require_once( get_stylesheet_directory() . '/woocommerce/woocommerce-functions.php');

// SVG
require_once( get_stylesheet_directory() . '/include/functions/svg.php');

// Nav
require_once( get_stylesheet_directory() . '/include/functions/nav.php');

// Mailchimp
require_once( get_stylesheet_directory() . '/include/functions/mailchimp.php');

// Mailchimp
require_once( get_stylesheet_directory() . '/include/functions/ajax_search.php');

// Theme optimization
require_once( get_stylesheet_directory() . '/include/functions/unused.php');

/**************************************************************************************/
/*Added by Malay*/
/**************************************************************************************/

function print_rr($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

/*redirect to different page for admin user*/

add_filter( 'woocommerce_login_redirect',  'redirect_based_on_user_role' , 99, 2 );

function redirect_based_on_user_role( $default_url, $user ){

    if ( ! is_object( $user) ) {
        $user = new WP_User( $user );
    }
    if ( ! $user ) {
        $url = $default_url;
    }
    
    if(in_array('administrator',$user->roles)){
        $url = get_field('admin_account_page','option');    
    }
    
    return  $url!='' ? ( $url ) : $default_url;

}

function check_access_of_page(){
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        if(!in_array('administrator',$user->roles)){
            wp_redirect(site_url());
            exit;
        }
    } else {
        wp_redirect(site_url());
        exit;
    }
}

