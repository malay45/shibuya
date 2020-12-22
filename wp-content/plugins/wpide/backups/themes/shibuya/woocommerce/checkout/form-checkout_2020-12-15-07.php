<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1045e2434da35184e05d00fdaa76158d580f75d25d"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/checkout/form-checkout.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/checkout/form-checkout_2020-12-15-07.php") )  ) ){
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
setlocale(LC_ALL, 'it_IT');
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
                                        <div class="Flex-col space-between align-items"> 
                                        <span class="txt">Desidero ricevere novità e promozioni e accetto la vostra <a href="">Privacy Policy</a></span>
                                        <div class="form-group margin-0">
                                            <input type="checkbox" id="toggle_1" name="news_letter" class="chkbx-toggle" value="1">
                                            <label for="toggle_1"></label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="Flex-col space-between align-items"> 
                                <span class="txt">* Accetto la Politica sulla <a href="#">privacy</a> e i <a href="#">Termini di utilizzo</a> di My Shibuya</span>
                                <div class="form-group margin-0">
                                    <input type="checkbox" id="toggle_2" name="terms_condition" class="chkbx-toggle" value="1">
                                    <label for="toggle_2"></label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="Colum-title">
                             <h3>Dati ritiro</h3>

                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Luogo di Ritiro">Luogo di Ritiro*</label>
                                    <div class="dropdown Custom-dropdown show">
                                      <a class="dropdown-toggle" data-display="static" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <p>
                                       <b class="location_title_"><?php global $location_global;
                                              //  echo $location_global['title']; 
                                          ?>
                                        </b>
                                            <span class="location_address"><?php echo $location_global['address']; ?></span>
                                        </p>
                                        <span class="edit_address"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></span>
                                      </a>
                                    
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php
                $args = array(
                  'numberposts' => -1,
                  'post_type'   => 'location'
                );
                 
                $location = get_posts( $args );
                if(!empty($location)):
                $location_array = array();
                foreach($location as $location_data):
                    $address = get_post_meta($location_data->ID,'name_fe',true);
                    $location_array[] = array(
                        'id' => $location_data->ID,
                        'title' => $location_data->post_title,
                        'address' => $address
                    );
                ?>
                       <a class="dropdown-item select_location" data-id="<?php echo $location_data->ID ?>" href="javascript:void(0)"><span><?php // echo $location_data->post_title; ?></span><?php echo $address; ?></a>
                <?php 
                endforeach;
                endif; ?>
                </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                <?php 
                                    date_default_timezone_set('CET');
                                
                                    if(date('H')>=16){
                                        $addition = 2;    
                                    } else {
                                        $addition = 1;        
                                    }
                                    setlocale(LC_ALL, 'it_IT');
                                    
                                    $start = $addition;
                                    $end = $start + 15;
                                    
                                    date_default_timezone_set('UTC');
                                    
                                    $dates = get_vendor_open_dates($_COOKIE['location-id']);
                                    
                                ?>
                                    <label for="Luogo di Ritiro">Data di Ritiro*</label>
                                   
                                    <!--<input name="" class="pickup_date form-control"-->
                                    <!--    data-dd-max-date="<?php echo date('m/d/Y',strtotime("+$end day")); ?>"-->
                                    <!--    data-dd-min-date="<?php echo date('m/d/Y',strtotime("+$start day")); ?>"-->
                                        <?php /* data-dd-default-date="<?php date('m/d/Y',strtotime("+$start day")); ?>" */ ?>
                                    <!--    placeholder="Scegli una data per il ritiro"-->
                                        <?php /* value="<?php echo strftime("%e %B %Y",strtotime("+$start day")); ?>"   */ ?>
                                         
                                    <!--/>-->
                                    <input name="" class="pickup_date form-control"
                                       
                                        placeholder="Scegli una data per il ritiro"
                                        data-dd-enabled-days='<?php echo implode(',',$dates['datapicker_format']) ?>'
                                         
                                    />
                                    <input type="hidden" name="pickup_date" class=" form-control" id="pickup_date" value="<?php echo date('Y-m-d',strtotime("+$start day")) ?>" />
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
                <div class="col-lg-6 col-0">&nbsp;</div>
                <div class="col-lg-6 col-12">
                    <div class="Number-verification" data-id="<?php echo $_SESSION['otp']  ?>">
                        <h4>Conferma il tuo ordine con il codice che ti arriva nel prossimo SMS: inserisci qui il tuo numero di cellulare.</h4>

                        <div class="Flex-col space-between">
                            <input type="text" class="form-control otp-number" name="otp-number"  value="" /> <button disabled="disabled" href="javascript:void(0)" class="Send-sms-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sms.svg" alt="">Invia codice di verifica</button>

                        </div>
                        <div class="Flex-col space-between">
                            <span style="color:#fff;" class="otp_success"></span>
                        </div>    
                        <div class="Enter-passcode" style="display:none">
                            <h4>Inserisci il codice di 4 cifre che ti abbiamo inviato</h4>

                            <div class="form-group">
                                <input type="text" value="" maxlength="1" name="validation-code-1" class="form-control validation-code  validation-code-1" />
                                <input type="text"  value="" maxlength="1" name="validation-code-2" class="form-control validation-code  validation-code-2" />
                                <input type="text" value="" maxlength="1"  name="validation-code-3" class="form-control validation-code  validation-code-3" />
                                <input type="text" value="" maxlength="1"  name="validation-code-4" class="form-control validation-code  validation-code-4" />
                            </div>
                        </div>
                    </div> 
                    <a   class="Continue-btn">
                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="" style="display: none;">
                        <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
                        <button disabled="disalbed" type="submit" style="background: transparent;" class="button alt " name="woocommerce_checkout_place_order" id="place_order" value="Effettua ordine" data-value="Effettua ordine">Concludi ordine</button>
                    </a>

                </div>
            </div>
            </div>
        </section>
        <?php // do_action( 'woocommerce_checkout_order_review' ); ?>
</form> 

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
