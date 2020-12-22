<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8de9faaba20c"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/functions.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/functions_2020-12-05-07.php") )  ) ){
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
    wp_enqueue_style( 'Shibayu-Daterang', get_stylesheet_directory_uri() . '/css/daterangepicker.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'Shibayu-Custom', get_stylesheet_directory_uri() . '/css/custom.css', array(), $the_theme->get( 'Version' ) );
  //  wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'Shibayu', get_stylesheet_directory_uri() . '/js/all.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'Shibayu-moment', get_stylesheet_directory_uri() . '/js/moment.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'Shibayu-datarangpicker', get_stylesheet_directory_uri() . '/js/daterangepicker.min.js', array(), $the_theme->get( 'Version' ), true );
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
    die();
}


add_action('wp_ajax_ajax_load_parent','ajax_load_parent');
add_action('wp_ajax_nopriv_ajax_load_parent','ajax_load_parent');
function ajax_load_parent(){
    $return = array();
    $child_terms = get_parent_terms($_POST['id']);
    $return['child_cat'] = $child_terms['categpry'];    
    $return['product'] = get_child_term_product($child_terms['child_cat_active']); 
    echo json_encode($return);
    die();
}

function get_parent_terms($id){
      ob_start();
      if($id=='all'){
        $parent_terms = get_terms( 'product_cat', array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) ); 
        $terms = array();  
        $i= 0;
        foreach($parent_terms as $term_data):
             $terms_child = get_terms( 'product_cat', array(
                            'hide_empty' => false,
                            'parent' => $term_data->term_id,
                            'exclude' => 15
                        ) );
             $terms = array_merge($terms_child,$terms);
        endforeach;
      } else {
            $terms = get_terms( 'product_cat', array(
                'hide_empty' => false,
                'parent' => $id,
                'exclude' => 15
            ) );
      }
      
                            $i= 0;
            foreach($terms as $term_data):
                if($i==0){
                    $current_child = $term_data->term_id;    
                }
                    $thumbnail_id = get_woocommerce_term_meta( $term_data->term_id, 'thumbnail_id', true ); 
                
                    // get the image URL
                    $image = wp_get_attachment_url( $thumbnail_id ); 
                ?>
                <li data-id="<?php  echo $term_data->term_id; ?>" class="<?php if($i==0){ echo 'active'; } ?> child-cat-list"  > <a href="javascript:void(0)">
                      <img src="<?php echo $image ?>" alt="" />
                      <span><?php echo strtoupper($term_data->name); ?></span>
                    </a>

                </li>
        <?php $i++; endforeach;
    $output = ob_get_contents();
    ob_end_clean();
    $return['categpry'] = $output;
    $return['child_cat_active'] = $current_child;
    return $return;
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


add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {

    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }

        WC_AJAX :: get_refreshed_fragments();
    } else {

        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }

    wp_die();
}
add_filter('woocommerce_add_to_cart_fragments', 'header_price');

function header_price($fragments){
    $fragments['.cart_total_text'] = '<span class="cart_total_text">'.WC()->cart->get_cart_total().'</span>';
    ob_start();
    ?>
    <li class="header_cart_link"> <a href="<?php if(WC()->cart->cart_contents_total >0){ echo wc_get_checkout_url(); } else { echo 'javascript:void(0)'; } ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <g id="Group_5" data-name="Group 5" transform="translate(-1469 -38)">
                  <g id="shopping_cart-24px" transform="translate(1469 38)">
                    <path id="Path_202" data-name="Path 202" d="M0,0H24V24H0Z" fill="none"/>
                    <path id="Path_203" data-name="Path 203" d="M7,18a2,2,0,1,0,2,2A2,2,0,0,0,7,18ZM1,2V4H3l3.6,7.59L5.25,14.04A1.933,1.933,0,0,0,5,15a2.006,2.006,0,0,0,2,2H19V15H7.42a.248.248,0,0,1-.25-.25l.03-.12L8.1,13h7.45a1.991,1.991,0,0,0,1.75-1.03l3.58-6.49A.977.977,0,0,0,21,5a1,1,0,0,0-1-1H5.21L4.27,2H1ZM17,18a2,2,0,1,0,2,2A2,2,0,0,0,17,18Z" fill="#fff"/>
                  </g>
                </g>
            </svg>
            <span class="cart_total_text"><?php echo WC()->cart->get_cart_total() ?></span>
        </a>

        </li>
    <?php
    $data = ob_get_clean();
    $fragments['.header_cart_link'] =  $data;
    $fragments['.Item-table-list'] = get_checkout_cart_table();     
    return $fragments;

}

