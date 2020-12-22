<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db89437034e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/checkout/form-checkout.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/checkout/form-checkout_2020-12-01-18.php") )  ) ){
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

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
 <!-- Cart Wrapper -->
        <section class="Cart-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <div class="Cart-Block">
                            <form action="">
                                <div class="Colum-title">
                                     <h3>I tuoi dati</h3>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Nome*</label>
                                            <input type="text" class="form-control" placeholder="Nome">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Cognome*</label>
                                            <input type="text" class="form-control" placeholder="Cognome">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">E-mail*</label>
                                            <input type="text" class="form-control" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="form-group">
                                            <label for="Nome*">Telefono*</label>
                                            <input type="text" class="form-control" placeholder="Telefono">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 padding-15">
                                        <div class="Flex-col space-between align-items"> <span class="txt">Desidero ricevere novità e promozioni. <a href="">Privacy Policy</a></span>

                                            <div
                                            class="form-group margin-0">
                                                <input type="checkbox" id="toggle_1" class="chkbx-toggle" value="1">
                                                <label for="toggle_1"></label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12"> <span class="txt">Per ulteriori informazioni consulta la nostra <a href="">Privacy policy</a> e <a href="">Cookie policy</a></span>

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
                                        <p> <b>Conad Reggio Sud</b>
 <span>Via Maiella 55 - 42123</span>
 <span>Reggio Emilia RE</span>

                                        </p> <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></a>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Luogo di Ritiro">Data di Ritiro</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleziona la data</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <p class="Note">* Campi obbligatori</p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="Cart-Block">
                        <div class="Colum-title">
                             <h3>Riepilogo ordine</h3>

                        </div>
                        <table class="Item-table-list">
                            <thead>
                                <tr>
                                    <td width="25%">Qtà</td>
                                    <td width="25%">Prodotto</td>
                                    <td width="50%" align="right">Prezzo</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1x</td>
                                    <td>Titolo prodotto</td>
                                    <td align="right">12,50 € <a href=""><img src="img/delete.svg" alt="" /></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr></hr>
                                    </td>
                                </tr>
                                <tr class="small-txt">
                                    <td colspan="2" align="right">Totale Ordine</td>
                                    <td align="right">125,00 <span>€</span>
                                    </td>
                                </tr>
                                <tr class="small-txt">
                                    <td colspan="2" align="right">IVA (10% incluso):</td>
                                    <td align="right">12,50</td>
                                </tr>
                                <tr class="Total-txt">
                                    <td colspan="2" align="right">Totale</td>
                                    <td align="right">125,00 <span>€</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr></hr>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">&nbsp;</div>
                <div class="col-6">
                    <div class="Number-verification">
                         <h4>Inserisci il tuo numero di telefono</h4>

                        <div class="Flex-col space-between">
                            <input type="text" class="form-control" /> <a href="" class="Send-sms-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sms.svg" alt="">Invia codice di verifica</a>

                        </div>
                        <div class="Enter-passcode">
                             <h4>Inserisci il codice di 4 cifre che ti abbiamo inviato</h4>

                            <div class="form-group">
                                <input type="text" class="form-control" />
                                <input type="text" class="form-control" />
                                <input type="text" class="form-control" />
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div> <a href="" class="Continue-btn">Concludi ordine</a>

                </div>
            </div>
            </div>
        </section>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
