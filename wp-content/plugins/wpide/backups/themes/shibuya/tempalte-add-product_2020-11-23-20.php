<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d72d3a0b211"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/tempalte-add-product.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/tempalte-add-product_2020-11-23-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
check_access_of_page();

/**
 * Template Name: Product List
 */
if(!empty($_POST)): 
 $post = array(
    'post_author' => get_current_user_id(),
    'post_content' =>  $_POST['post_content'],
    'post_status' => "publish",
    'post_title' => $_POST['post_title'],
    'post_parent' => '',
    'post_type' => "product",
);

//Create post
$post_id = wp_insert_post( $post, $wp_error );

add_post_meta($post_id, '_thumbnail_id', $_POST['_thumbnail_id']);
wp_set_object_terms( $post_id, 'simple', 'product_type');
update_post_meta( $post_id, '_sku', $_POST['_sku'] );
update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, '_stock_status', 'instock');
update_post_meta( $post_id, '_regular_price', $_POST['_regular_price'] );
if($_POST['_sale_price']!==''){
    update_post_meta( $post_id, '_sale_price', $_POST['_sale_price'] );    
    update_post_meta( $post_id, '_price', $_POST['_sale_price'] );    
}else{
    update_post_meta( $post_id, '_price', $_POST['_regular_price'] );    
}

endif;
 get_header();


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>
    
<h1>Add Product</h1>
<div style="margin : 50px auto;max-width : 500px">
    <form name="product_create" method="POST">
        <div>
            <label>Title</label>
            <input name="post_title" id="post_title" />
        </div>
        <div>
            <label>Description</label>
            <textarea name="post_content" id="post_content" /></textarea>
        </div>
        <div>
            <label>Price</label>
            <input name="_regular_price" id="regular_price" />
        </div>
        <div>
            <label>Sale Price</label>
            <input name="_sale_price" id="sale_price" />
        </div>
        <div>
            <label>SKU</label>
            <input name="_sku" id="sku" />
        </div>
        <div>
            <label>Image</label>
            <input name="_media" id="media" />
            <input type="hidden" name="_thumbnail_id" id="media_id" />
        </div>
        <div>
            <input name="create_product" type="submit" id="create_product" value="create product" />
        </div>
    </form>
</div>
<?php 
 
 get_footer();