<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db89437034e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/content-product.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/content-product_2020-12-01-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-4">
    <div class="Product-col">
        <div class="product-img">
            <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'full' )[0] ?>" alt="" class="img-fluid" />
        </div>
        <div class="Product-detail">
             <h3 class="Pro-title"><a href="javascript:void(0)"><?php $product->get_title(); ?></a></h3>

            <p><?php echo $product->get_description(); ?></p>
            <div class="Flex-col space-between align-items"> <span class="Pro-price"><?php echo $product->get_price(); ?></span>
            <a href="javascript:void(0)" class="Pro-add-cart"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/add.svg" alt="" /></a>

            </div>
        </div>
    </div>
</div>