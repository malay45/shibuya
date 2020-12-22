<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db89437034e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/front-page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/front-page_2020-12-01-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>
 <!-- Banner -->
        <section class="Banner-section">
            <div class="container">
                <div class="caption">
                     <h2>Il tuo sushi sempre fresco.</h2>

                     <h3>Fai il tuo ordine adesso!</h3>

                </div>
            </div>
            <div class="Banner-img">
                <img src="img/Video.jpg" alt="" class="img-fluid" />
            </div>
        </section>
        <!-- Content Wrapper -->
        <section>
            <div class="container">
                <div class="Left-cnt-wrapper">
                    <!-- Tab Wrapper -->
                    <ul class="nav nav-tabs UI-tab" id="myTab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" id="TUTTE-tab" data-toggle="tab" href="#TUTTE"
                            role="tab" aria-controls="TUTTE" aria-selected="true">TUTTE</a>

                        </li>
                        <li class="nav-item"> <a class="nav-link" id="SUSHI-tab" data-toggle="tab" href="#SUSHI" role="tab"
                            aria-controls="SUSHI" aria-selected="false">SUSHI</a>

                        </li>
                        <li class="nav-item"> <a class="nav-link" id="SASHIMI-tab" data-toggle="tab" href="#SASHIMI"
                            role="tab" aria-controls="SASHIMI" aria-selected="false">SASHIMI</a>

                        </li>
                        <li class="nav-item"> <a class="nav-link" id="CONTORNI-tab" data-toggle="tab" href="#CONTORNI"
                            role="tab" aria-controls="CONTORNI" aria-selected="false">CONTORNI</a>

                        </li>
                    </ul>
                    <!-- Tab Content Wrapper -->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="TUTTE" role="tabpanel" aria-labelledby="TUTTE-tab">
                            <ul class="Sub-category-list">
                                <li class="active"> <a href="">
                  <img src="img/uramaki-filtro.png" alt="" />
                  <span>Uramaki</span>
                </a>

                                </li>
                                <li> <a href="">
                  <img src="img/nigiri.png" alt="" />
                  <span>Nigiri</span>
                </a>

                                </li>
                                <li> <a href="">
                  <img src="img/Hosomaki.png" alt="" />
                  <span>Hosomaki</span>
                </a>

                                </li>
                            </ul>
                            <section class="Product-listing">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Misto-Sushi.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Misto Sushi</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Uramaki-California.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Uramaki California</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Misto-Uramaki.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Misto Uramaki</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Misto-Sushi.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Misto Sushi</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Uramaki-California.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Uramaki California</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="Product-col">
                                            <div class="product-img">
                                                <img src="img/Misto-Uramaki.jpg" alt="" class="img-fluid" />
                                            </div>
                                            <div class="Product-detail">
                                                 <h3 class="Pro-title"><a href="">Misto Uramaki</a></h3>

                                                <p>Riso cotto, Salmone, Tonno, Branzino, Surimi, Coda di Mazzancolle, Avocado,
                                                    Alga Nori, Sesamo.</p>
                                                <div class="Flex-col space-between align-items"> <span class="Pro-price">€ 12,50</span>
 <a href="" class="Pro-add-cart"><img src="img/add.svg" alt="" /></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane fade" id="SUSHI" role="tabpanel" aria-labelledby="SUSHI-tab">...</div>
                        <div class="tab-pane fade" id="SASHIMI" role="tabpanel" aria-labelledby="SASHIMI-tab">...</div>
                        <div class="tab-pane fade" id="CONTORNI" role="tabpanel" aria-labelledby="CONTORNI-tab">...</div>
                    </div>
                </div>
                <div class="Right-cnt-wrapper">
                    <div class="Place-info">
                        <div class="Colum-title">
                             <h3>Luogo di Ritiro</h3>

                        </div>
                        <div class="Place-detail">
                            <p> <b>Conad Reggio Sud</b>
 <span>Via Maiella 55 - 42123</span>
 <span>Reggio Emilia RE</span>

                            </p> <a href=""><img src="img/edit.svg" alt="" /></a>

                        </div>
                    </div>
                    <div class="Pro-total-info">
                        <div class="Colum-title Flex-col space-between">
                             <h3>Totale Ordine <span>12,50 €</span></h3>

                        </div>
                        <div class="Item-total-detail">
                            <div class="Pro-item-info">
                                <div class="Pro-img">
                                    <img src="img/Filtro-Sashimi.png" alt="">
                                </div> <span>Misto Sushi</span>

                            </div>
                            <div class="Pro-item-count">
                                <div class="input-group"> <span class="input-group-btn">
                  <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                      <img src="img/minus.svg" alt="">
                  </button>
              </span>

                                    <input type="text" name="quant[1]" class="form-control input-number"
                                    value="1" min="1" max="10"> <span class="input-group-btn">
                  <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                    <img src="img/plus.svg" alt="">
                  </button>
              </span>

                                </div> <span class="Item-price">12,50</span>
 <a href="" class="Delete-item"><img src="img/delete.svg" alt="" /></a>

                            </div>
                        </div>
                    </div>
                    <div class="Order-btn"> <a href="" class="btn-primary">Completa l’ordine</a>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <section class="Location-selection-modal">
            <div class="Outer-cell">
                <div class="Inner-cell">
                    <div>
                        <div class="selection-logo">
                            <img src="img/Logo.svg" alt="" />
                        </div>
                         <h1><span>Benvenuto su</span> MYSHIBUYA</h1>

                        <div class="Selection-wrapp">
                            <div class="dropdown show"> <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Seleziona il punto di ritiro
              </a> 
                                <div class="dropdown-menu show" aria-labelledby="dropdownMenuLink"> <a class="dropdown-item" href="#"><span>Conad Reggio Sud</span>Via Maiella 55 - 42123 Reggio Emilia RE</a>

                                    <a
                                    class="dropdown-item" href="#"><span>Conad Reggio Sud</span>Via Maiella 55 - 42123 Reggio Emilia RE</a>
                                        <a
                                        class="dropdown-item" href="#"><span>Conad Reggio Sud</span>Via Maiella 55 - 42123 Reggio Emilia RE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer();
