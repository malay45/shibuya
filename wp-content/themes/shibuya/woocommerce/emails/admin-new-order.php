<?php  setlocale(LC_ALL, 'it_IT'); $metas = get_post_meta($order->get_id());  
?>
<div style="background: #242424;max-width:740px;margin:0 auto;@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap');font-family: 'Roboto', sans-serif;">
<table style="width: 100%;border: 0;">
	<tr>
		<td style="text-align: center;padding:40px 20px 20px;border-bottom:1px #707070 solid;">
			<img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/Logo-MyShibuya.png" height="60px" width="auto" alt="" />
		</td>
	</tr>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
	<tr>
		<td style="text-align: center;">
			<h1 style="text-align: center;font-size: 35px;color: #fff;font-weight: 300;margin: 0;">Numero ordine: <span><?php echo $order->get_id() ?></span></h1>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<h5 style="font-size:14px;color: #fff;font-weight: 300;margin: 0 0 15px;"><span>Data ordine:<?php  echo strftime("%e %B %Y",strtotime($order->order_date)); ?></span></h5>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
            <div style="font-size:18px;color: #fff;">Hai ricevuto il seguente ordine da:</div>
			<div style="font-size:18px;color: #fff;font-weight:bold;"><?php echo $metas['_billing_first_name'][0] ?> <?php echo $metas['_billing_last_name'][0] ?></div>
		</td>
	</tr>
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;border-bottom:1px #707070 solid;">
    <tbody>
        <tr>
            <td colspan="2">
                <h2 style="font-size:20px;color: #fff;font-weight:bold;padding-bottom: 15px;border-bottom:1px #707070 solid;">Riepilogo ordine</h2>
            </td>
        </tr>
        <?php foreach( $order->get_items() as $item): 
            $data = $item->get_data();
        ?>
        <tr>
            <td style="font-size:16px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;"><?php echo $data['quantity'].'x '.$data['name']; ?></td>
            <td style="font-size:16px;color: #fff;font-weight:bold;text-align: right;padding:15px 0 10px;"><?php echo wc_price($data['subtotal']+$data['subtotal_tax']); ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td style="font-size:14px;color: #fff;font-weight:400;text-align: left;padding:15px 0 0;border-top:1px #707070 solid;">Totale Ordine</td>
            <td style="font-size:14px;color: #fff;font-weight:400;text-align: right;padding:15px 0 0;border-top:1px #707070 solid;"><?php echo wc_price($order->get_total()); ?></td>
        </tr>
        <tr>
            <td style="font-size:14px;color: #fff;font-weight:400;text-align: left;">IVA (10% incluso)</td>
            <td style="font-size:14px;color: #fff;font-weight:400;text-align: right;"><?php echo wc_price($order->get_total_tax()); ?></td>
        </tr>
        <tr>
            <td style="font-size:16px;color: #fff;font-weight:bold;text-align: left;padding:20px 0 10px;">Totale</td>
            <td style="font-size:16px;color: #fff;font-weight:bold;text-align: right;padding:20px 0 10px;"><?php echo wc_price($order->get_total()); ?></td>
        </tr>
    </tbody> 
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;border-bottom:1px #707070 solid;">
    <tbody>
        <tr>
            <td colspan="3">
                <h2 style="font-size:20px;color: #fff;font-weight:bold;padding-bottom: 15px;border-bottom:1px #707070 solid;">Dati ritiro</h2>
            </td>
        </tr>
        <tr style="vertical-align: baseline;">
            <td width="49%">
                <span style="color: #fff;font-size: 16px;font-weight: bold;">Luogo di Ritiro</span>
                <div style="font-size:20px;color: #fff;font-weight:bold;"><?php echo get_the_title($metas['location_id'][0]); ?></div>
	            <div style="font-size:20px;color: #fff;font-weight:300;"><?php echo get_post_meta($metas['location_id'][0],'address',true); ?></div>
            </td>
            <td width="2%"></td>
            <td width="49%">
                <span style="color: #fff;font-size: 14px;font-weight: bold;">Data di Ritiro</span>
                <div style="min-height:60px;display: flex; border-radius: 15px;background: none; border: 2px #ED1B24 solid;padding:10px 15px; align-items: center; color: #fff;margin-top: 10px;"><?php echo strftime("%e %B %Y",strtotime($metas['pickup_date'][0])); ?></div>
            </td>
        </tr>
    </tbody> 
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;border-bottom:1px #707070 solid;">
    <tbody>
        <tr>
            <td colspan="2">
                <h2 style="font-size:20px;color: #fff;font-weight:bold;padding-bottom: 15px;border-bottom:1px #707070 solid;">Dati del cliente</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span style="font-size:16px;color: #fff;font-weight:300;padding-bottom:10px;display: flex;justify-content: flex-start;align-items: center;"><span style="width:30px;display: inline-block;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/user-alt.png" height="auto" width="auto" alt="" /></span><?php echo $metas['_billing_first_name'][0] ?> <?php echo $metas['_billing_last_name'][0] ?></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span style="font-size:16px;color: #fff;font-weight:300;padding-bottom:10px;display: flex;justify-content: flex-start;align-items: center;"><span style="width:30px;display: inline-block;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/local-phone.png" height="auto" width="auto" alt="" /></span><a style="font-size:16px;color: #fff;font-weight:300;text-decoration: none;" href="tel:<?php echo $metas['_billing_phone'][0] ?>"> <?php echo $metas['_billing_phone'][0] ?></a></span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span style="font-size:16px;color: #fff;font-weight:300;display: flex;justify-content: flex-start;align-items: center;"><span style="width:30px;display: inline-block;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/social-email.png" height="auto" width="auto" alt="" /></span><a  style="font-size:16px;color: #fff;font-weight:300;text-decoration: none;" href="mailto:<?php echo $metas['_billing_email'][0] ?>"><?php echo $metas['_billing_email'][0] ?></a></span>
            </td>
        </tr>
        <tr>
            <td style="font-size:14px;color: #fff;font-weight:400;padding-top:15px;"><span>Desidera ricevere novità e promozioni e accetta la vostra privacy policy</span></td>
            <td style="font-size:14px;color: #fff;font-weight:bold;padding-top:15px;"><?php echo $metas['news_letter'][0] ?></td>
        </tr>
        <tr>
            <td style="font-size:14px;color: #fff;font-weight:400;padding-top:15px;"><span>Accetta la politica sulla privacy e i termini di utilizzo di My Shibuya</span></td>
            <td style="font-size:14px;color: #fff;font-weight:bold;padding-top:15px;">SI</td>
        </tr>
        <tr>
            <td colspan="2" height="40px">&nbsp;</td>
        </tr>
    </tbody> 
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;background:#fff;">
    <tbody>
        <tr>
            <td><span style="display: block;font-size:18px;color:#707070;font-weight:400;padding:30px 15px;text-align:center;">Effettua la <a href="/mio-account" style="color:#ED1B24;">login</a> per gestire l’ordine.</span></td>
        </tr>
    </tbody> 
</table>
</div>