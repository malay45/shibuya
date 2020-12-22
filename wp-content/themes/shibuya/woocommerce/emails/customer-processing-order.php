<?php  setlocale(LC_ALL, 'it_IT'); $metas = get_post_meta($order->get_id()); ?>
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
			<h1 style="text-align: center;font-size: 35px;color: #fff;font-weight: 300;margin: 0;">Ordine confermato</h1>
		</td>
	</tr>
	<tr>
		<td style="text-align: center;">
			<h5 style="font-size:14px;color: #fff;font-weight: 300;margin: 0 0 15px;"><b>Numero ordine:</b><b><?php echo $order->get_id() ?></b> | <span>Data ordine:<?php  echo strftime("%e %B %Y",strtotime($order->order_date)); ?></span></h5>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
			<div style="font-size:18px;color: #fff;font-weight:bold;"><span style="font-weight:400">Ciao </span><?php echo $metas['_billing_first_name'][0] ?> <?php echo $metas['_billing_last_name'][0] ?></div>
		</td>
	</tr>
	<tr>
	    <td style="text-align: center;">
	        <div style="font-size:18px;color: #fff;font-weight:300;text-align: center;">
			Grazie per aver ordinato il sushi di MyShibuya!<br>
                Potrai ritirare il tuo sushi presso:
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
	        Ti ricordiamo che <strong><?php echo get_the_title($metas['location_id'][0]); ?></strong> effettua i seguenti orari di apertura e che il tuo ordine sarà ritirabile solo nel giorno che hai scelto.
	        </div>
	    </td>
	</tr>
	<tr>
        <td>&nbsp;</td>
    </tr>
	<tr style="">
	    <td style="text-align: left;">
	        <div style="display: flex;font-size:20px;color: #fff;font-weight:300;padding-bottom: 15px;border-bottom:1px #707070 solid;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/schedule.png" style="margin-right: 10px;" alt="" /> Orario di apertura</div>
	    </td>
	</tr>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
     <?php 
                $opendata = get_field('opening_hours',$metas['location_id'][0]);
                
            ?>
            <?php 
                    foreach($opendata as $key=>$value){
                       
                    ?>
                    <tr>
                        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;"><?php echo ucwords(italy_days_name($key)); ?></td>
                        <?php  if($value['off_day']){
                        ?>
                        <td  style="font-size:18px;color: #ED1B24;font-weight:bold;text-align: right;padding:15px 0 10px;">Chiuso</td>
                        <?php
                        }  else{
                        ?>
                        <td  style="font-size:18px;color: #fff;font-weight:bold;text-align: right;padding:15px 0 10px;"><?php echo $value['opening_time'] ?> - <?php echo $value['closing_time']; ?></td>
                        <?php
                        
                        } ?>
                        
                    </tr>  
                   
                    <?php    
                    }
                ?>
</table>

      
    

<?php 
                if( have_rows('upcoming_holidays',$metas['location_id'][0]) ):
                ?>
                <table style="width: 100%;color:#fff;padding:0 30px;">
    <tbody>        
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr style="">
            <td style="text-align: left;">
                <div style="display: flex;font-size:20px;color: #fff;font-weight:300;padding-bottom: 15px;border-bottom:1px #707070 solid;"><img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/schedule.png" style="margin-right: 10px;" /> Giorni festivi e chiusure</div>
            </td>
        </tr>
    </tbody>
</table>
<table style="width: 100%;color:#fff;padding:0 30px;">
    <tbody>   
                <?php
                    while( have_rows('upcoming_holidays',$metas['location_id'][0]) ) : the_row();
                        
                            if(get_sub_field('holiday')){
                                
                            }
                            
                            ?>

                                     <tr>
            <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;"><?php echo strftime('%d %B %Y',strtotime(get_sub_field('date'))); ?></td>
            <?php  if(get_sub_field('holiday')){
                                        ?>
            <td style="font-size:18px;color: #ED1B24;font-weight:bold;text-align: right;padding:15px 0 10px;">Chiuso</td>
                                        <?php
                                        }  else{
                                        ?>
                                        <td style="font-size:18px;color: #fff;font-weight:bold;text-align: left;padding:15px 0 10px;"><?php echo get_sub_field('opening_time') ?> - <?php echo get_sub_field('closing_time'); ?></td>
                                        <?php
                                        
                                        } ?>
                                </tr>
                            <?php
                            
                    endwhile;
                    ?>
                   
