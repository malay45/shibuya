<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8d2813c5158e"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/include/functions/class-reminder-email.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/include/functions/class-reminder-email_2020-12-08-18.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php
class WC_Reminder_Order_Email extends WC_Email {
    public function __construct() {
        $this->id = 'wc_reminder_email';
        
        $this->title = 'Reminder Email';

        $this->description = 'Reminder Email on order delivery data';

        $this->heading = 'Expedited Shipping Order';
        $this->subject = 'Expedited Shipping Order';

        
        $this->template_html  = 'emails/reminder-email.php';
        $this->template_plain = 'emails/reminder-email.php';

        
        add_action( 'woocommerce_order_reminder_email', array( $this, 'trigger' ) );
        
        $this->customer_email = true;
        
        parent::__construct();

    }
    /**
     * Get email subject.
     *
     * @since  3.1.0
     * @return string
     */
    public function get_default_subject() {
        return __( 'Order Reminder' );
    }

    /**
     * Get email heading.
     *
     * @since  3.1.0
     * @return string
     */
    public function get_default_heading() {
        return __( 'Order Reminder' );
    }
    public function get_content_html() {
            return wc_get_template_html(
                $this->template_html,
                array(
                    'order'              => $this->object
                )
            );
        }

    function trigger($order_id){
        
        if ( $order_id && ! is_a( $order, 'WC_Order' ) ) {
            $order = wc_get_order( $order_id );
        }   
        $this->object  = $order;
        echo $this->get_recipient();
        $this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        exit;
    }
}
return new WC_Reminder_Order_Email();