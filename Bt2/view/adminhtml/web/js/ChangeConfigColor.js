define(['jquery'],function($){
    'use strict';
    return function changeConfigColor(){

        var color = $("#color-text-menu-clock").val();

        $(".item-clock.level-2 > a").css("color",color);
        $(".item-configuration.level-2 > a").css("color",color);
    }
});
