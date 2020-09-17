require('./bootstrap');

const $ = require('jquery');

$(document).ready(function(){

    $('.custom-control-input').click(function(){
        var valore_radio = $(this).val();

        console.log(valore_radio);
        $('#amount').val(valore_radio);
    });

});
