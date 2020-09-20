require('./bootstrap');

const $ = require('jquery');

$(document).ready(function(){

    $('#login').click(function(){
        $('.wrapper-apartament').addClass('active');
        // tl.fromTo(card_login, 1, {y:"200%", opacity:0}, {y: "-50%", opacity:1, ease: Power2.easeInOut });
        $('.form-accedi').addClass('mostra-form');
    });

    $('.close').click(function(){
        $('.form-accedi').removeClass('mostra-form');
        $('.wrapper-apartament').removeClass('active');
    });
    
});