let timeout = null;
jQuery(document).on('keyup','#search-product',function() {
    jQuery('.search-result').addClass('active');
    jQuery('body').addClass('noScroll');
    var value = jQuery(this).val();
    value_trim = value.replace(/\s/g,'')
    
    if(value_trim.length>2){
        clearTimeout(timeout);    
        timeout = setTimeout(function () {
            jQuery.ajax({
                url : wc_add_to_cart_params.ajax_url,
                type : 'post',
                data : {
                    action : 'ajax_search',
                    search : value
                },
                success : function( response ) {
                    jQuery('.search-result__wrap').html(response);
                }
            });
        },2000);
    }  else{
        jQuery('.search-result').removeClass('active');   
        jQuery('body').removeClass('noScroll');     
        jQuery('.search-result__wrap').html('<h3 class="title-ajax-search">Stiamo caricando i risultati...</h3><div class="loader-search simple-circle"></div>');
    }  
})


/*** FILTER */

$(".filter-title").click(function(){
    $(this).toggleClass('active');
    $(this).next('.filter-content').slideToggle('open');
})

jQuery(document).on('change','input[name="filter_by"]',function(){
    jQuery('input[name="filter_by"]:not("#'+jQuery(this).attr('id')+'")').prop('checked', false);
    jQuery('.apply_button[data-id="filter_filter_by"]').trigger('click');
})
jQuery(document).on('click','.filter-option label',function(){
    jQuery(this).toggleClass('active');
})
jQuery(document).on('click','.apply_button,.new_page_link',function(){
    jQuery('.loader-search-wrap').css('display','flex');
    jQuery('.filter-content').hide();
    var total_filter = 0;
    jQuery('.filter_count').each(function(){
        var id = jQuery(this).attr('data-id');    
        console.log(id)
        console.log(jQuery('input[name="'+id+'"]:checked'))
        var count = jQuery('input[name="'+id+'"]:checked').length;
        if(count>0){
            total_filter = total_filter + 1;
            jQuery(this).html('('+count+')');    
            
        }else {
            jQuery(this).html('');    
        }
        
    })
    if(total_filter>0){
        jQuery('.clear_filters').removeClass('hidden').addClass('visibile')
    }else{
        jQuery('.clear_filters').removeClass('visibile').addClass('hidden')
    }
    
    // jQuery('#filtri_ajax_content_new').hide()
    if(jQuery(this).hasClass('new_page_link')) {
        var $page = jQuery(this).attr('data-id');    
    } else {
        var width = jQuery(window).width();
        var $page = jQuery('#queried_page').val();    
        var $id = jQuery(this).attr('data-id');
        var filter_by = jQuery('input[name="filter_by"]:checked').val();    
    }
    var size = jQuery('#page_size').val();    
    var filter_by_relevance = jQuery('#filter_new input[name="filter_by_relevance"]:checked').val();
    filter_by_price = [];
    jQuery('input[name="filter_by_price"]:checked').each(function(i){
       filter_by_price[i] = jQuery(this).val()
    });

   jQuery.ajax({
         type : "post",   
         url: my_ajax_object.ajax_url,
         data : {
             action: "as_filter_product",
             page : $page,
             size:size,
             cat_id:jQuery('#cat_id').val(),
             filter_by :filter_by,
             filter_by_attribute:(jQuery('.filter_attribute:checked').serializeArray()) 
         },
         
         error: function(data) {
            console.log(data)
        },
      }).done(function( data ) {
          jQuery('#filtri_ajax_content_new').html(data).show();
          jQuery('.loader-search-wrap').fadeOut();
          setTimeout(function(){
            jQuery('.product_is_loading').hide(); 

          },1000)
        var scroll = new SmoothScroll('[data-easing="easeInQuart"]', {
            speed: 500,
            speedAsDuration: true
        });
        var anchor = document.querySelector('#products-loop');
        scroll.animateScroll(anchor);
      }); 
    
    
    
})


