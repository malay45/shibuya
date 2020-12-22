<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d97baaac009"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/single-location.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/single-location_2020-12-08-11.php") )  ) ){
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
      <img src="<?php ?>/img/map.jpg" alt="" class="img-fluid" />
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
            <div class="Time-list">
                <div class="Flex-col space-between">
                    <span>Lunedí - Sabato</span>
                    <span>08.00 - 20.30</span>
                </div>
                <div class="Flex-col space-between">
                    <span>Domenica</span>
                    <span>08.00 - 13.30</span>
                </div>
            </div>
          </div>
          <div class="col-sm-6 col-12">
            <div class="Colum-title With-img">
                <h3 class="Flex-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/location.svg" alt="" /> Indirizzo ritiro</h3>
            </div>
            <div class="Place-detail">
              <p>
                <b>Conad Reggio Sud</b>
                <span>Via Maiella 55 - 42123</span>
                <span>Reggio Emilia RE</span>
              </p>
              <a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/edit.svg" alt="" /></a>
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