<?php

/**
 * Template name: Template standard
 */

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
	</div>

	<div class="page-content page-standard-content">

		<div class="container">
			<?php the_content();?>
		</div>
		
	</div>

</div>

<?php get_footer(); 

?>