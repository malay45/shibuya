<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8dccfe2c8845"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/woocommerce/emails/reminder-email.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/woocommerce/emails/reminder-email_2020-12-09-07.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php  setlocale(LC_ALL, 'it_IT'); $metas = get_post_meta($order->get_id()); ?>
<div style="background: #242424;max-width:740px;margin:0 auto;@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');font-family: 'Roboto', sans-serif;">
<table style="width: 100%;border: 0;">
	<tr>
		<td style="text-align: center;padding:40px 20px 20px;border-bottom:1px #707070 solid;">
			<img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/Logo.svg" height="60px" width="auto" alt="" />
		</td>
	</tr>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
	<tr>
		<td style="text-align: center;">
			<h1 style="font-size: 35px;color: #fff;font-weight: 300;margin: 0;">Oggi puoi ritirare il tuo ordine!</h1>
		</td>
	<tr>
	<tr>
		<td style="text-align: center;">
			<h5 style="font-size:14px;color: #fff;font-weight: 300;margin: 0 0 15px;"><b>Numero ordine:</b><b><?php echo $order->get_id() ?></b> | <span>Data de Order <?php  echo strftime("%e %B %Y",strtotime($order->order_date)); ?></span></h5>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
			<div style="font-size:18px;color: #fff;font-weight:bold;">Name <?php echo $metas['_billing_first_name'][0] ?> <?php echo $metas['_billing_last_name'][0] ?></div>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
	        <div style="font-size:18px;color: #fff;font-weight:300;text-align: center;">
			grazie per aver ordinato il sushi di MyShibuya! <br>
                Potrai ritirare il tuo sushi presso
            </div>
		</td>
	</tr>
	<tr style="">
	    <td>
	        <div style="background:#ED1B24;padding:10px;text-align:center;border-radius:15px;margin:10px 0;">
	            <div style="font-size:20px;color: #fff;font-weight:bold;"><?php echo get_the_title($metas['location_id'][0]); ?></div>
	            <div style="font-size:20px;color: #fff;font-weight:300;"><?php echo get_post_meta($metas['location_id'][0],'address',true); ?></div>
	        </div>
	    </td>
	</tr>
	<tr style="">
	    <td style="text-align: center;">
	        <div style="font-size:20px;color: #fff;font-weight:300;">il</div>
	        <div style="font-size:25px;color: #fff;font-weight:bold;"><?php echo strftime("%e %B %Y",strtotime($metas['pickup_date'][0])); ?></div>
	    </td>
	</tr>
	<tr style="">
	    <td style="text-align: center;">
	        <div style="font-size:18px;color: #fff;font-weight:300;padding:5px 0;">
	        Ti ricordiamo che <?php echo get_the_title($metas['location_id'][0]); ?> effettua i seguenti orari di apertura e che il tuo ordine sarà ritirabile solo nel giorno che hai scelto.
	        </div>
	    </td>
	</tr>
	<tr>
        <td>&nbsp;</td>
    </tr>
	<tr style="">
	    <td style="text-align: left;">
	        <div style="display: flex;font-size:20px;color: #fff;font-weight:300;padding-bottom: 15px;border-bottom:1px #707070 solid;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/clock.svg" style="margin-right: 10px;" alt="" /> Orario di apertura</div>
	    </td>
	</tr>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
    <tr>
        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;">Text 1</td>
        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: right;padding:15px 0 10px;">Text 1</td>
    </tr>
    <tr>
        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0;">Text 1</td>
        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: right;padding:15px 0;>Text 1</td>
    </tr>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
    <tbody>        
        <tr>
            <td>&nbsp;</td>
        </tr>
    	<tr style="">
    	    <td style="text-align: left;">
    	        <div style="display: flex;font-size:20px;color: #fff;font-weight:300;padding-bottom: 15px;border-bottom:1px #707070 solid;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/clock.svg" style="margin-right: 10px;" /> Other Text</div>
    	    </td>
    	</tr>
	</tbody>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
    <tbody>   
        <tr>
            <td style="font-size:18px;color: #ED1B24;font-weight:bold;text-align: left;padding:15px 0 10px;">25 Dec </td>
            <td style="font-size:18px;color: #ED1B24;font-weight:bold;text-align: right;padding:15px 0 10px;">Closed</td>
        </tr>
        <tr>
            <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;">26 Dec</td>
            <td style="font-size:18px;color: #fff;font-weight:bold;text-align: right;padding:15px 0 10px;">Text 1</td>
        </tr>
    </tbody>   
</table>
<table style="width: 100%;color:#fff;border-bottom:1px #707070 solid;">
    <tbody> 
    <tr>
        <td style="text-align: center;">
            <div style="font-size:18px;color: #fff;font-weight:300;padding:30px 0 50px;">
                sdfds fgfdsgf dgdf  dg dsg dfg gs gdfgfd 
                <a href="<?php  echo site_url(); ?>" style="font-size:20px;color: #fff;font-weight:bold;"><?php echo get_bloginfo('name'); ?></a>
            </div>
        </td>
    </tr>
    </tbody> 
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;border-bottom:1px #707070 solid;">
    <tbody>
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
    </tbody> 
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
<?php exit; ?>