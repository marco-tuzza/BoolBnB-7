require('./bootstrap');

const $ = require('jquery');

$(document).ready(function(){

    $('.card-apartment button').click(function() {
        var titolo = $('#titolo_appartamento').val();
        console.log(titolo);
        var metratura = $('#metriquadri').val();
        console.log(metratura);
        var indirizzo = $('#form-address').val();
        var città = $('#form-city').val();
        if (titolo.length < 5) {
            alert('Il titolo per il tuo appartamento non è abbastanza lungo');
            return false;
        } else if (metratura == '' || metratura == 'undefined' || metratura < 10) {
            alert('Inserisci il dato giusto!');
            return false;
        } else if (indirizzo == '' || indirizzo == 'undefined') {
            alert('Non hai inserito nessun indirizzo');
            return false;
        } else if (città == '' || città == 'undefined') {
            alert('Non hai inserito la città')
        }
        // } else{
        //     $('.card-apartment button').submit();
        // }
    })

});
