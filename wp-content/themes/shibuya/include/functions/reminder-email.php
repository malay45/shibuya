<?php

function add_reminder_email( $email_classes ) {

    include 'class-reminder-email.php';

    $email_classes['WC_Reminder_Order_Email'] = new WC_Reminder_Order_Email();

    return $email_classes;

}
add_filter( 'woocommerce_email_classes', 'add_reminder_email' );

