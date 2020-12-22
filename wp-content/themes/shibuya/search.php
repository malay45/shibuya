<?php

/**
 * Template name: Search
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="home-featured">
	ciao
	<?php while ( have_posts() ) : the_post(); ?>

	<?php 
	if(isset($_GET['post_type'])) {
    $type = $_GET['post_type'];
    if($type == 'product') {
        load_template(TEMPLATEPATH . 'woocommerce/product-search.php');
    }
	}else{
	// Your current code
	} ?>

	<?php endwhile; ?>
</div>

<?php get_footer();
