if (document.querySelector('.Right-cnt-wrapper')) {
    var sidebar = new StickySidebar('.Right-cnt-wrapper', {
        topSpacing: 20,
        bottomSpacing: 20,
        containerSelector: '.container-home-wrap',
        innerWrapperSelector: '.sidebar__inner'
    });
}
jQuery(document).ready(function(){
    console.log(readCookie('location-id'))
    if(!readCookie('location-id')){
        jQuery('.Location-selection-modal').fadeIn()
    }  
    if(jQuery('.pickup_date').length){
        jQuery('.pickup_date').dateDropper({
            format : "d F Y",
            lang : "it",
            large: true,
            largeDefault : true,
            onChange: function(res) {
                console.log(res);
                console.log('Current date ' + (res.date.m+'/'+res.date.d+'/'+res.date.Y) );
                jQuery('#pickup_date').val(res.date.Y+'-'+res.date.m+'-'+res.date.j);
            }
            
        
        });
    }
    
    if(jQuery('.order_edit_date').length){
        jQuery('.order_edit_date').dateDropper({
            format : "d F Y",
            lang : "it",
            large: true,
            largeDefault : true,
            onChange: function(res) {
                console.log(res);
                console.log('Current date ' + (res.date.m+'/'+res.date.d+'/'+res.date.Y) );
                jQuery('#order_edit_date').val(res.date.Y+'-'+res.date.m+'-'+res.date.j);
                jQuery('.order_edit_date').html(res.date.d+'-'+res.date.F+'-'+res.date.Y);
            }
            
        
        });
    }
    if(jQuery('.order-list-table tbody tr').length>1){
        jQuery('.order-list-table').DataTable();
    }
    

    if(jQuery('input[name="daterange"]').length){
        jQuery('input[name="daterange"]').daterangepicker({
            opens: 'left',
            maxDate: moment().startOf('hour'),
            locale : {
                daysOfWeek: ['dom', 'lun', 'mar', 'mer', 'gio', 'ven', 'sab'],
                monthNames: ['gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'],
            },
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            jQuery('#end_date').val(end.format('DD-MM-YYYY'))
            jQuery('#start_date').val(start.format('DD-MM-YYYY'))
            jQuery('#order_list_filter').submit()
        });
    }
    
    jQuery('select.dropdown').dropdown()
    
    var tel_input = document.querySelector("input[name='billing_phone']");
    var otp_input = document.querySelector("input[name='otp-number']");
    
    
    if(tel_input){
        window.intlTelInput(tel_input, {
            allowDropdown : false,
            autoHideDialCode : false,
            onlyCountries : ['it'],
            separateDialCode : true
        });    
    }
    if(otp_input){
        window.intlTelInput(otp_input, {
            allowDropdown : false,
            autoHideDialCode : false,
            onlyCountries : ['it'],
            separateDialCode : true
        });    
    }
    
    
})


// jQuery(document).on('click','.Selection-wrapp .dropdown > a',function(){
//     jQuery('.Selection-wrapp > .dropdown').toggleClass('show');
//     jQuery('.Selection-wrapp > .dropdown-menu').toggleClass('show');
// })

jQuery(document).on('click','.datepicker-dummy',function(){
    jQuery('.datepicker-real').trigger('click')    
})

jQuery(document).on('click','.select_location',function(){
    var id = jQuery(this).attr('data-id')
    selectLocation(id)
})

function selectLocation(id){
    var location_data = jQuery('.location_data').val();
    location_data = jQuery.parseJSON(location_data)
    console.log(location_data)
    jQuery.each(location_data,function(i,data){
        if(data.id==id){
            createCookie('location-id',id)
            jQuery('.location_title').html(data.title);
            jQuery('.header_location_title').html(data.title);
            jQuery('.header_edit_location_link').attr('href',data.link);
            jQuery('.location_address').html(data.address);
            jQuery('.Location-selection-modal').fadeOut()
        } 
    });
}


// jQuery(document).on('click','.edit_address,.header_location_title',function(){
//     jQuery('.Location-selection-modal').fadeIn()
// })



function showLoader(){
    jQuery('.loader-search-wrap').css('display','flex')
}
function hideLoader(){
    jQuery('.loader-search-wrap').fadeOut()
}

jQuery(document).on('click','.child-cat-list',function(){
    showLoader()
    jQuery('.child-cat-list').removeClass('active');
    jQuery(this).addClass('active');
    var id = jQuery(this).attr('data-id')
      jQuery.ajax({
        url : ShibayuObj .ajax_url,
        type : 'post',
        data : {
            action : 'ajax_load_child',
            id : id
        },
        success : function( response ) {
            jQuery('.Product-listing-data').html(response);
            hideLoader()
        }
    });    
})
jQuery(document).on('click','.load-parent-cat',function(){
    showLoader()
    
    jQuery(this).addClass('active');
    var id = jQuery(this).attr('data-id')
      jQuery.ajax({
        url : ShibayuObj.ajax_url,
        type : 'post',
        data : {
            action : 'ajax_load_parent',
            id : id
        },
        success : function( response ) {
            response = jQuery.parseJSON(response);
            jQuery('.Sub-category-list').html(response.child_cat);
            jQuery('.Product-listing-data').html(response.product);
            hideLoader()
        }
    });    
})

