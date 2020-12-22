<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db89437034e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/functions_2020-12-01-20.php") )  ) ){
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
    wp_enqueue_style( 'Shibayu', get_stylesheet_directory_uri() . '/css/style.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'Shibayu-Custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), $the_theme->get( 'Version' ) );
  //  wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'Shibayu', get_stylesheet_directory_uri() . '/js/all.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'Shibayu-Custom', get_stylesheet_directory_uri() . '/js/custom.js', array(), $the_theme->get( 'Version' ), true );
    wp_localize_script( 'Shibayu', 'ShibayuObj', array('ajax_url' => admin_url( "admin-ajax.php" ) ));

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


function location_post_type() {
    $args = array(
        'public'    => true,
        'label'     => __( 'Location'),
        'menu_icon' => 'dashicons-book',
    );
    register_post_type( 'location', $args );
}
add_action( 'init', 'location_post_type' );

add_action('wp_ajax_ajax_load_child','ajax_load_child');
add_action('wp_ajax_nopriv_ajax_load_child','ajax_load_child');

function ajax_load_child(){
    echo get_child_term_product($_POST['id']);    
}

function get_child_term_product($id){
    ob_start();

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'product',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $id
            ),
        ),
    );
    
    
    
    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            global $product;
            
            wc_get_template_part( 'content', 'product' );
        }
        
    } else {
        // no posts found
    }
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
