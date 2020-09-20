require('./bootstrap');

const $ = require('jquery');

$(function() {

    // qua imposto il messaggio di conferma di salvataggio dell'appartamento
    var allowSubmit = false;

    $("#form-salva").on("submit", function(event) {
        $('.wrapper-apartament').addClass('active');
        $('.form-success').addClass('mostra-form');

        if (!allowSubmit) {
            event.preventDefault();

            // $('#continue').click(function(){
            //     $('.form-success').removeClass('mostra-form');
            //     $('.wrapper-apartament').removeClass('active');
            //     allowSubmit = true;
            //     $("#form-salva").submit();
            // });
        }

        setTimeout(function() {
            $('.form-success').removeClass('mostra-form');
            $('.wrapper-apartament').removeClass('active');
            allowSubmit = true;
            $("#form-salva").submit();
        }, 3000);

    });

    $("#form-elimina").on("submit", function(event) {
        console.log('entro');
        $('.wrapper-apartament').addClass('active');
        $('.form-delete').addClass('mostra-form');

        if (!allowSubmit) {
            event.preventDefault();

            $('#continue').click(function(){
                $('.form-delete').removeClass('mostra-form');
                $('.wrapper-apartament').removeClass('active');
                allowSubmit = true;
                $("#form-elimina").submit();
            });

            $('.close').click(function(){
                $('.form-delete').removeClass('mostra-form');
                $('.wrapper-apartament').removeClass('active');
            });
            $('.annulla').click(function(){
                $('.form-delete').removeClass('mostra-form');
                $('.wrapper-apartament').removeClass('active');
            });
        }


    });

    (function() {
        var placesAutocomplete = places({
            appId: 'plT92Q60ZYBJ',
            apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
            container: document.querySelector('#form-address'),
            templates: {
                value: function(suggestion) {
                    return suggestion.name;
                }
            }
        }).configure({
            type: 'address'
        });
        placesAutocomplete.on('change', function resultSelected(e) {
            document.querySelector('#form-address2').value = e.suggestion.county || '';
            document.querySelector('#form-city').value = e.suggestion.city || '';
            document.querySelector('#form-zip').value = e.suggestion.postcode || '';
            $('#latitudine').val(e.suggestion.latlng.lat);
            $('#longitudine').val(e.suggestion.latlng.lng);
        });
    })();


});

$('.card-apartment button').click(function() {
    var titolo = $('#titolo_appartamento').val();
    console.log(titolo);
    var descrizione = $('#descrizione').val();
    var metratura = $('#metriquadri').val();
    console.log(metratura);
    var indirizzo = $('#form-address').val();
    var città = $('#form-city').val();
    var zip_code = $('#form-zip').val();
    if (titolo.length < 5 || titolo.length > 100 ||  titolo == '' || titolo == 'undefined' || titolo.trim() == "") {
        alert('Inserisci un titolo da 10 a 100 caratteri');
        return false;
    } else if (descrizione.length < 10 || descrizione.length > 3000 ||  descrizione == '' || descrizione == 'undefined' || descrizione.trim() == "") {
        alert('Inserisci una descrizione da 10 a 3000 caratteri');
        return false;
    } else if (metratura == '' || metratura == 'undefined' || metratura < 10 || metratura > 500 || metratura.trim() == "") {
        alert('Inserisci il dato giusto!');
        return false;
    } else if (indirizzo == '' || indirizzo == 'undefined' || indirizzo.trim() == "") {
        alert('Non hai inserito nessun indirizzo');
        return false;
    } else if (città == '' || città == 'undefined' || città.trim() == "") {
        alert('Non hai inserito la città');
    } else if (zip_code.length < 5) {
        alert('Inserisci il codice postale giusto');
    }
})
