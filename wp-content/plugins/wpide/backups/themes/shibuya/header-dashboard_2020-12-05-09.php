<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8de9faaba20c"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/header-dashboard.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/header-dashboard_2020-12-05-09.php") )  ) ){
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
	<?php 
	    wp_enqueue_style('Shibayu-Symantic');
	    wp_enqueue_script('Shibayu-Symantic');
	?>
	<?php wp_head(); ?>
</head>
<?php
    global $location_global;
    if(isset($_COOKIE['location-id'])){
        $location_data = get_post($_COOKIE['location-id']);
        $location_global['title'] = $location_data->post_title;
        $location_global['address'] = get_post_meta($location_data->ID,'address',true);
    };
?>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site Dashboad-wrapper" id="page">
    <header class="Header-wrapper">
      <div class="Flex-col Flex-end">
        <ul class="navbar-nav">
          <li>
            <a href="javascript:void(0)" class="Notification">
              <img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/notifications.svg" alt="">
              <span></span>
            </a>
          </li>
        </ul>
        <div class="dropdown">
          <a class="dropdown-toggle" href="javascript:void(0)" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Nome Utente</span><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/user-circle.svg" alt="" />
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
    </header>
