define([
    'Magento_Ui/js/form/element/date'
], function(Date) {
    'use strict';
    return Date.extend({
        defaults: {
            options: {
                beforeShowDay: function(d) {
                    if(d.getDate()<8 || d.getDate()>12){
                        return [false,"","Disabled"]
                    }else{
                        return [true,"","Enable"]
                    }
                }
            },
        }
    });
});
