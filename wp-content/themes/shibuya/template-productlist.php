<?php
check_access_of_page();

/**
 * Template Name: Product List
 */

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    wp_delete_post( $_GET['id'] );
    
}
 get_header();


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>
    
<h1>List of Product</h1>
<div style="margin : 50px auto;max-width : 500px">
    <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1
            );
        $edit_link = get_field('edit_product_page','option');
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                global $post;
                
                ?>
                <div style="display:flex;">
                    <div style="padding : 20px;">
                        <a href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"><?php  the_ID(); ?></a>
                    </div>
                    <div style="padding : 20px;">
                        <a href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"><?php  the_title(); ?></a>
                    </div>
                    <div  style="padding : 20px;">
                        <?php echo wc_price(get_post_meta($post->ID,'_price',true)); ?>
                    </div>
                    <div  style="padding : 20px;">
                        <a class="product_delete" href="javascript:void(0)" onclick="delete_product(<?php  the_ID(); ?>)" data-id="<?php  the_ID(); ?>">Delete</a>
                    </div>
                </div>
                
                <?php
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    ?>
        
</div>
<script>
    function delete_product(product_id){
        var r = confirm("Are you sure want to delete?");
        if (r == true) {
            window.location.href='<?php echo the_permalink() ?>?action=delete&id='+product_id;
        }   
    }
</script>
<?php 
 
 get_footer();