jQuery(document).on('click','.clear_filters',function(){
    jQuery('.filter_attribute').prop('checked',false);
    jQuery('input[name="filter_by"]').prop('checked',false);
    jQuery('.apply_button').trigger('click');
})



 jQuery(document).on('change','input[type="radio"][name="ship_to_different_address"]',function(){
        var checked_input = jQuery('input[type="radio"][name="ship_to_different_address"]:checked').attr('id')
        jQuery('.hide_show_shipping').hide();
        jQuery('.hide_show_shipping[data-id="'+checked_input+'"]').show();
    });
    
    
    jQuery(document).on('click','.confirm_shipping',function(){
        jQuery('.section-shipping').removeClass('not-filled').removeClass('open');
        jQuery('.section-shipping').addClass('filled').addClass('closed');
        
        if(!jQuery('.section-billing-payment').hasClass('filled')){
            jQuery('.section-billing-payment').addClass('not-filled').addClass('open');
            jQuery('.section-billing-payment').removeClass('filled').removeClass('closed');
        }
        if(jQuery('.section-billing-payment').hasClass('filled')&&jQuery('.section-shipping').hasClass('filled')){
            jQuery('.section-terms-condition').removeClass('disabled')
        }
        
        updateShippingSummary();
          
    })
    jQuery(document).on('click','.modify_shipping',function(){
        jQuery('.section-shipping').addClass('not-filled').addClass('open');
        jQuery('.section-shipping').removeClass('filled').removeClass('closed');
    })
    jQuery(document).on('click','.confirm_billing',function(){
        jQuery('.section-billing-payment').removeClass('not-filled').removeClass('open');
        jQuery('.section-billing-payment').addClass('filled').addClass('closed');
        if(jQuery('.section-billing-payment').hasClass('filled')&&jQuery('.section-shipping').hasClass('filled')){
            jQuery('.section-terms-condition').removeClass('disabled')
        }
        updateBillingSummary()
    })
    jQuery(document).on('click','.modify_billing',function(){
        jQuery('.section-billing-payment').addClass('not-filled').addClass('open');
        jQuery('.section-billing-payment').removeClass('filled').removeClass('closed');
        jQuery('.section-shipping').removeClass('not-filled').removeClass('open');
        jQuery('.section-shipping').addClass('filled').addClass('closed');
    })



function updateShippingSummary(){
    var ship_to_different_address = jQuery('input[name="ship_to_different_address"]:checked').val();    
    if(ship_to_different_address==1){
        jQuery('.shipping_method_title').html('Delivery Address');
        jQuery('.shipping_method').html('Standard Delivery Item'); 
        var shipping_name = jQuery('#shipping_first_name').val() + ' ' +  jQuery('#shipping_last_name').val();
        var shipping_address = jQuery('#shipping_address_1').val() + ' ' + jQuery('#shipping_address_2').val() + ' ' +  jQuery('#shipping_city_field').val() +' ' +  jQuery('#shipping_state_field').val() +' ' +  jQuery('#shipping_country_field').val()+' ' +  jQuery('#shipping_postcode').val()
        jQuery('.shipping_address_summary').html('<div class="shipping_address_name">'+shipping_name+'</div>'+'<div class="shipping_address_address">'+shipping_address+'</div>')
        jQuery('#shipping_method_0_flat_rate1').trigger('click')
    }else {
        jQuery('.shipping_method_title').html('Indirizzo di ritiro');
        var store_id = jQuery('#store_id').val();
        var storeData = jQuery.parseJSON( jQuery('#store_data').val());
        
        jQuery('.shipping_address_summary').html('<div class="shipping_address_name">'+storeData[store_id].name+'</div>'+'<div class="shipping_address_address">'+storeData[store_id].address+'</div>'+'<div class="shipping_address_phone">'+storeData[store_id].phone_number+'</div>')
        jQuery('.shipping_method').html('Ritiro in negozio');    
        jQuery('#shipping_method_0_custom_localpickup').trigger('click')
    }
}

function updateBillingSummary(){
    jQuery('.payment_method_selected').html(jQuery('input[name="payment_method"]:checked').val());
    var billing_name = jQuery('#billing_first_name').val() + ' ' +  jQuery('#billing_last_name').val();
    var billing_address = jQuery('#billing_address_1').val() + ' ' + jQuery('#billing_address_2').val() + ' ' +  jQuery('#billing_city').val() +' ' +  jQuery('#billing_state').val() +' ' +  jQuery('#billing_country').val()+' ' +  jQuery('#shipping_postcode').val()
    var billing_address_contact =     jQuery('#billing_phone').val() + ' ' + jQuery('#billing_email').val();
    jQuery('.billing_address_summary').html('<div class="billing_address_name">'+billing_name+'</div>'+'<div class="billing_address_address">'+billing_address+'</div>'+'<div class="billing_address_contact">'+billing_address_contact+'</div>')
}


jQuery(document).on('change','#override_details_with_shipping',function(){
    if(jQuery(this).is(":checked")){
        jQuery('#billing_first_name').val(jQuery('#shipping_first_name').val())   
        jQuery('#billing_last_name').val(jQuery('#shipping_last_name').val())  
        jQuery('#billing_country').val(jQuery('#shipping_country').val())  
        jQuery('#billing_city').val(jQuery('#shipping_city').val())  
        jQuery('#billing_address_2').val(jQuery('#shipping_address_2').val())  
        jQuery('#billing_address_1').val(jQuery('#shipping_address_1').val())  
        jQuery('#billing_state').val(jQuery('#shipping_state').val())  
        jQuery('#billing_postcode').val(jQuery('#shipping_postcode').val())  
        jQuery('#billing_company').val(jQuery('#shipping_company').val())  
        
        
    } 
});