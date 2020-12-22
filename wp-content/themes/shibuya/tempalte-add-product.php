<?php
check_access_of_page();

/**
 * Template Name: Product Add 
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