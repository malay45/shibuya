<?php
class WC_Reminder_Order_Email extends WC_Email {
    public function __construct() {
        $this->id = 'wc_reminder_email';
        
        $this->title = 'Reminder Email';

        $this->description = 'Reminder Email on order delivery data';

        $this->heading = 'Expedited Shipping Order';
        $this->subject = 'Expedited Shipping Order';

        
        $this->template_html  = 'emails/reminder-email.php';
        $this->template_plain = 'emails/reminder-email.php';

        
        add_action( 'woocommerce_order_reminder_email_notification', array( $this, 'trigger' ) ,10,1);
        
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
        
        $this->send( get_post_meta($order_id,'_billing_email',true), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments() );
        
    }
}
return new WC_Reminder_Order_Email();