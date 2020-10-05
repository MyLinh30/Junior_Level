define(['jquery', "mage/calendar"],function($){
    'use strict';
    return function dateShippingCalendar(){
        $("#date_shipping").calendar({
            buttonText:"<?php echo __('Select Date') ?>",
            showsTime:true
        });
    }
})
