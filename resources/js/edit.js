require('./bootstrap');

const $ = require('jquery');

$(function() {

    // qua imposto il messaggio di conferma di salvataggio dell'appartamento
    var allowSubmit = false;

    if ( $('#non-visibile').is(':checked') ) {
        $('#non-visibile').val('0');
    } else {
        $('#non-visibile').val('1');
    }

    $("#non-visibile").on("click", function() {
        if ( $(this).is(':checked') ) {
            $('#non-visibile').val('0');
        } else {
            $(this).val('1');
        }
    });
    
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


});