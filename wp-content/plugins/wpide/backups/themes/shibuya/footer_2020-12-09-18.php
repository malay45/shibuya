<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1045e2434da35184e05d00fdaa76158d2d9e0d5003"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/footer_2020-12-09-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<footer class="footer container">
            <div class="Flex-col space-between">
                <p>© 2020 MYSHIBUYA</p>
                <ul class="Footer-menu">
                    <li> <a href="">Privacy Policy</a>

                    </li>
                    <li> <a href="">Cookie Policy</a>

                    </li>
                    <li> <a href="">Dati Aziendali</a>

                    </li>
                </ul>
            </div>
        </footer>
<section class="Location-selection-modal" style="display:none;">
            <div class="Outer-cell">
                <div class="Inner-cell">
                    <div>
                        <div class="selection-logo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/Logo.svg" alt="" />
                        </div>
                         <h1><span>Benvenuto su</span> MYSHIBUYA</h1>
<?php  global $location_global;  ?>
                        <div class="Selection-wrapp ">
                            <div class="dropdown <?php if(!empty($location_global)){ echo 'Edit-location'; } ?>"> 
                            
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php global $location_global; if(!empty($location_global)): ?>
                                            <p> <b class="location_title"><?php 
                                                   // echo $location_global['title']; 
                                               ?></b>
                        <span class="location_address"><?php echo $location_global['address']; ?></span>

                    </p> <span href="javascript:void(0)" class="edit_address"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></span>
                                        <?php else: ?>
                                            Seleziona il punto di ritiro
                                        <?php endif; ?>
                                </a> 
                                <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">`
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
                </div>
            </div>
            <input type="hidden" class="location_data" value='<?php echo json_encode($location_array); ?>' />
        </section>
</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<div class="loader-search-wrap">
    <div class="loader-search simple-circle"></div>
</div>
</body>

</html>

