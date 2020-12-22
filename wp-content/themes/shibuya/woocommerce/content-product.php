<?php
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
             <h3 class="Pro-title"><a href="javascript:void(0)"><?php echo $product->get_title(); ?></a></h3>

            <p><?php echo $product->get_description(); ?></p>
            <div class="price-details-item Flex-col space-between align-items"> <span class="Pro-price"><?php echo $product->get_price_html(); ?></span>
            <a href="javascript:void(0)" data-id="<?php echo $product->get_id(); ?>" class="Pro-add-cart"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/add.svg" alt="" /></a>

            </div>
        </div>
    </div>
</div>