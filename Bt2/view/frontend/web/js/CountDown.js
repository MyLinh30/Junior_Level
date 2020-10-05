define(['jquery', 'uiComponent', 'ko'], function($, Component, ko) {

    return Component.extend({

        clock: ko.observable(),
        initialize:function(){
            this._super();
            var self = this;
            // neu dung window.clock = ko.observable(null);
            self.clock = ko.observable(null);
            self.currentTimeNow();
        },
        updateTime : function (k){
            if (k < 10) {
                return "0" + k;
            }
            else {
                return k;
            }
        },
        currentTimeNow: function (){
            var self = this;
            var x = setInterval(function (){
                let date = new Date(); /* creating object of Date class */
                let hour = date.getHours();
                let min = date.getMinutes();
                let sec = date.getSeconds();
                var midday = "AM";
                midday = (hour >= 12) ? "PM" : "AM";
                hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour);
                var newTime = hour+":"+min+":"+sec +" " +midday;
                //debugger;
                //window.clock(newTime);
                self.clock(newTime);
            },1000)
        },

    });
});
