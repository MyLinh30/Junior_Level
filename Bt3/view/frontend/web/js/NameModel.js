define([
    'jquery',
    'uiComponent',
    'ko',
    'Magento_Ui/js/modal/alert'
], function($, Component, ko,alert) {


    return Component.extend({

        initialize:function(){
            this._super();

            this.first_name = ko.observable("Truong");
            this.last_name = ko.observable("Thi My Linh");
            this.full_name = ko.observable(this.first_name()+" "+this.last_name());
        },

        getTemplate: function () {
            return this.template;
        },

        standardize: function(){
            if(!this.checkValidName(this.first_name(),this.last_name())){
                this.alertMessage("Your input name not valid");
                return ;
            }
            this.full_name(this.capitalize(this.first_name()+" "+this.last_name()));
        },

        convertNameToFullName:function(){
            if(!this.checkValidName(this.first_name(),this.last_name())){
                this.alertMessage("Your input name not valid");
                return ;
            }
            this.full_name(this.capitalize(this.first_name()+" "+this.last_name()));
        },

        checkValidName:function(firstname,lastname){
            return /^[a-zA-Z \s]+$/.test(firstname+" "+lastname);
        },

        alertMessage:function(message){
            alert({
                title:"Warning",
                content:message,
            });
        },

        capitalize: function(str){
            if (typeof str !== 'string') return ''
            str = str.toLowerCase();
            return str.replace(/\b\w/g, l => l.toUpperCase())
        }

    });
});
