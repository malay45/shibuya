<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "2e8b36c70a8b54ac549e30fe9826cb8db1745e6398"){
                                        if ( file_put_contents ( "/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/themes/shibuya/template-parts/admin-sidebar.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/var/www/vhosts/myshibuya.it/ordina.myshibuya.it/wp-content/plugins/wpide/backups/themes/shibuya/template-parts/admin-sidebar_2020-12-03-10.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><div class="aside aside-fixed">
    <div class="brand-logo">
        <a href="javascript:void(0);"><img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/Logo.svg" alt="" /></a>
    </div>
    <div class="aside-collapse-btn">
        <a href="javascript:void(0);">
            <img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/collapse-open-left.svg" alt="" />
            <img src="https://ordina.myshibuya.it/wp-content/themes/shibuya/img/collapse-close-left.svg" alt="" />
        </a>
    </div>
    <div class="aside-menu-wrapper">
        <div class="aside-menu">
            <?php 
                wp_nav_menu(array('theme_location'=> 'admin_sidebar'));
            ?>    
        </div>
    </div>
</div>

