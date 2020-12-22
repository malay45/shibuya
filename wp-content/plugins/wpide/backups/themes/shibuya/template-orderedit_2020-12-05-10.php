<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d78533996b8"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-orderedit.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-orderedit_2020-12-05-10.php") )  ) ){
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
?>
<div id="myModal" class="modal fade show" style="display: block;">
	<div class="modal-dialog modal-dialog-centered modal-confirm">
		<div class="modal-content">
			<div class="modal-header flex-column">
				<div class="icon-box">
					<img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/metro-cancel.svg" alt="" />
				</div>						
				<h4 class="modal-title w-100">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-danger">Delete</button>
			</div>
		</div>
	</div>
</div>     
<div class="Content-Wrapper">
      <div class="Heading">
        <h1>Ordine n. xxxxx</h1>
      </div>
      <div class="back-btn">
        <a href=""></a>
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
                  <img src="" alt="">
                  <span>Nome cliente</span>
                </div>
                <div class="C-Info">
                  <img src="" alt="">
                  <span>340 518 5678</span>
                </div>
                <div class="C-Info">
                  <img src="" alt="">
                  <span>nome.cliente@gmail.com</span>
                </div>
                <div class="C-Info">
                  <img src="" alt="">
                  <span>79.9.155.60 (Effettuato il 15 ott 2020 16:17)</span>
                </div>
                <div class="Status-Info">
                  <span>Stato: <b>In lavorazione</b></span>
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
                        <b>Conad Reggio Sud</b>
                        <span>Via Maiella 55 - 42123</span>
                        <span>Reggio Emilia RE</span>
                        </p>
                        <a href=""><img src="img/edit.svg" alt="" /></a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-12">
                  <div class="form-group">
                      <label for="Luogo di Ritiro">Data di Ritiro</label>
                      <span>04/12/2020</span>
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
          <div class="Item-total-detail">
            <div class="Pro-item-info">
              <div class="Pro-img"><img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/Filtro-Sashimi.png" alt=""></div>
              <span>Misto Sushi</span>
            </div>
            <div class="Pro-item-count">
              <span class="Item-price">12,50</span>
            </div>
          </div>
        </div>
        <div class="Flex-col">
          <div class="Order-total">
            <div class="small-txt">
              <span>Totale Ordine</span>
              <span>125,00 <span>€</span></span>
            </tr>
            <span class="small-txt">
                <span>IVA (10% incluso):</span>
                <span>12,50</span>
            </tr>
            <tr class="Total-txt">
                <span>Totale</span>
                <span>125,00 <span>€</span></span>
            </tr>
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