add_action('wp_ajax_mini_cart_change_quanity','mini_cart_change_quanity');
add_action('wp_ajax_nopriv_mini_cart_change_quanity','mini_cart_change_quanity');


function mini_cart_change_quanity(){
    global $woocommerce;
    $woocommerce->cart->set_quantity($_POST['key'] , $_POST['quantity']);
    ob_start();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    $data = array(
        'fragments' => apply_filters(
            'woocommerce_add_to_cart_fragments',
            array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>',
            )
        ),
        'cart_hash' => WC()->cart->get_cart_hash(),
    );
     wp_send_json( $data );
    die();
}


 add_action('woocommerce_checkout_update_order_meta', 'custom_meta_to_order', 20, 1);
function custom_meta_to_order( $order_id ) {      
    if (isset($_POST['pickup_date'])) {
        update_post_meta($order_id, 'pickup_date', $_POST['pickup_date']); 
        update_post_meta($order_id, 'location_id', $_COOKIE['location-id']);            
    }
}

function get_checkout_cart_table(){
    ob_start();
    ?>
    <table class="Item-table-list">
    <thead>
                                <tr>
                                    <td width="25%">Qtà</td>
                                    <td width="25%">Prodotto</td>
                                    <td width="50%" align="right">Prezzo</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                print_rr(WC()->cart);
                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                 ?>
                                <tr>
                                    <td><?php echo $cart_item['quantity']; ?>x</td>
                                    <td><?php echo $_product->get_name(); ?></td>
                                    <td align="right"><?php 
                                    echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                    //echo $_product->get_price_html()
                                    ?> <a data-id="<?php echo $cart_item_key; ?>" href="javascript:void(0)" class="Delete-item" ><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                
                                <tr class="small-txt">
                                    <td colspan="2" align="right">Totale Ordine</td>
                                    <td align="right"><?php echo WC()->cart->get_cart_total(); ?>
                                    </td>
                                </tr>
                                <tr class="small-txt">
                                    <td colspan="2" align="right">IVA (10% incluso):</td>
                                    <td align="right"><?php echo wc_price(WC()->cart->get_total_tax()); ?></td>
                                </tr>
                                <tr class="Total-txt">
                                    <td colspan="2" align="right">Totale</td>
                                    <td align="right"><?php echo WC()->cart->get_cart_total(); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr></hr>
                                    </td>
                                </tr>
                            </tbody>
                             </table>
    <?php
    return ob_get_clean();
}

add_action('woocommerce_after_checkout_validation', 'rei_after_checkout_validation');

function rei_after_checkout_validation( $posted ) {   
    session_start();
    if ($_POST['validation-code-1'].$_POST['validation-code-2'].$_POST['validation-code-3'].$_POST['validation-code-4']!=$_SESSION['otp']) {
         wc_add_notice( __( "Invalid OTP", 'woocommerce' ), 'error' );
    }

}




add_action('wp_ajax_send_otp','send_otp');
add_action('wp_ajax_nopriv_send_otp','send_otp');


function send_otp(){
    session_start();
    require_once __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
    $sid = get_field('twilio_sid','option');
    $token = get_field('twilio_token','option');
    $twilio = new Twilio\Rest\Client($sid, $token);
    
    
    $data = $twilio->messages->create(
        // Where to send a text message (your cell phone?)
        $_POST['number'],
        array(
            'from' => get_field('from_no','option'),
            'body' => $_SESSION['otp']
        )
    );
    echo 'please enter otp in below input';
    die();
}