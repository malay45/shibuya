<?php 
/*-------------------------------------------------------------------------------
    MAIL CHIMP API
-------------------------------------------------------------------------------*/

function rudr_mch_subscribe() {
    $list_id = '365831';
    $api_key = 'XXXXXXXX-us15';
    $ip = $_SERVER['REMOTE_ADDR'];
   $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $cnt=$details->country; 
    $result = json_decode(rudr_mailchimp_subscriber_status($_POST['email'], 'subscribed', $list_id, $api_key, array('FNAME' => $firstname, 'LNAME' => $lastname),array('country_code'=>'".$cnt."')));
    // print_r($result);
            if ($resul->status == 400) {
                foreach ($result->errors as $error) {
                    echo '<p>Error: ' . $error->message . '</p>';
                }
            } elseif ($result->status == 'subscribed') {
                echo 'Thanks for Subscribing!';
            }
            die;
        }
add_action('wp_ajax_mailchimpsubscribe', 'rudr_mch_subscribe');
add_action('wp_ajax_nopriv_mailchimpsubscribe', 'rudr_mch_subscribe');
function rudr_mailchimp_subscriber_status( $email, $status, $list_id, $api_key, $merge_fields = array('FNAME' => '','LNAME' => ''),$location=array('country_code'=>'') ){
       function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    } 
    $ipAddr = getUserIP();
    $geoIP  = json_decode(file_get_contents("http://freegeoip.net/json/$ipAddr"), true);
    $lati=$geoIP['latitude'];
    $long=$geoIP['longitude'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $cnt=$details->country;
    $data = array(
        'apikey'        => $api_key,
        'email_address' => $email,
        'status'        => $status,
        'merge_fields' =>$merge_fields,
        'location' =>array(
               'latitude' =>$lati,
                'longitude' => $long,
                'country_code'=>$cnt
          ) 
    );
    $mch_api = curl_init(); // initialize cURL connection

    curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
    curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
    curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
    curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
    curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch_api, CURLOPT_POST, true);
    curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json

    $result = curl_exec($mch_api);
    return $result;
}
function mail_chimp_code(){
 $current_user = wp_get_current_user();

?>
 <div class="chimpform">
   <div class="chimpform_inenr">
<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" id="mailchimp">
    <!-- for my website the site_url() function returns https://rudrastyh.com -->
    <input type="text" name="fname" placeholder="First name" style="display:none;" />
    <input type="text" name="lname" placeholder="Last name" style="display:none;" />
    <input type="email" name="email" id="mce-EMAIL" value="<?php echo $current_user->user_email ?>" placeholder="Your email address" required/>

    <input type="hidden" name="action" value="mailchimpsubscribe" />
    <!-- we need action parameter to receive ajax request in WordPress -->

    <div class="mail_left"><button>YES! I WANT TO IMPROVE MY CAREER</button></div>
    <div class="mail_right"><button class="pum-close popmake-close" type="button"/>NO THANKS, I DON'T WANT ANY HELP</button></div>
  </form>
   <p class="status"></p>
  </div>
</div>
<script>
jQuery(function($){
    $('#mailchimp').submit(function(){
        var mailchimpform = $(this);
        $.ajax({ 
            url:mailchimpform.attr('action'),
            type:'POST',
            data:mailchimpform.serialize(), 
            success:function(data){
                  $('#mailchimp').hide();
                 $('p.status').text(data);
                document.getElementById("mailchimp").reset();
            }
        });
        return false;
    });
});
</script>

<?php
}// End some_random_code()
add_shortcode( 'mail_chimp_form', 'mail_chimp_code' );