jQuery( document ).on( 'click', '.Pro-add-cart', function(e) {
    e.preventDefault();
    showLoader()
    var $this = jQuery(this)
    var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: jQuery(this).attr('data-id'),
            product_sku: '',
            quantity: 1,
            variation_id: '',
        };  
        jQuery.ajax({
            type: 'post',
            url: ShibayuObj.ajax_url,
            data: data,
            success: function (response) {

                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $this]);
                        jQuery.each( response.fragments, function( key, value ) {
                            jQuery( key ).replaceWith( value );
                        });
                }
                hideLoader()
                sidebar.updateSticky();
            },
        });

});

function update_mini_cart(key,quantity){
    showLoader()
    jQuery.ajax({
            type: 'post',
            url: ShibayuObj.ajax_url,
            data: {
                action : 'mini_cart_change_quanity',
                key : key,
                quantity : quantity
            },
            success: function (response) {
                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash]);
                jQuery.each( response.fragments, function( key, value ) {
                    jQuery( key ).replaceWith( value );
                    jQuery( key ).stop( true ).css( 'opacity', '1' );
                });
                hideLoader()
            },
        });
}

jQuery(document).on('click','.Delete-item',function(){
    console.log(jQuery(this).attr('data-qty'))
    update_mini_cart(jQuery(this).attr('data-id'),jQuery(this).attr('data-qty'));

})

function delete_order(order_id){
    jQuery('#delete_order .btn-danger').attr('data-id',order_id)
    jQuery('#delete_order').modal('show');
}

jQuery(document).on('click','#delete_order .btn-danger',function(){
    window.location.href=jQuery(this).attr('data-url')+jQuery(this).attr('data-id')    
})


jQuery(document).on('click','.btn-number',function(){
    var type = jQuery(this).attr('data-type')
    var input = jQuery(this).parents('.input-group').find('input');
    var value = input.val()
    if(type=='minus'){
        value = value-1;
    } else {
        value = parseInt(value)+1;
    }
    update_mini_cart(input.attr('data-id'),value);
    
})

jQuery(document).on('click','.Send-sms-btn',function(){
    jQuery('.otp_success').html('')
    var number = jQuery('.otp-number').val()
    jQuery(this).attr('disabled',true)
    if(number!=''){
        jQuery.ajax({
            type: 'post',
            url: ShibayuObj.ajax_url,
            data: {
                action : 'send_otp',
                number : number
            },
            success: function (response) {
                jQuery('.otp_success').html(response)
                jQuery(this).attr('disabled',false)
                jQuery('.Continue-btn').show()
                jQuery('.Enter-passcode').show()
                hideLoader()
            },
        });
    }
})

jQuery(document).on('keyup','.validation-code',function(){
    jQuery(this).next('input').focus();
    
})
jQuery(document).on('keyup','.validation-code',function(){
      validateCheckout()  
})
jQuery(document).on('keyup','.otp-number',function(){
      validateAskOtp()  
})
jQuery(document).on('change','input[name="billing_first_name"],input[name="billing_last_name"],input[name="billing_email"],input[name="billing_phone"],input[name="pickup_date"],input[name="terms_condition"],.validation-code,.otp-number',function(){
    validateCheckout()
    validateAskOtp()
})

function validateCheckout(){
    var isValid = true;
    if(jQuery('input[name="billing_first_name"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_last_name"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_email"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_phone"]').val()==''){
        isValid = false;
    }
    if(jQuery('#pickup_date').val()==''){
        isValid = false;
    }
    if(!jQuery('input[name="terms_condition"]').is(':checked')){
        isValid = false;
    }
    
    if(jQuery('.validation-code-1').val()==''){
        isValid = false;        
    }
    if(jQuery('.validation-code-2').val()==''){
        isValid = false;        
    }
    if(jQuery('.validation-code-3').val()==''){
        isValid = false;        
    }
    if(jQuery('.validation-code-4').val()==''){
        isValid = false;        
    }
    
    if(isValid){
        jQuery('#place_order').attr('disabled',false)    
    } else {
        jQuery('#place_order').attr('disabled','disabled')    
    }
}

function validateAskOtp(){
    var isValid = true;
    if(jQuery('input[name="billing_first_name"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_last_name"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_email"]').val()==''){
        isValid = false;
    }
    if(jQuery('input[name="billing_phone"]').val()==''){
        isValid = false;
    }
    if(jQuery('#pickup_date').val()==''){
        isValid = false;
    }
    if(!jQuery('input[name="terms_condition"]').is(':checked')){
        isValid = false;
    }
    if(jQuery('.otp-number').val()==''){
        isValid = false;
    }
    if(jQuery('.otp-number').val()!='' && (jQuery('.otp-number').val()).length<9){
        isValid = false;
    }
    
    
    if(isValid){
        jQuery('.Send-sms-btn').attr('disabled',false)    
    } else {
        jQuery('.Send-sms-btn').attr('disabled','disabled')    
    }
}


jQuery(document).on('change','.page-reload',function(){
    jQuery(this).parents('form').submit()    
})

function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";               

    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
