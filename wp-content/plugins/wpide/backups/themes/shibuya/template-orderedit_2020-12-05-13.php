<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d755764fd2d"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-orderedit.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-orderedit_2020-12-05-13.php") )  ) ){
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
        //print_rr($order);
        // print_rr(get_post_meta($_GET['id']));
?>
   <form name="update_order_status" method="POST">
<div class="Content-Wrapper">
      <div class="Heading">
        <h1>Ordine n. <?php echo $_GET['id']; ?></h1>
      </div>
      <div class="back-btn">
        <div class="Flex-col space-between">
            <a href="<?php echo get_permalink(get_field('order_list_page','option')); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/arrow-back.svg" alt="" /></a>
            <button type="submit" value="udpate_status" name="udpate_status" class="btn btn-primary">Save</button>
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
                  <span>Stato: <span class="label-Inprocess <?php echo  ($order->get_status()); ?>"><?php echo wc_get_order_status_name($order->get_status()); ?></span></span>
                   
                </div>
                <div class="Status-Info">
                  <span>Change Stato:</span>
                    <select name="order_status" class="ui dropdown">
                    <?php foreach(wc_get_order_statuses() as $status_key => $status_title): ?>
                        <option <?php if('wc-'.$order_data['status']==$status_key){ echo 'selected="selected"'; } ?> value="<?php echo $status_key; ?>"><?php echo $status_title; ?></option>
                    <?php endforeach; ?>
                    </select>
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
              <span class="Item-price"><?php echo wc_price($item->get_data()['total']); ?></span>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        
        <div class="Flex-col flex-end">
          <div class="Order-total text-right">
            <div class="small-txt">
              <span>Subtotale :</span>
              <span><?php echo wc_price($order->get_data()['total'] - $order->get_data()['cart_tax']); ?></span>
            </div>
            <div class="small-txt">
                <span>IVA (10% incluso) :</span>
                <span><?php echo wc_price($order->get_data()['cart_tax']); ?></span>
            </div>
            <div class="Total-txt">
                <span>Totale</span>
                <span><?php echo wc_price($order->get_data()['total']); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form> 

<?php 
 
 get_footer('dashboard');