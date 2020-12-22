<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d97baaac009"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/include/functions/reminder-email.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/include/functions/reminder-email_2020-12-08-13.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php

if(class_exists('WC_Email')):
class WC_Reminder_Order_Email extends WC_Email {
    public function __construct() {
        $this->id = 'wc_reminder_email';
        
        $this->title = 'Reminder Email';

        $this->description = 'Reminder Email on order delivery data';

        $this->heading = 'Expedited Shipping Order';
        $this->subject = 'Expedited Shipping Order';

        // these define the locations of the templates that this email should use, we'll just use the new order template since this email is similar
        $this->template_html  = 'emails/admin-new-order.php';
        $this->template_plain = 'emails/plain/admin-new-order.php';

        // Trigger on new paid orders
        add_action( 'woocommerce_order_reminder_email', array( $this, 'trigger' ) );
        add_action( 'woocommerce_order_reminder_email',  array( $this, 'trigger' ) );

        // Call parent constructor to load any other defaults not explicity defined here
        parent::__construct();

        // this sets the recipient to the settings defined below in init_form_fields()
        $this->recipient = $this->get_option( 'recipient' );

        // if none was entered, just use the WP admin email as a fallback
        if ( ! $this->recipient )
            $this->recipient = get_option( 'admin_email' );
    }
    
}
endif;



function add_reminder_email( $email_classes ) {

    $email_classes['WC_Reminder_Order_Email'] = new WC_Reminder_Order_Email();

    return $email_classes;

}
add_filter( 'woocommerce_email_classes', 'add_reminder_email' );