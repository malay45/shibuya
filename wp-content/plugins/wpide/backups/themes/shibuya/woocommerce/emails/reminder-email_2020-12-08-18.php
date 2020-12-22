<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d2813c5158e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/emails/reminder-email.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/emails/reminder-email_2020-12-08-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php  setlocale(LC_ALL, 'it_IT'); $metas = get_post_meta($order->get_id()); ?>
<div style="background: #000;">
<table style="width: 100%;">
	<tr>
		<td style="text-align: center;padding: 20px;">
			<img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/Logo.svg" />
		</td>
	</tr>
</table>
<table style="width: 100%;color:#fff;">
	<tr>
		<td style="text-align: center;">
			<h1>Order Title Goes here</h1>
		</td>
	<tr>
	<tr>
		<td style="text-align: center;">
			<h5><span>Order Number</span><span><?php echo $order->get_id() ?></span> | <span>Data de Order <?php  echo strftime("%e %B %Y",strtotime($order->order_date)); ?></span></h5>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
			<div>Name <?php echo $metas['_billing_first_name'][0] ?> <?php echo $metas['_billing_last_name'][0] ?></div>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
			Random text Random text Random text Random text Random text Random text Random text Random text Random text 
		</td>
	</tr>
	<tr style="">
	    <td style="background:red;padding : 10px;text-align: center;">
	        <div><?php echo get_the_title($metas['location_id'][0]); ?></div>
	        <div><?php echo get_post_meta($metas['location_id'][0],'address',true); ?></div>
	    </td>
	</tr>
	<tr style="">
	    <td style="text-align: center;">
	        <div>il</div>
	        <div><?php echo strftime("%e %B %Y",strtotime($metas['pickup_date'][0])); ?></div>
	    </td>
	</tr>
	<tr style="">
	    <td style="text-align: center;">
	        <div>sddfd <?php echo get_the_title($metas['location_id'][0]); ?> sdfsdf sdfsdf asdfsdf </div>
	    </td>
	</tr>
	<tr style="">
	    <td style="text-align: left;">
	        <div><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/clock.svg" /> Other Text</div>
	    </td>
	</tr>
</table>
<table style="width: 100%;color:#fff;">
    <tr>
        <td style="text-align: left;">Text 1</td>
        <td style="text-align: right;">Text 1</td>
    </tr>
    <tr>
        <td style="text-align: left;">Text 1</td>
        <td style="text-align: right;">Text 1</td>
    </tr>
</table>
<table style="width: 100%;color:#fff;">
	<tr style="">
	    <td style="text-align: left;">
	        <div><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/clock.svg" /> Other Text</div>
	    </td>
	</tr>
</table>
<table style="width: 100%;color:#fff;">
    <tr>
        <td style="text-align: left;">25 Dec </td>
        <td style="text-align: right;">Closed</td>
    </tr>
    <tr>
        <td style="text-align: left;">26 Dec</td>
        <td style="text-align: right;">Text 1</td>
    </tr>
</table>
<table style="width: 100%;color:#fff;">
    <tr>
        <td style="text-align: center;">
            sdfds fgfdsgf dgdf  dg dsg dfg gs gdfgfd <a href="<?php  echo site_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
        </td>
        
    </tr>
</table>
<table style="width: 100%;color:#fff;">
    <tr>
        <td colspan="2">Order Details</td>
    </tr>
    <?php foreach( $order->get_items() as $item): 
        $data = $item->get_data();
    ?>
    <tr>
        <td><?php echo $data['quantity'].'x '.$data['name']; ?></td>
        <td><?php echo wc_price($data['subtotal']+$data['subtotal_tax']); ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td>Total</td>
        <td><?php echo wc_price($order->get_total()); ?></td>
    </tr>
    <tr>
        <td>Text</td>
        <td><?php echo wc_price($order->get_total_tax()); ?></td>
    </tr>
    <tr>
        <td>Total</td>
        <td><?php echo wc_price($order->get_total()); ?></td>
    </tr>
</tabel>
<table style="width: 100%;color:#fff;text-align:center;">
    <tr>
        <td style="padding:5px">   </td>
    </tr>
    <tr>
        <td style="padding:5px">Contact Details</td>
    </tr>
    <tr>
        <td style="padding:5px">Phone</td>
    </tr>
    <tr>
        <td style="padding:5px">Call</td>
    </tr>
</table>
</div>
<?php 
exit;
?>
<?php print_rr(get_post_meta($order->get_id())); print_rr($order); ?>
<?php echo 'edsdfsdfsdf'; exit; ?>