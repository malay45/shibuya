<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "1045e2434da35184e05d00fdaa76158d580f75d25d"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/single-location.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/single-location_2020-12-15-08.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="standard-page">

	<div class="page-header">
		<div class="container">
			<div class="title-line-top">
				<div class="breadcrumbs-site">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id=”breadcrumbs”>','</p>');
					} ?>
				</div>
				<h3><?php the_title();?></h3>
			</div>
		</div>
		<section class="Map-section">
  <div class="container">
    <div class="Inner-banner-wrapp">
      <?php the_field('map_iframe'); ?>
    </div>
  </div>
</section>
		<section class="Contact-content">
  <div class="container">
      <div class="row">
          <div class="col-sm-6 col-12">
            <div class="Colum-title With-img">
                <h3 class="Flex-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/clock.svg" alt="" /> Orario di apertura</h3>
            </div>
            <?php 
                $opendata = get_field('opening_hours',$location_id);
                print_rr($opendata);
            ?>
            <div class="Time-list">
                <?php 
                    foreach($opendata as $key=>$value){
                        if($value['off_day']){continue;}
                    ?>
                    <div class="Flex-col space-between">
                        <span><?php echo $key; ?></span>
                        <span><?php echo $value['opening_time'] ?> - <?php echo $value['closing_time']; ?></span>
                    </div>  
                    <?php    
                    }
                ?>
            </div>
          </div>
          <div class="col-sm-6 col-12">
            <div class="Colum-title With-img">
                <h3 class="Flex-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/location.svg" alt="" /> Indirizzo ritiro</h3>
            </div>
            <div class="dropdown Custom-dropdown show">
                                      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLinkSide" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                       <p>
                                       <b class="location_title_"><?php global $location_global;
                                              //  echo $location_global['title']; 
                                          ?>
                                        </b>
                                            <span class="location_address"><?php the_field('name_fe');; ?></span>
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
                       <a class="dropdown-item select_location" data-id="<?php echo $location_data->ID ?>" href="<?php echo get_permalink($location_data->ID); ?>"><span><?php // echo $location_data->post_title; ?></span><?php echo $address; ?></a>
                <?php 
                endforeach;
                endif; ?>
                </div>
                                    </div>
          </div>
      </div>
  </div>
</section>
	</div>

	<div class="page-content page-standard-content">

		<div class="container">
			<?php the_content();?>
		</div>
		
	</div>

</div>

<?php get_footer(); 

?>