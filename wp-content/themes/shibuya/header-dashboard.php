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
        <ul class="navbar-nav" style="display: none">
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