</tbody>   
</table>
                    <?php
                endif;
                
            ?>
<table style="width: 100%;color:#fff;border-bottom:1px #707070 solid;">
    <tbody> 
    <tr>
        <td style="text-align: center;">
            <div style="font-size:18px;color: #fff;font-weight:300;padding:30px 0 50px;">
                <div style="font-size:18px;color: #fff;font-weight:300;text-align: center;font-style:italic;">
        			Continua a scegliere la freschezza e la qualità di MyShibuya <br>
                        e non esitare a contattarci per qualsiasi necessità.
                </div>
            </div>
        </td>
    </tr>
    </tbody> 
</table>
<table style="width: 100%;color:#fff;padding:15px 30px 25px;border-bottom:1px #707070 solid;">
    <tbody>
        <tr>
            <td colspan="2">
                <h2 style="font-size:20px;color: #fff;font-weight:bold;padding-bottom: 15px;border-bottom:1px #707070 solid;">Riepilogo Ordine:</h2>
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
<table style="width: 100%;color:#fff;text-align:center;background:#414141;margin-top:40px;padding:30px;">
    <tbody>
        <tr>
            <td style="font-size:18px;color: #fff;font-weight:bold;padding-bottom: 10px;">Per assistenza puoi contattarci qui:</td>
        </tr>
        <tr>
            <td>
                <a style="display: block;background: #707070;width: 400px;height: 38px;line-height:38px;padding:3px 15px;font-size:20px;color: #fff;font-weight:300;margin:0 auto 5px;text-align: center;text-decoration: none;" href="tel:+39 0522 709830">+39 0522 709830</a>
            </td>
        </tr>
        <tr>
            <td>
                <a style="display: block;background: #707070;width: 400px;height: 38px;line-height:38px;padding:5px 15px;font-size:20px;color: #fff;font-weight:bold;text-decoration: none;margin:0 auto;text-align: center;" href="mailto:ordini@myshibuya.it">ordini@myshibuya.it</a>
            </td>
        </tr>
    </tbody>
</table>
<table style="width: 100%;color:#707070;text-align:center;background:#fff;padding:50px 30px;">
        <tbody>
            <tr>
                <td style="text-align: right;width: 50%;">
                    <a href="https://www.facebook.com/myshibuya/">
                        <img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/facebook.png" style="margin-right: 10px;" alt="" />
                    </a>
                </td>
                <td style="text-align: left;width: 50%;">
                    <a href="https://instagram.com/my_shibuya?igshid=xehpn058m8s0">
                        <img src="<?php echo site_url(); ?>/wp-content/themes/shibuya/img/instagram.png" style="margin-left: 10px;" alt="" />
                    </a>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding:20px 0 25px;">
                    <a href="http://www.myshibuya.it/" style="font-size: 18px;font-weight:400;color:#707070; text-decoration: none;">myshibuya.it</a>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-size:14px; font-weight: 300;color: #707070;line-height:20px;">
                        <b>OKU NO KI S.R.L. </b><br>
                        P.IVA: 02695960357
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-size:10px; font-weight: 300;color: #707070;line-height:20px; padding-top: 20px; display: block;">
                        <a style="color: #707070" href="https://ordina.myshibuya.it/termini-utilizzo">Regolamento</a> - <a style="color: #707070" href="https://www.iubenda.com/privacy-policy/71785263">Privacy Policy</a> - <a style="color: #707070" href="https://www.iubenda.com/privacy-policy/71785263/cookie-policy">Cookie Policy</a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php // exit; ?>