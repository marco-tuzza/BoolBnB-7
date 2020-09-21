require('./bootstrap');

const $ = require('jquery');

$(document).ready(function(){

    $('.custom-control-input').click(function(){
        var valore_radio = $(this).val();

        console.log(valore_radio);
        $('#amount').val(valore_radio);
    });


    // $("#pago").on("submit", function(event) {
    //     console.log('entro');

    //     if ($('.custom-control-input:checked')) {
    //         $("#pago").submit();
    //     } else {
    //         event.preventDefault();
    //         alert('Seleziona una delle sponsorizzazioni!')
    //     }
    // });

});
