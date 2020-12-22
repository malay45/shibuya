<?php 
/**
 * Mailchimp iscrizione alla newsletter 
 */

// Shortcode
add_shortcode('mailchimp', 'mailchimp_form');
function mailchimp_form() {
    ob_start();
    ?>
    <form class="form-newsletter">
        <input type="email" class="input-newsletter" placeholder="email" id="email">
        <button id="submit-newsletter" disabled type="button" class="send-newsletter subscribe"><?php _e('Invia'); ?></button>
        <?php /*
        <div class="checkbox-privacy">
            <label class="container-checkbox">
                <input id="checkbox-privacy-newsletter" type="checkbox">
                <span class="checkmark"></span>
                <span class="text-checkbox">Ho letto le informazioni sulla <a href="<?php echo get_site_url();?>/privacy-policy">privacy</a> e acconsento al trattamento dei miei dati per l’iscrizione alla newsletter</span>
            </label>
        </div> */ ?>
    </form>
    <?php
    return ob_get_clean();
}

// Ajax request
add_action( 'wp_enqueue_scripts', 'mailchimp_scripts' );
function mailchimp_scripts() {

    wp_register_script( 'mailchimp', get_stylesheet_directory_uri() . '/js/mailchimp.js', array('jquery') );
 
    $script_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce("subscribe_user"),
    );
    wp_localize_script( 'mailchimp', 'aw', $script_array );
    wp_enqueue_script( 'mailchimp' );
}

add_action('wp_ajax_subscribe_user', 'subscribe_user_to_mailchimp');
add_action('wp_ajax_nopriv_subscribe_user', 'subscribe_user_to_mailchimp');
 
function subscribe_user_to_mailchimp() {
    check_ajax_referer('subscribe_user', 'security');
    $email = $_POST['email'];
    $audience_id = '1120f15b04';
    $api_key = '8f9411750495e0d504e306701c2f8b95-us18';
    $data_center = substr($api_key,strpos($api_key,'-')+1);
    $url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $audience_id .'/members';
    $auth = base64_encode( 'user:' . $api_key );
    $arr_data = json_encode(array( 
        'email_address' => $email, 
        'status' => 'pending' //pass 'subscribed' oppure 'pending'
    ));
 
    $response = wp_remote_post( $url, array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json',
                'Authorization' => "Basic $auth"
            ),
            'body' => $arr_data,
        )
    );
 
    if ( is_wp_error( $response ) ) {
       $error_message = $response->get_error_message();
       echo "Something went wrong: $error_message";
    } else {
        $status_code = wp_remote_retrieve_response_code( $response );
        switch ($status_code) {
            case '200':
                echo $status_code;
                break;
            case '400':
                $api_response = json_decode( wp_remote_retrieve_body( $response ), true );
                echo $api_response['title'];
                break;
            default:
                echo 'Something went wrong. Please try again.';
                break;
        }
    }
    wp_die();
}
