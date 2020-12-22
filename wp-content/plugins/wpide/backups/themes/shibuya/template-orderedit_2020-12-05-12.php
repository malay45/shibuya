<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d78533996b8"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-orderedit.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-orderedit_2020-12-05-12.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
check_access_of_page();
/**
* Template Name: Order Edit
*/


if(isset($_POST['order_status'])&& $_POST['udpate_status']){
    wp_update_post(array(
        'ID' => $_GET['id'],
        'post_status' => $_POST['order_status']
    ));
}
  get_header('dashboard');


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
        $order = new WC_Order( $_GET['id'] );
        $view_link = get_field('view_order_page','option');
        $order_data = $order->get_data(); // The Order data
        $location_data = get_post(get_post_meta($_GET['id'],'location_id',true));
        $location_global['title'] = $location_data->post_title;
        $location_global['address'] = get_post_meta($location_data->ID,'address',true);
        print_rr($order->get_items());
        // print_rr(get_post_meta($_GET['id']));
?>

<div class="Content-Wrapper">
      <div class="Heading">
        <h1>Ordine n. <?php echo $_GET['id']; ?></h1>
      </div>
      <div class="back-btn">
        <div class="Flex-col space-between">
            <a href=""><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/arrow-back.svg" alt="" /></a>
            <button class="btn btn-primary">Save</button>
        </div>
      </div>
      <div class="Content-panel">
        <div class="row">
          <div class="col-sm-6 col-12">
            <div class="Col-row">
              <div class="Col-title">
                <h2>Dati del cliente</h2>
              </div>
              <div class="Col-cnt Contact-info">
                <div class="C-Info">
                  <span><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/user-alt.svg" alt="" /></span>
                  <span><?php echo $order_data['billing']['first_name']; ?>  <?php echo $order_data['billing']['last_name']; ?></span>
                </div>
                <div class="C-Info">
                  <span><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/material-local-phone.svg" alt="" /></span>
                  <span><?php echo $order_data['billing']['phone']; ?></span>
                </div>
                <div class="C-Info">
                  <span><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/zocial-email.svg" alt="" /></span>
                  <span><a href="mailto:<?php echo $order_data['billing']['email']; ?>"><?php echo $order_data['billing']['email']; ?></a></span>
                </div>
                <div class="C-Info">
                  <span><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/material-date.svg" alt="" /></span>
                  <span><?php echo get_post_meta($_GET['id'],'_customer_ip_address',true) ?> (Effettuato il 15 ott 2020 16:17)</span>
                </div>
                <div class="Status-Info">
                  <span>Stato: <span>In lavorazione</span></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-12">
            <div class="Col-row">
              <div class="Col-title">
                <h2>Dati ritiro</h2>
              </div>
              <div class="row">
                <div class="col-sm-6 col-12">
                  <div class="form-group">
                    <label for="Luogo di Ritiro">Luogo di Ritiro</label>
                    <div class="Place-detail">
                        <p>
                        <b><?php echo $location_global['title']; ?></b>
                        <span><?php echo $location_global['address']; ?></span>
                        </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-12">
                  <div class="form-group">
                      <label for="Luogo di Ritiro">Data di Ritiro</label>
                      <div class="date-info"><?php echo date('d/m/Y',strtotime(get_post_meta($_GET['id'],'pickup_date',true))); ?></div>
                  </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="Col-row margin-top-50">
          <div class="Col-title">
            <h2>Dati del cliente</h2>
          </div>
          <?php foreach($order->get_items() as $item): ?>
          <div class="Item-total-detail">
            <div class="Pro-item-info">
              <div class="Pro-img"><img src="<?php echo get_the_post_thumbnail_url($item->get_data()['product_id']); ?>" alt=""></div>
              <span><b><?php echo $item->get_data()['quantity'] ?> x</b> <?php  echo $item->get_data()['name']; ?></span>
            </div>
            <div class="Pro-item-count">
              <span class="Item-price">12,50</span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        
        <div class="Flex-col flex-end">
          <div class="Order-total text-right">
            <div class="small-txt">
              <span>Subtotale :</span>
              <span>12,50 <span>€</span></span>
            </div>
            <div class="small-txt">
                <span>IVA (10% incluso) :</span>
                <span>2,50 <span>€</span></span>
            </div>
            <div class="Total-txt">
                <span>Totale</span>
                <span>12,50 <span>€</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>

   
<h1 style="display:none;">Order Data</h1>
<div style="display:none;margin : 50px auto;max-width : 500px">
    <?php
        $order = new WC_Order( $_GET['id'] );
        $view_link = get_field('view_order_page','option');
        $order_data = $order->get_data(); // The Order data
    ?>
      <div style="display:flex;">      
            <div  style="padding : 20px;">
                <a class="product_delete" href="<?php echo $view_link; ?>?id=<?php echo $_GET['id'] ; ?>">View</a>
            </div>
            <div  style="padding : 20px;">
                <h3>Billing</h3>
                <div><?php echo $order_data['billing']['first_name']; ?></div>    
                <div><?php echo $order_data['billing']['last_name']; ?></div>    
                <div><?php echo $order_data['billing']['company']; ?></div>    
                <div><?php echo $order_data['billing']['address_1']; ?></div>    
                <div><?php echo $order_data['billing']['address_2']; ?></div>    
                <div><?php echo $order_data['billing']['city']; ?></div>    
                <div><?php echo $order_data['billing']['state']; ?></div>    
                <div><?php echo $order_data['billing']['postcode']; ?></div>    
                <div><?php echo $order_data['billing']['country']; ?></div>    
                <div><?php echo $order_data['billing']['email']; ?></div>    
                <div><?php echo $order_data['billing']['phone']; ?></div>    
            </div>
            
            <div  style="padding : 20px;">
                <h3>Order Items Data</h3>
                <?php
                    foreach($order_data['line_items'] as $items):
                        $product_data = ($items->get_data()) ;
                        ?>
                    <div style="display:flex;">
                        <div  style="padding : 20px;">
                            <?php echo $product_data['name'] ?>
                        </div>
                        <div  style="padding : 20px;">
                            <?php echo $product_data['quantity'] ?>
                        </div>
                        <div  style="padding : 20px;">
                            <?php echo $product_data['total'] ?>
                        </div>
                    </div>                
                        <?php
                    endforeach;
                ?>
            </div>
            <div  style="padding : 20px;">
                <h3>Totals</h3>    
                <div ><?php echo wc_price($order_data['total']); ?></div>
            </div>
            <div  style="padding : 20px;">
                <h3>Payment Method</h3>    
                <div ><?php echo $order_data['payment_method_title']; ?></div>
            </div>
            
            <div  style="padding : 20px;">
                <h3>Order Status</h3>    
                <form name="update_order_status" method="POST">
                <div >
                    <select name="order_status">
                    <?php foreach(wc_get_order_statuses() as $status_key => $status_title): ?>
                        <option <?php if('wc-'.$order_data['status']==$status_key){ echo 'selected="selected"'; } ?> value="<?php echo $status_key; ?>"><?php echo $status_title; ?></option>
                    <?php endforeach; ?>
                    </select>
                    <input type="submit" name="udpate_status" value="Update Status" />
                </div>
                </form>
            </div>
      </div>
</div>
<?php 
 
 get_footer('dashboard');