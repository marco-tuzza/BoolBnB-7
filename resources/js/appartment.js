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