<?php 

add_shortcode('ajax_search','ajax_search_init');

function ajax_search_init(){
    ob_start();    
    ?>
    
    <div class="search-result">
        <div class="search-result__wrap">
            <p>I tuoi risultati</p>
            <div class="loader simple-circle"></div>
        </div>
    </div>
    
    <?php
    $data =  ob_get_contents();
    ob_end_clean();
    return $data;
}

add_action('wp_ajax_ajax_search','ajax_search');
add_action('wp_ajax_nopriv_ajax_search','ajax_search');

function ajax_search(){
  
    global $wpdb;
    $searchtext = $_POST['search'];
    $_POST['search'] = strtolower(trim($_POST['search']));
    $string_array = explode(' ',$_POST['search']);
    if(!empty($string_array)){
        $post_title = '';
        $sku = '';
        $term_name = '';
        $i=0;
        foreach($string_array as $string){
            $i++;
            $or ='';
            if($i< count($string_array)){
              $or = ' AND ';  
            
            }
            $post_title .="$wpdb->posts.post_title LIKE '%".trim($string)."%' $or ";
            $sku .= "$wpdb->postmeta.meta_value LIKE '%".trim($string)."%' $or ";
            $term_name .= "$wpdb->terms.name  LIKE '%".trim($string)."%' $or  ";
        }
    }
    $search_query = ( "SELECT DISTINCT(ID) FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->posts.ID=$wpdb->postmeta.post_id LEFT JOIN $wpdb->term_relationships ON $wpdb->posts.ID=$wpdb->term_relationships.object_id LEFT JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id=$wpdb->term_taxonomy.term_taxonomy_id LEFT JOIN $wpdb->terms ON $wpdb->term_taxonomy.term_taxonomy_id=$wpdb->terms.term_id   WHERE  
        $wpdb->posts.post_type='product' AND $wpdb->posts.post_status='publish' AND 
        ( ( $post_title )   OR ($wpdb->postmeta.meta_key='_sku' AND ( $sku )) 
        OR ($wpdb->term_taxonomy.taxonomy='autori' AND ($term_name) ))  
        ORDER BY ID DESC LIMIT 10" );
    
    $results_product = $wpdb->get_results( $search_query , ARRAY_A );

    $search_query_count = ( "SELECT COUNT(DISTINCT(ID)) FROM $wpdb->posts INNER JOIN $wpdb->postmeta ON $wpdb->posts.ID=$wpdb->postmeta.post_id INNER JOIN $wpdb->term_relationships ON $wpdb->posts.ID=$wpdb->term_relationships.object_id INNER JOIN $wpdb->term_taxonomy ON $wpdb->term_relationships.term_taxonomy_id=$wpdb->term_taxonomy.term_taxonomy_id INNER JOIN $wpdb->terms ON $wpdb->term_taxonomy.term_taxonomy_id=$wpdb->terms.term_id   WHERE  
    $wpdb->posts.post_type='product' AND $wpdb->posts.post_status='publish' AND 
        ( ( $post_title )   OR ($wpdb->postmeta.meta_key='_sku' AND ( $sku )) 
        OR ($wpdb->term_taxonomy.taxonomy='autori' AND ($term_name) ))  
    " );
    $results_product_count = $wpdb->get_var( $search_query_count  );
   
    ?>
    
    <div class="search-result__content">
                            
        <?php if(!empty($results_product)): ?>
            <h3 class="title-ajax-search">I tuoi risultati di ricerca</h3>
            <div class="search-product-loop">
                <?php
                foreach($results_product as $product_id) {
                    $product = wc_get_product($product_id['ID']);
                    $cat_ids =($product->get_category_ids());
                ?>      	
                  
                    <div class="product-item product-ajax-search">
                        <div class="product-image">
                            <a href="<?php echo get_permalink($product->get_id()); ?>">
                                <img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
                            </a>
                        </div>
                        <div class="product-info">
                            <h4><?php echo $product->get_title(); ?></h4>
                            <div class="product-price">
                                <?php 
                                if ($product->is_type( 'simple' )) {
                                    // Prodotto Semplice
                                    $regular_price = $product->is_type('simple') ? $product->get_regular_price( 'min', true ) : $product->get_regular_price();
                                    $sale_price = $product->is_type('simple') ? $product->get_sale_price( 'min', true ) : $product->get_sale_price();

                                    if($regular_price !== $sale_price && $product->is_on_sale()) :
                                        $percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
                                        $percentage_txt = __(' Save', 'woocommerce' ).' '.$percentage;
                                        $price = '<p class="product-price-tickr"><del>' . wc_price($regular_price) . '</del> <span class="prezzo-vendita">' . wc_price($sale_price) . '</span></p>';
                                        echo $price; ?>
                                    <?php elseif ($regular_price) :
                                        $price = wc_price($regular_price);
                                        echo '<p class="product-price-tickr">' . $price . '</p>';
                                    endif;

                                }elseif($product->is_type('variable')) {
                                    // Prodotto variabilie
                                    $regular_price = $product->is_type('variable') ? $product->get_variation_regular_price( 'min', true ) : $product->get_regular_price();
                                    $sale_price = $product->is_type('variable') ? $product->get_variation_sale_price( 'min', true ) : $product->get_sale_price();

                                    if ( $regular_price !== $sale_price && $product->is_on_sale()) {
                                        $percentage = round( ( $regular_price - $sale_price ) / $regular_price * 100 ).'%';
                                        $percentage_txt = __(' Save', 'woocommerce' ).' '.$percentage;

                                        $price = '<p class="product-price-tickr"><del>' . wc_price($regular_price) . '</del><span class="prezzo-vendita">' . wc_price($sale_price) . '</span></p>';
                                        echo $price; 
                                    };
                                    if ( $regular_price === $sale_price) {
                                        $price = wc_price($regular_price);
                                        echo '<p class="product-price-tickr">' . $price . '</p>';
                                    }
                                }                                              
                                ?>
                            </div>
                        </div>

                    </div>

                <?php } ?>
            </div>
        <?php if($results_product_count>10): ?>
            <a href="<?php echo get_permalink(7885); ?>?search=<?php echo urlencode($searchtext); ?>">Guarda tutti i <?php echo $results_product_count ?> prodotti</a>
        <?php endif; ?>
        <?php else: ?>
            <p>Nessun prodotto trovato</p>
        <?php endif; ?>
    </div>
    <?php
    die();
}