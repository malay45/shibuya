<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1045e2434da35184e05d00fdaa76158d2d9e0d5003"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/cart/mini-cart.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/cart/mini-cart_2020-12-09-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_mini_cart' ); ?>
<div class="widget_shopping_cart_content">
<?php
 if ( ! WC()->cart->is_empty() && WC()->cart->cart_contents_total >0 ) : ?>
	<div class="Pro-total-info">
			<div class="Colum-title Flex-col space-between">
                    <h3>Totale Ordine <span><?php echo WC()->cart->get_cart_total(); ?></span></h3>

                </div>
			
			<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<div class="Item-total-detail">
					<div class="Pro-item-info">
                        <div class="Pro-img">
                            <?php echo $thumbnail; ?>
                        </div> <span><?php echo $product_name ; ?></span>

                    </div>
                    <div class="Pro-item-count">
                        <div class="input-group">
                         <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/minus.svg" alt="">
                                </button>
                            </span>

                            <input data-id="<?php echo $cart_item_key; ?>"  type="text" name="qty[<?php echo $cart_item_key; ?>]" class="form-control input-number" value="<?php echo $cart_item['quantity']; ?>" min="1" max="10"> <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/plus.svg" alt="">
                                </button>
                            </span>

                        </div> <span class="Item-price">
                        <?php 
                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                        ?>
                        </span>
                        <a data-id="<?php echo $cart_item_key; ?>" href="javascript:void(0)" class="Delete-item"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>

                    </div>

					</div>
					<?php
				}
			}

			?>
	</div>
	<div class="Order-btn"> 
        <a href="<?php echo  wc_get_checkout_url() ?>" class="btn-primary">Completa l’ordine</a>
	</div>
<?php else : ?>

	<p class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
</div>