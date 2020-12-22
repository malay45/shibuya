<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db89437034e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/header_2020-12-01-17.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<header>
            <div class="container">
                <div class="Flex-col space-between">
                    <div class="logo"> <a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>img/Logo.svg" alt="" /></a>

                    </div>
                    <ul class="Menu">
                        <li class="active"> <a href="">
                            <svg id="restaurant-black-18dp" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_200" data-name="Path 200" d="M0,0H24V24H0Z" fill="none"/>
                                <path id="Path_201" data-name="Path 201" d="M11,9H9V2H7V9H5V2H3V9a3.986,3.986,0,0,0,3.75,3.97V22h2.5V12.97A3.986,3.986,0,0,0,13,9V2H11Zm5-3v8h2.5v8H21V2C18.24,2,16,4.24,16,6Z" fill="#fff"/>
                            </svg>
                            <span></span>
                        </a>

                        </li>
                        <li> <a href="">
                            <svg id="location_on-24px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_198" data-name="Path 198" d="M0,0H24V24H0Z" fill="none"/>
                                <path id="Path_199" data-name="Path 199" d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2Zm0,9.5A2.5,2.5,0,1,1,14.5,9,2.5,2.5,0,0,1,12,11.5Z" fill="#fff"/>
                            </svg>
                            <span>Reggio SUD</span>
                        </a>

                        </li>
                        <li> <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g id="Group_5" data-name="Group 5" transform="translate(-1469 -38)">
                                  <g id="shopping_cart-24px" transform="translate(1469 38)">
                                    <path id="Path_202" data-name="Path 202" d="M0,0H24V24H0Z" fill="none"/>
                                    <path id="Path_203" data-name="Path 203" d="M7,18a2,2,0,1,0,2,2A2,2,0,0,0,7,18ZM1,2V4H3l3.6,7.59L5.25,14.04A1.933,1.933,0,0,0,5,15a2.006,2.006,0,0,0,2,2H19V15H7.42a.248.248,0,0,1-.25-.25l.03-.12L8.1,13h7.45a1.991,1.991,0,0,0,1.75-1.03l3.58-6.49A.977.977,0,0,0,21,5a1,1,0,0,0-1-1H5.21L4.27,2H1ZM17,18a2,2,0,1,0,2,2A2,2,0,0,0,17,18Z" fill="#fff"/>
                                  </g>
                                </g>
                            </svg>
                            <span>12,50 €</span>
                        </a>

                        </li>
                    </ul>
                </div>
            </div>
        </header>