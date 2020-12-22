<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d4981022977"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-orderview.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-orderview_2020-11-24-11.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
check_access_of_page();

/**
 * Template Name: Order View
 */

 get_header();


// admin sidebar 
get_template_part('template-parts/admin-sidebar');
?>
    
<h1>Order Data</h1>
<div style="margin : 50px auto;max-width : 500px">
    <?php
        $order = new WC_Order( $_GET['id'] );
        $edit_link = get_field('edit_order_page','option');
        $order_data = $order->get_data(); // The Order data
    ?>
      <div style="display:flex;">      
            <div  style="padding : 20px;">
                <a class="product_delete" href="<?php echo $edit_link; ?>?id=<?php  the_ID(); ?>"  >Edit</a>
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
                
                <div ><?php echo wc_get_order_statuses()['wc-'.$order_data['status']]; ?></div>
            </div>
      </div>
</div>
<?php 
 
 get_footer();