<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1045e2434da35184e05d00fdaa76158d2d9e0d5003"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/front-page.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/front-page_2020-12-09-17.php") )  ) ){
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
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

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
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Video.jpg" alt="" class="img-fluid" />
    </div>
</section>
<!-- Content Wrapper -->
<section>
    <div class="container">
        <div class="Left-cnt-wrapper">
            <!-- Tab Wrapper -->
            <ul class="nav nav-tabs UI-tab" id="myTab" role="tablist">
                <li class="nav-item"> <a class="nav-link load-parent-cat active" id="TUTTE-tab" data-toggle="tab" href="javascript:void(0)" data-id="all" role="tab" aria-selected="false">TUTTE</a>

                </li>
                <?php
                $terms = get_terms('product_cat', array(
                    'hide_empty' => false,
                    'parent' => 0,
                    'exclude' => 15
                ));
                $i = 0;
                foreach ($terms as $term_data) :
                    if ($i == 0) {
                        $current_cat = $term_data->term_id;
                    }
                ?>
                    <li class="nav-item">
                        <a class="nav-link load-parent-cat <?php if ($i == 0) {
                                                               // echo 'active';
                                                            } ?>" data-toggle="tab" href="javascript:void(0)" role="tab" data-id="<?php echo strtoupper($term_data->term_id); ?>" aria-selected="false"><?php echo strtoupper($term_data->name); ?></a>
                    </li>
                <?php
                    $i++;
                endforeach; ?>

            </ul>
            <!-- Tab Content Wrapper -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="TUTTE" role="tabpanel" aria-labelledby="TUTTE-tab">
                    <ul class="Sub-category-list">
                        <?php $terms = get_terms('product_cat', array(
                            'hide_empty' => false,
                            'parent' => $current_cat,
                            'exclude' => 15
                        ));
                        $i = 0;
                        foreach ($terms as $term_data) :
                            if ($i == 0) {
                                $current_child = $term_data->term_id;
                            }
                            $thumbnail_id = get_woocommerce_term_meta($term_data->term_id, 'thumbnail_id', true);

                            // get the image URL
                            $image = wp_get_attachment_url($thumbnail_id);
                        ?>
                            <li data-id="<?php echo $term_data->term_id; ?>" class="<?php if ($i == 0) {
                                                                                            echo 'active';
                                                                                        } ?> child-cat-list"> <a href="javascript:void(0)">
                                    <img src="<?php echo $image ?>" alt="" />
                                    <span><?php echo strtoupper($term_data->name); ?></span>
                                </a>

                            </li>
                        <?php $i++;
                        endforeach; ?>
                    </ul>
                    <section class="Product-listing">
                        <div class="row Product-listing-data">
                            <?php
                            $args = array(
                                'posts_per_page' => -1,
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'id',
                                        'terms' => $current_child
                                    ),
                                ),
                            );



                            $the_query = new WP_Query($args);

                            // The Loop
                            if ($the_query->have_posts()) {

                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    global $product;

                                    wc_get_template_part('content', 'product');
                                }
                            } else {
                                // no posts found
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                            ?>



                        </div>
                    </section>
                </div>

            </div>
        </div>
        <div class="Right-cnt-wrapper">
            <div class="Place-info">
                <div class="Colum-title">
                    <h3>Luogo di Ritiro</h3>

                </div>
                
                <div class="dropdown Custom-dropdown show">
                                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkSide" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <p>
                                       <b class="location_title_"><?php global $location_global;
                                              //  echo $location_global['title']; 
                                          ?>
                                        </b>
                                            <span class="location_address"><?php echo $location_global['address']; ?></span>
                                        </p>
                                        <span class="edit_address"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></span>
                                      </a>
                                    
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLinkSide">
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
            <div class="widget_shopping_cart_content">
            <p style="color:#fff;" class="woocommerce-mini-cart__empty-message"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</section>


<?php get_footer();
