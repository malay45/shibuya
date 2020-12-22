<div class="aside aside-fixed">
    <div class="brand-logo">
        <a href="<?php echo site_url();?>"><img src="<?php echo site_url();?>/wp-content/themes/shibuya/img/Logo.svg" alt="" /></a>
    </div>
    <div class="aside-collapse-btn open">
        <a href="javascript:void(0);">
            <img src="<?php echo site_url();?>/wp-content/themes/shibuya/img/collapse-open-left.svg" alt="" />
            <img src="<?php echo site_url();?>/wp-content/themes/shibuya/img/collapse-close-left.svg" alt="" />
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

