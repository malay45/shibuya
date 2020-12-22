<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d4981022977"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-orderlist.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-orderlist_2020-11-24-07.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
check_access_of_page();

/**
 * Template Name: Order List
 */

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    wp_delete_post( $_GET['id'] );
    
}
 get_header();


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>
    
<h1>List of Order</h1>
<div style="margin : 50px auto;max-width : 500px">
    <?php
        $args = array(
            'post_type' => 'shop_order',
            'posts_per_page' => -1,
            'post_status' => array_keys( wc_get_order_statuses() )
            );
        $edit_link = get_field('edit_product_page','option');
        $view_link = get_field('edit_product_page','option');
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                global $post;
                print_rr($post);    
                print_rr($post);    
                ?>
                <div style="display:flex;">
                    <div style="padding : 20px;">
                        <?php  the_ID(); ?>
                    </div>
                    <div style="padding : 20px;">
                        <?php  the_title(); ?>
                    </div>
                    <div  style="padding : 20px;">
                        <?php echo wc_price(get_post_meta($post->ID,'_price',true)); ?>
                    </div>
                    <div  style="padding : 20px;">
                        <a class="product_delete" href="<?php echo $view_link; ?>?id=<?php  the_ID(); ?>" >View</a>
                    </div>
                    <div  style="padding : 20px;">
                        <a class="product_delete" href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"  >Edit</a>
                    </div>
                    <div  style="padding : 20px;">
                        <a class="product_delete" href="javascript:void(0)" onclick="delete_order(<?php  the_ID(); ?>)" data-id="<?php  the_ID(); ?>">Delete</a>
                    </div>
                </div>
                
                <?php
            endwhile;
        } else {
            echo __( 'No orders found' );
        }
        wp_reset_postdata();
    ?>
        
</div>
<script>
    function delete_order(product_id){
        var r = confirm("Are you sure want to delete?");
        if (r == true) {
            window.location.href='<?php echo the_permalink() ?>?action=delete&id='+product_id;
        }   
    }
</script>
<?php 
 
 get_footer();