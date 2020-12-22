<?php
check_access_of_page();

/**
 * Template Name: Order Sending
 */

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    wp_delete_post( $_GET['id'] );
    
}
 get_header('dashboard');


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>
<div class="Content-Wrapper">
      <div class="Heading">
        <h1>Invio ordini del 10/11/2020</h1>
      </div>
      <div class="Filter-wrapper">
        <form action="">
          <div class="row">
            <div class="col-3">
              <a href="" class="btn btn-primary">Invio Ordini (66)</a>
            </div>
            <div class="col-3">
             
            </div>
            <div class="col-2">
              
            </div>
            <div class="col-4">
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Seleziona punto vendita</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="Data-table Table-wrapper">
        <!--<div class="Table-Head">-->
        <!--  <table>-->
        <!--    <thead class="Height-0">-->
        <!--      <tr style="height:0px;">-->
        <!--        <th width="2%" style="height:0px;">-->
        <!--             <input type="checkbox" >-->
        <!--        </th>-->
        <!--        <th width="23%" style="height:0px;"><span>Ordine</span></th>-->
        <!--        <th width="9%" style="height:0px;"><span>Data di ritiro</span></th>-->
        <!--        <th width="11%" style="height:0px;"><span>Stato</span></th>-->
        <!--        <th width="11%" style="height:0px;"><span>Punto Vendita</span></th>-->
        <!--        <th width="14%" style="height:0px;"><span>Data ordine</span></th>-->
        <!--        <th width="14%" style="height:0px;"><span>Totale</span></th>-->
        <!--        <th width="20%" style="height:0px;" align="right"><span>Azioni</span></th>-->
        <!--      </tr>-->
        <!--    </thead>-->
        <!--  </table>-->
        <!--</div>-->
        <div class="Table-Head">
          <table class="Table-sorting">
            <thead>
              <tr>
                <th width="2%">
                  <div class="Custom-check">
                     <input type="checkbox" id="todo" name="todo" value="todo">
                     <label for="todo" data-content="Get out of bed"></label>
                  </div>
                </th>
                <th width="23%"><span>Ordine</span></th>
                <th width="9%"><span>Data di ritiro</span></th>
                <th width="11%"><span>Stato</span></th>
                <th width="11%"><span>Punto Vendita</span></th>
                <th width="14%"><span>Data ordine</span></th>
                <th width="14%"><span>Totale</span></th>
                <th width="20%" align="right"><span>Azioni</span></th>
              </tr>
            </thead>
            <tbody>
        <?php
            $args = array(
            'post_type' => 'shop_order',
            'posts_per_page' => -1,
            'post_status' => array_keys( wc_get_order_statuses() )
            );
        $edit_link = get_field('edit_order_page','option');
        $view_link = get_field('view_order_page','option');
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                global $post;    
                $order = new WC_Order( $post->ID );
                $order_data = $order->get_data(); // The Order data

                
                ?>
                  <tr>
                <td>
                  <div class="Custom-check">
                     <input type="checkbox" id="todo1" name="todo1" value="todo1">
                     <label for="todo1" data-content="Get out of bed"></label>
                  </div>
                </td>
                <td><span><?php  echo $order->get_billing_first_name() .' '.$order->get_billing_last_name(); ?></span></td>
                <td><span><?php echo get_post_meta($post->ID,'pickup_date',true); ?></span></td>
                <td><span class="label-Inprocess <?php echo  ($order->get_status()); ?>"><?php echo wc_get_order_status_name($order->get_status()); ?></span></td>
                <td><span><?php echo get_the_title(get_post_meta($post->ID,'location_id',true)); ?></span></td>
                <td><span><?php echo date('d/m/Y',strtotime($order->order_date)); ?></span></td>
                <td><span><?php echo wc_price($order_data['total']); ?></span></td>
                <td align="right">
                  <div class="Flex-col flex-end">
                    <a href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"><img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/edit-icon.svg" alt="" /></a>
                    <a class="product_delete" href="javascript:void(0)" onclick="delete_order(<?php  the_ID(); ?>)" data-id="<?php  the_ID(); ?>">
                        <img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/delete-icon.svg" alt="" />
                    </a>
                  </div>
                </td>
              </tr>
              
               <?php
            endwhile;
        } else {
            echo __( 'No orders found' );
        }
        wp_reset_postdata();
    ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="Load-more Flex-col">
        <a href="">Vedi tutti</a>
        <a href="" class="btn btn-primary">Invio Ordini (66)</a>
      </div>
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
 
 get_footer('dashboard');