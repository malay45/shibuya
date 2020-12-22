<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d219338bf19"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/checkout/form-checkout.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/checkout/form-checkout_2020-12-07-07.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
session_start();
for($i = 0; $i < 4; $i++) {
        $result .= mt_rand(0, 9);
    }
$_SESSION['otp'] = $result;
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
 <!-- Cart Wrapper -->
        <section class="Cart-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="Cart-Block">
                            <form action="">
                                <div class="Colum-title">
                                     <h3>I tuoi dati</h3>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Nome*</label>
                                            <input type="text" class="form-control" name="billing_first_name" placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Cognome*</label>
                                            <input type="text" class="form-control" name="billing_last_name"  placeholder="Cognome">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">E-mail*</label>
                                            <input type="text" class="form-control" name="billing_email"  placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Telefono*</label>
                                            <input type="text" class="form-control" name="billing_phone" placeholder="Telefono">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 padding-15">
                                        <div class="Flex-col space-between align-items"> <span class="txt">Desidero ricevere novità e promozioni. <a href="">Privacy Policy</a></span>

                                            <div
                                            class="form-group margin-0">
                                                <input type="checkbox" id="toggle_1" name="news_letter" class="chkbx-toggle" value="1">
                                                <label for="toggle_1"></label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12"> <span class="txt">Per ulteriori informazioni consulta la nostra <a href="">Privacy policy</a> e <a href="">Cookie policy</a></span>
                            <div
                                            class="form-group margin-0">
                                                <input type="checkbox" id="toggle_2" name="terms_condition" class="chkbx-toggle" value="1">
                                                <label for="toggle_2"></label>
                                        </div>
                            </div>
                        </div>
                        <div class="Colum-title">
                             <h3>Dati ritiro</h3>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Luogo di Ritiro">Luogo di Ritiro</label>
                                    <div class="Place-detail">
                                        <p> <b class="location_title"><?php global $location_global;
                                                    echo $location_global['title']; ?></b>
                        <span class="location_address"><?php echo $location_global['address']; ?></span>

                            </p><a href="javascript:void(0)" class="edit_address"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                <?php 
                                    if((int)date('H')>15){
                                        $addition = 1;    
                                    } else {
                                        $addition = 0;        
                                    }
                                    setlocale(LC_ALL, 'it_IT');
                                ?>
                                    <label for="Luogo di Ritiro">Data di Ritiro</label>
                                    <select name="pickup_date" id="" class="form-control">
                                        <!--<option value="">Seleziona la data</option>-->
                                        <?php for($i=1;$i<=15;$i++): $total = $addition + $i; ?>
                                        <option value="<?php echo date('Y-m-d',strtotime("+$total day")) ?>" style="color:#fff;" >
                                            <?php echo strftime("%e %B %Y",strtotime("+$total day")); ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p class="Note">* Campi obbligatori</p>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="Cart-Block">
                        <div class="Colum-title">
                             <h3>Riepilogo ordine</h3>

                        </div>
                        
                            <?php echo get_checkout_cart_table(); ?>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-2">&nbsp;</div>
                <div class="col-lg-6 col-10">
                    <div class="Number-verification">
                         <h4>Inserisci il tuo numero di telefono</h4>

                        <div class="Flex-col space-between">
                            <input type="text" class="form-control otp-number" name="otp-number"  value="" /> <a href="javascript:void(0)" class="Send-sms-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sms.svg" alt="">Invia codice di verifica</a>
                            
                        </div>
                        <div class="Flex-col space-between">
                            <span style="color:#fff;" class="otp_success"></span>
                        </div>    
                        <div class="Enter-passcode">
                             <h4>Inserisci il codice di 4 cifre che ti abbiamo inviato</h4>

                            <div class="form-group">
                                <input type="text" value="" maxlength="1" name="validation-code-1" class="form-control validation-code  validation-code-1" />
                                <input type="text"  value="" maxlength="1" name="validation-code-2" class="form-control validation-code  validation-code-2" />
                                <input type="text" value="" maxlength="1"  name="validation-code-3" class="form-control validation-code  validation-code-3" />
                                <input type="text" value="" maxlength="1"  name="validation-code-4" class="form-control validation-code  validation-code-4" />
                            </div>
                        </div>
                    </div> 
                    <a style="display:none;"  class="Continue-btn">
                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="" style="display: none;">
                        <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
                        <button type="submit" style="background: transparent;" class="button alt " name="woocommerce_checkout_place_order" id="place_order" value="Effettua ordine" data-value="Effettua ordine">Concludi ordine</button>
                    </a>

                </div>
            </div>
            </div>
        </section>
        <?php // do_action( 'woocommerce_checkout_order_review' ); ?>
</form> 

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
