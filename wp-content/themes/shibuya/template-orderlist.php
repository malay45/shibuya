<?php
check_access_of_page();

/**
 * Template Name: Order List
 */

if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='delete'){
    wp_delete_post( $_GET['id'] );
    
}
 get_header('dashboard');
setlocale(LC_ALL, 'it_IT');

// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>

<div class="Content-Wrapper">
      <div class="Heading">
        <h1>Ordini Take Away</h1>
      </div>
      <div class="Filter-wrapper">
        <form id="order_list_filter" action="<?php the_permalink(); ?>" mehod="POST">
          <div class="row">
            <div class="col-3" style="display:none">
              <div class="form-group">
                <input type="text" value="Aggiungi ordine" placeholder="" class="form-control" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group ui input">
                <input name="daterange" type="text" class="form-control datepicker-real" style="position: absolute;    visibility: hidden;"/>
                <input  type="text" value="Seleziona intervallo di tempo" placeholder="Seleziona intervallo di tempo" class="form-control datepicker-dummy " />
                <input name="start_date" id="start_date" type="hidden" />
                <input name="end_date" id="end_date"  type="hidden"  />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group ">
                <select name="filter_location" id="filter_location" class="form-control page-reload ui dropdown">
                  <option value="">Seleziona punto vendita</option>
                  <?php 
                  $args = array(
                      'numberposts' => -1,
                      'post_type' => 'location'
                    );
                     
                    $location = get_posts( $args );
                    foreach($location as $location_data):
                        ?>
                        <option <?php if($location_data->ID==$_GET['filter_location']){ echo 'selected="selected"'; } ?> value="<?php echo $location_data->ID; ?>"><?php echo $location_data->post_title; ?></option>
                        <?php
                    endforeach;    
                  ?>
                </select>
              </div>
            </div>
            <div class="col-3"  style="display:none">
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Filtra per cliente</option>
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
          <table class="Table-sorting order-list-table">
            <thead>
              <tr>
                <th width="2%">
                  <div class="Custom-check">
                     <!--<input type="checkbox" id="todo" name="todo" value="todo">-->
                     <label for="todo" data-content=""></label>
                  </div>
                </th>
                <th width="23%"><span>Ordine</span></th>
                <th width="15%"><span>Data di ritiro</span></th>
                <th width="10%"><span>Stato</span></th>
                <th width="25%"><span>Punto Vendita</span></th>
                <th width="15%"><span>Data ordine</span></th>
                <th width="15%"><span>Totale</span></th>
                <th width="10%" align="right"><span>Azioni</span></th>
              </tr>
            </thead>
            <tbody>
             <?php
            $args = array(
                'post_type' => 'shop_order',
                'posts_per_page' => -1,
                'post_status' => array_keys( wc_get_order_statuses() )
            );
            if(isset($_GET['filter_location'])&&$_GET['filter_location']!=''):
             $args['meta_query'] = array(
                array(
                        'key'       => 'location_id',
                        'value'     => $_GET['filter_location'],
                        'compare'   => '=',
                    )
                );
            endif;
            if(isset($_GET['end_date'])&&$_GET['end_date']!=''):
             $args['date_query'] = array(
                array(
                    array(
                    'column' => 'post_date_gmt',
                    'after'     => date('Y-m-d 00:00:00',strtotime($_GET['start_date'])),
                    ),
                    array(
                    'column' => 'post_date_gmt',
                    'before'    => date('Y-m-d 23:59:59',strtotime($_GET['end_date'])),
                    )
                //    'inclusive' => true,
                ),
            );
            endif;
            
            
        $edit_link = get_field('edit_order_page','option');
        $view_link = get_field('view_order_page','option');
        $loop = new WP_Query( $args );
        
        if ( $loop->have_posts() ) {
              while ( $loop->have_posts() ) : $loop->the_post();
                global $post;    
                $order = new WC_Order( $post->ID );
                $order_data = $order->get_data(); 
            ?>
              <tr>
                <td>
                  <div class="Custom-check">
                     <input type="checkbox" id="todo1" name="todo1" value="todo1">
                     <label for="todo1" data-content="Get out of bed"></label>
                  </div>
                </td>
                <td><span><?php  echo $order->get_billing_first_name() .' '.$order->get_billing_last_name(); ?></span></td>
                <td><span><?php echo strftime('%d %B %Y',strtotime(get_post_meta($post->ID,'pickup_date',true))); ?></span></td>
                <td><span class="label-<?php echo  ($order->get_status()); ?>"><?php echo wc_get_order_status_name($order->get_status()); ?></span></td>
                <td><span><?php echo get_the_title(get_post_meta($post->ID,'location_id',true)); ?></span></td>
                <td><span><?php echo strftime('%d %B %Y',strtotime($order->order_date)); ?></span></td>
                <td><span><?php echo wc_price($order_data['total']); ?></span></td>
                <td align="right">
                  <div class="Flex-col flex-end">
                    <a href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/md-open.svg" alt="" /></a>
                    <a class="product_delete" href="javascript:void(0)" onclick="delete_order(<?php  the_ID(); ?>)" data-id="<?php  the_ID(); ?>">
                        <img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/trash-alt.svg" alt="" />
                    </a>
                  </div>
                </td>
              </tr>
              
          <?php
            endwhile;
        } else {
            echo __( '<tr><td colspan="8">No orders found</td></tr>' );
        }
        wp_reset_postdata();
        ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="Load-more" style="display: none">
        <a href="">Vedi tutti</a>
      </div>
    </div>

<div id="delete_order" class="modal fade show">
      <div class="modal-dialog modal-dialog-centered modal-confirm">
        <div class="modal-content">
          <div class="modal-header flex-column">
            <h4 class="modal-title w-100">Are you sure?</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/metro-cancel.svg" alt="" /></button>
          </div>
          <div class="modal-body">
            <p>Do you really want to delete these records? This process cannot be undone.</p>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" data-url="<?php echo the_permalink() ?>?action=delete&id=" data-id="" >Delete</button>
          </div>
        </div>
      </div>
    </div> 

<?php 
 
 get_footer('dashboard');