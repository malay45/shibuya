<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K8E6R1FTY1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-K8E6R1FTY1');
    </script>
	<?php wp_head(); ?>
</head>
<?php
    global $location_global;
    if(isset($_COOKIE['location-id'])){
        $location_data = get_post($_COOKIE['location-id']);
        $location_global['title'] = $location_data->post_title;
        $location_global['link'] = get_permalink($location_data->ID);
        $location_global['address'] = get_post_meta($location_data->ID,'name_fe',true);
    };
?>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<header>
            <div class="container">
                <div class="Flex-col space-between">
                    <div class="logo"> 
                        <a href="<?php echo site_url(); ?>">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="560px"
                                height="124.8px" viewBox="0 0 560 124.8" style="overflow:visible;enable-background:new 0 0 560 124.8;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#FFFFFF;}
                                    .st1{fill:#E30613;}
                                </style>
                                <defs>
                                </defs>
                                <path class="st0" d="M124.1,119.7c0.6-1,1.6-2.6,1.6-6.1c0-5.1-4.1-10.5-10.8-10.5c-6.7,0-10.8,5.4-10.8,10.8
                                    c0,5.1,4.1,10.5,10.8,10.5c1.3,0,3.5,0,5.7-1.6c0.6,0.6,1.9,1.6,4.8,1.6c0.6,0,1,0,1.3,0v-4.1c-0.3,0-0.3,0-0.3,0
                                    C125.7,120.3,124.8,120,124.1,119.7z M114.9,119.7c-1.6,0-3.8-1-5.1-3.5c0.6-0.3,1-0.3,1.9-0.3c2.9,0,4.8,2.2,5.4,3.2
                                    C116.5,119.7,115.8,120,114.9,119.7z M120,116.5c-2.6-3.2-5.4-4.1-7.7-4.1c-1.3,0-1.9,0.3-2.9,0.6c0.6-3.2,2.9-5.1,5.4-5.1
                                    c3.2,0,5.7,2.2,5.7,5.7C120.6,114.9,120.3,115.8,120,116.5z"/>
                                <polygon class="st0" points="211.9,103.7 206.8,103.7 206.8,124.1 217.9,124.1 217.9,119.3 211.9,119.3 "/>
                                <path class="st0" d="M179.3,103.7l-8.3,20.4h5.7l1-2.9h7l1,2.9h5.7l-8-20.4H179.3z M179.3,116.8l2.2-7l0,0l0,0l2.2,7H179.3z"/>
                                <path class="st0" d="M152.2,115.8c0,1.6,0,3.8-2.6,3.8s-2.6-2.6-2.6-3.8v-12.1H142v12.4c0,2.9,0.3,4.5,1.9,6.4
                                    c1.6,1.9,4.5,2.2,5.7,2.2c2.6,0,4.5-1,5.7-2.2c1.3-1.3,1.9-2.9,1.9-6.4v-12.4h-5.1V115.8z"/>
                                <rect x="232.9" y="103.7" class="st0" width="5.1" height="20.4"/>
                                <polygon class="st0" points="253.4,108.2 257.2,108.2 257.2,124.1 262.6,124.1 262.6,108.2 266.4,108.2 266.4,103.7 253.4,103.7 "/>
                                <rect x="449.9" y="103.7" class="st0" width="5.1" height="20.4"/>
                                <path class="st0" d="M396.3,112.3c-3.8-1.6-4.1-1.9-4.1-3.2c0-1,1-1.6,1.9-1.6c1.6,0,1.9,1.3,1.9,1.9h5.1c0-1.3,0-2.6-1.3-4.1
                                    c-1.3-1.6-3.5-2.2-5.4-2.2c-3.5,0-7,2.2-7,6.1s3.5,5.4,5.1,5.7c3.2,1.3,4.1,1.6,4.1,2.9c0,1-0.6,1.9-1.9,1.9c-0.6,0-2.2-0.3-2.2-2.9
                                    h-5.1v0.6c0,2.6,1.6,6.4,7.3,6.4c5.4,0,7-3.2,7-6.4C400.8,115.8,399.8,113.9,396.3,112.3z"/>
                                <polygon class="st0" points="428.2,111.4 421.5,111.4 421.5,103.7 416.4,103.7 416.4,124.1 421.5,124.1 421.5,115.8 428.2,115.8 
                                    428.2,124.1 433.3,124.1 433.3,103.7 428.2,103.7 "/>
                                <path class="st0" d="M366,115.8c0,1.6,0,3.8-2.6,3.8c-2.6,0-2.6-2.6-2.6-3.8v-12.1h-5.1v12.4c0,2.9,0.3,4.5,1.9,6.4
                                    c1.6,1.9,4.5,2.2,5.7,2.2c2.6,0,4.5-1,5.7-2.2c1.3-1.3,1.9-2.9,1.9-6.4v-12.4H366V115.8z"/>
                                <polygon class="st0" points="288.5,111.7 285.6,103.7 279.8,103.7 285.9,116.5 285.9,124.1 291,124.1 291,116.5 297.1,103.7 
                                    291.6,103.7 "/>
                                <path class="st0" d="M335.4,112.3c-3.5-1.6-4.1-1.9-4.1-3.2c0-1,1-1.6,1.9-1.6c1.6,0,1.9,1.3,1.9,1.9h5.1c0-1.3,0-2.6-1.3-4.1
                                    c-1.3-1.6-3.5-2.2-5.4-2.2c-3.5,0-7,2.2-7,6.1s3.5,5.4,5.1,5.7c3.2,1.3,4.1,1.6,4.1,2.9c0,1-0.6,1.9-1.9,1.9c-0.6,0-2.2-0.3-2.2-2.9
                                    h-5.1v0.6c0,2.6,1.6,6.4,7.3,6.4c5.4,0,7-3.2,7-6.4C340.1,115.8,339.2,113.9,335.4,112.3z"/>
                                <path class="st0" d="M560,40.2h-27.1l-10.5-26.5h-3.8l-10.8,26.5h-23l21.1-26.5h-4.1l-21.1,26.5h-0.6l-21.1-26.5h-4.1l20.7,26.5
                                    h-33.5V13.7h-3.5v26.5h-38V13.7h-3.5v26.5h-19.8c4.1-2.2,6.7-6.4,6.7-11.2c0-7.7-4.5-15.3-18.8-15.3h-18.8v3.2h18.5
                                    c8,0,15,2.9,15,11.5c0,6.4-3.8,10.8-11.5,11.8h-35.4V13.7h-3.5v26.5h-13.1V13.7h-3.5v26.5h-38V13.7h-3.5v26.5h-37.7
                                    c-8.3-1.9-15.6-4.1-15.6-12.1c0-9.9,9.6-12.8,16.3-12.8c0.3,0,0-3.2,0-3.2c-9.3,0-19.8,4.5-19.8,15.6c0,6.4,3.2,9.9,8,12.1h-19.8
                                    v-1.3l0,0C201,16.9,183.2,0,161.1,0s-39.9,17.2-41.5,38.6l0,0v1.3H92.2l21.1-26.5h-4.1L88.1,39.9h-0.6L66.4,13.4h-4.1L83,39.9H59.4
                                    v-5.7c0-12.4-5.7-20.7-16.6-20.7c-6.1,0-9.9,3.2-12.1,6.4c-0.3,0.3-0.6,1.3-1,1.9c-0.6,1.6-1.3,4.5-1.3,4.5s-0.6-2.6-1-3.5
                                    c-0.3-1.3-1-2.6-1-2.9c-2.2-4.1-6.4-6.7-11.2-6.7C7.7,13.1,0,17.5,0,31.9v40.5h3.2V32.2c0-8,2.9-15,11.5-15
                                    c6.4,0,10.8,3.8,11.8,11.5v44h3.8V30c1-6.4,4.1-12.8,12.4-12.8c8.9,0,13.4,6.7,13.4,16.9v9.6h1.9l0,0h27.4v29H89v-29h30.6l0,0l0,0
                                    c1.3,22,19.1,39.2,41.5,39.2s40.2-17.2,41.5-39.2l0,0v-0.3h5.1l0,0h27.8c9.6,1.9,19.1,3.8,19.1,13.7c0,10.2-9.9,13.4-17.2,13.4
                                    c-0.6,0-0.6,3.2,0,3.2c8.9,0,20.7-4.5,20.7-16.6c0-7.7-4.1-11.5-9.9-13.7h22.7v29h3.5v-29h38v29h3.5v-29H329v29h3.5v-29h36.1
                                    c6.4,1,12.8,4.1,12.8,12.4c0,8.9-6.7,13.4-16.9,13.4h-18.8v3.2h18.5c12.4,0,20.7-5.7,20.7-16.6c0-6.4-3.5-10.2-7-12.4h17.9v5.1
                                    c0,8,1.3,25.2,22.3,25.2c17.9,0,23-11.2,23-25.2v-5.1H477v29h3.5v-29h24.6l-11.5,29h3.8l11.5-29h20.7l11.2,29h3.8l-11.5-29H559v-3.2
                                    H560z M161.1,79.5c-20.7,0-37.3-16.9-37.3-37.3s16.6-37.7,37.3-37.7s37.3,16.9,37.3,37.3S181.9,79.5,161.1,79.5z M438.1,49.1
                                    c0,13.4-4.8,22-19.5,22c-17.2,0-18.5-15-18.5-22V44h38L438.1,49.1L438.1,49.1z M511.2,40.2l8.9-23l8.9,23H511.2z"/>
                                <path class="st1" d="M161.1,68c14.4,0,26.2-11.8,26.2-26.2s-11.8-26.2-26.2-26.2S135,27.4,135,41.8S146.8,68,161.1,68"/>
                            </svg>
                        </a>
                    </div>
                    <ul class="Menu">
                        <li class="active"> <a href="<?php echo get_home_url();?>">
                            <svg id="restaurant-black-18dp" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_200" data-name="Path 200" d="M0,0H24V24H0Z" fill="none"/>
                                <path id="Path_201" data-name="Path 201" d="M11,9H9V2H7V9H5V2H3V9a3.986,3.986,0,0,0,3.75,3.97V22h2.5V12.97A3.986,3.986,0,0,0,13,9V2H11Zm5-3v8h2.5v8H21V2C18.24,2,16,4.24,16,6Z" fill="#fff"/>
                            </svg>
                            <span></span>
                        </a>
                        </li>
                        <li class="header_edit_location"> <a class="header_edit_location_link" href="<?php echo ($location_global['link'])?$location_global['link']:'javascript:void(0)' ?>">
                            <svg id="location_on-24px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_198" data-name="Path 198" d="M0,0H24V24H0Z" fill="none"/>
                                <path id="Path_199" data-name="Path 199" d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2Zm0,9.5A2.5,2.5,0,1,1,14.5,9,2.5,2.5,0,0,1,12,11.5Z" fill="#fff"/>
                            </svg>
                            <span class="header_location_title "><?php echo $location_global['title']; ?></span>
                        </a>

                        </li>
                        <li class="header_cart_link"> <a href="javascript:void(0)">
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
                    </ul>
                </div>
            </div>
        </header>