/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const $ = require('jquery');
const Handlebars = require("handlebars");



$(document).ready(function(){

    $('#login').click(function(){
        $('.form-accedi').addClass('mostra-form');
        $('.wrapper-page').addClass('active');
    });

    $('#register').click(function(){
        $('.form-registrati').addClass('mostra-form');
        $('.wrapper-page').addClass('active');
    });

    $('.close').click(function(){
        $('.form-accedi').removeClass('mostra-form');
        $('.form-registrati').removeClass('mostra-form');
        $('.wrapper-page').removeClass('active');
    });

    // preparo le variabili per handlebars
    var template_html = $('#card-template').html();
    var template = Handlebars.compile(template_html);

    // Configurazione Alogolia
    var placesAutocomplete = places({
        appId: 'plT92Q60ZYBJ',
        apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
        container: document.querySelector('#address-input')
        }).configure({
            language: 'it', // Ricevo risultati in italiano
            countries: ['it'], // Ricevo risultati per l'Italia
            type: ['city', 'address'], // Cerco per città e indirizzo
        });
    
    // al change dell'input, svuoto e faccio partire la ricerca 


    placesAutocomplete.on('change', function prova (e)  {
    
        var lat = e.suggestion.latlng.lat
        var lon = e.suggestion.latlng.lng

        $('.search').click(function(){
            $('.img-evidence').empty();
            var numerostanze = $('#numerostanze').children('option:selected').val();
            console.log(numerostanze);
            var numeroletti = $('#numeroletti').children('option:selected').val();
            console.log(numeroletti);
            parte_ricerca(lat, lon, e, numerostanze, numeroletti);
        });
        
    });


    function parte_ricerca (lat, lon, e, numerostanze, numeroletti) {

        $.ajax({
    
            "url" : "http://localhost:8000/api/apartment/search/" + Math.round(lat) + '/' + Math.round(lon) + '/' + numerostanze + '/' + numeroletti,
    
            "method" : "GET",
    
            "success" : function(answer) {
                console.log(lat, lon);

                $('.img-evidence').empty();
    
                var apartment = answer.data;
    
                // $('.risultati').append(apartment);
    
                console.log(apartment);
            
                for (var i = 0; i < apartment.length; i++) {
                        var apartmentData = apartment[i]
                        var lat2 = apartment[i].latitudine
                        var lon2 = apartment[i].longitudine    
                        var lat1 = e.suggestion.latlng.lat
                        var lon1 = e.suggestion.latlng.lng
                        distance(lat1,lon1,lat2,lon2, apartmentData);
                };
    
                if ($('.img-evidence').is(':empty')){
                    $('.img-evidence').append('nessun risultato trovato')
                };
            },
        });
    }
    
    function distance(lat1, lon1, lat2, lon2, apartmentData) {
        if ((lat1 == lat2) && (lon1 == lon2)) {
            return 0;
        }
        else {
            var radlat1 = Math.PI * lat1/180;
            var radlat2 = Math.PI * lat2/180;
            var theta = lon1-lon2;
            var radtheta = Math.PI * theta/180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            if (dist > 1) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180/Math.PI;
            dist = dist * 60 * 1.1515;
            dist = dist * 1.609344
            if (dist < 20) {
                // $('.risultati').append(apartmentData.id + apartmentData.titolo_appartamento + parseInt(dist) + 'km'+ '<br>');
                disegno_card(apartmentData.titolo_appartamento, apartmentData.immagine_appartamento, apartmentData.services, apartmentData.id)   
            } else {
                console.log('troppo lontano');
            }
        }
    }

    function disegno_card(dati, immagine, servizi, id) {

        array_servizi = servizi;
        var servizi = [];

        for (let i = 0; i < array_servizi.length; i++) {
            servizi.push(array_servizi[i].titolo_servizio);
            
        }

        // preparo i dati per il template
        var card_app = {
            'titolo': dati,
            'imm': immagine,
            'servizi' : '<p class="serv" >'+ servizi +'</p>',
            'id': id
        };
        // riempo il template di handlebars
        var html_card = template(card_app);
        // appendo la card con i dati del risultato corrente
        $('.img-evidence').append(html_card);
    }

    $('.check-input').on ('click', function(){

        $('.card').removeClass('non-visible');

        var selezionati = [];
        

        $('.check-input:checked').each(function(){
            var nome = $(this).attr('name');
            selezionati.push(nome);
        });
        
        console.log(selezionati);
        
        // var valore = $(this).attr('name');
        // console.log(valore);

        $('.serv').each(function(){
            // var presenti = [];
            var val_p = $(this).text();
            // presenti.push(val_p)

            // console.log(val_p.includes(valore));
            if ( !val_p.includes(selezionati) ) {
                console.log(val_p);
                // console.log(this);
                $(this).closest('.card').addClass('non-visible');
            } else if (selezionati == '') {
                console.log(val_p);
                $('.card').removeClass('non-visible');
            }
            
        });
    });


});



