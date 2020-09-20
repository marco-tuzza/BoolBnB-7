/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const $ = require('jquery');
const Handlebars = require("handlebars");

const block1 = document.querySelector('.first-block');
const back = document.querySelector('.wrapper-page');
// const logo = document.querySelector('.logo');
// const menu = document.querySelector('.text-elements');
const text = document.querySelector('.tit');
const text2 = document.querySelector('.tit2');
const input = document.querySelector('.input-an');
const text3 = document.querySelector('.text-card');
const card = document.querySelector('.img-evidence');
const card_login = document.querySelector('.form-accedi');
const card_register = document.querySelector('.form-registrati');

const tl = gsap.timeline({ defaults: { ease: "power1.out" } });


tl.fromTo(block1,1, {y:"-100%", opacity:0}, {y: "0%", opacity:1, ease: Power2.easeInOut })
    .fromTo(back,1, {opacity:0}, {opacity: 1, ease: Power2.easeInOut }, "-=1")
    .fromTo(text, 1, {opacity:0, y:50}, {opacity: 1, y:0, ease: Power2.easeInOut })
    .fromTo(text2, 1, {opacity:0, y:50}, {opacity: 1, y:0, ease: Power2.easeInOut }, "-=0.5")
    .fromTo(input, 1.5, {opacity:0, y:100}, {opacity: 1, y:0,  ease: Back.easeOut.config(1)})
    .fromTo(text3,1, {opacity:0, y:30}, {opacity: 1, y:0, ease: Power2.easeInOut }, "-=1")
    .fromTo(card, 1.5, {opacity:0, y:100}, {opacity: 1, y:0,   ease: Back.easeOut.config( 2)},"-=1");
    

const tl2 = gsap.timeline({ defaults: { ease: Back. easeIn.config( 1.7) } });

$(document).ready(function(){

    $('#login').click(function(){
        $('.wrapper-page').addClass('active');
        tl.fromTo(card_login, 1, {y:"200%", opacity:0}, {y: "-50%", opacity:1, ease: Power2.easeInOut });
        $('.form-accedi').addClass('mostra-form');
    });

    $('#register').click(function(){
        $('.wrapper-page').addClass('active');
        tl.fromTo(card_register, 1, {y:"200%", opacity:0}, {y: "-50%", opacity:1, ease: Power2.easeInOut });
        $('.form-registrati').addClass('mostra-form');
    });

    $('.tl1').click(function(){
        $('.wrapper-page').removeClass('active');
        tl2.fromTo(card_login,1, {y:"-50%", opacity:1}, {y: "200%", opacity:0});
    });

    $('.tl2').click(function(){
        $('.wrapper-page').removeClass('active');
        tl2.fromTo(card_register, 1, {y:"-50%", opacity:1}, {y: "200%", opacity:0});
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
    
    var lat;
    var lon;
    var luogo;
    // al change dell'input, e al click su search, svuoto e faccio partire la ricerca 
    placesAutocomplete.on('change', function prova (e)  {
        
        luogo = e;
        lat = luogo.suggestion.latlng.lat;
        lon = luogo.suggestion.latlng.lng;
        
    });

    $('.search').on('click', function(){
        $('.text-card h2').text('Risultati della ricerca:');
        var numerostanze = $('#numerostanze').children('option:selected').val();
        
        var numeroletti = $('#numeroletti').children('option:selected').val();
        
        var distanza = $('#distanza').children('option:selected').val();
        
        parte_ricerca(lat, lon, luogo, numerostanze, numeroletti, distanza);
    });

    function parte_ricerca (lat, lon, e, numerostanze, numeroletti, distanza) {

        $.ajax({
    
            "url" : "http://localhost:8000/api/apartment/search/filter",
    
            "method" : "GET",

            "data" : {
                'lat' : lat,
                'lon' : lon,
                'stanze': numerostanze,
                'letti': numeroletti,
                'servizi' : filtroservizi(),
                'distanza': distanza
            },
    
            "success" : function(answer) {

                $('.img-evidence').empty();
                
                console.log(lat, lon);
    
                var apartment = answer.data;
    
                console.log(apartment);
                tl.fromTo(card, 1.5, {opacity:0, y:100}, {opacity: 1, y:0,   ease: Back.easeOut.config( 2)},"-=1");
                for (var i = 0; i < apartment.length; i++) {
                        var apartmentData = apartment[i]
                        var lat2 = apartment[i].latitudine
                        var lon2 = apartment[i].longitudine    
                        var lat1 = e.suggestion.latlng.lat
                        var lon1 = e.suggestion.latlng.lng
                        distance(lat1,lon1,lat2,lon2,apartmentData, distanza);
                };
                
    
                if ($('.img-evidence').is(':empty')){
                    $('.img-evidence').append('<h4 class="no-results non-visible">Nessun appartamento trovato..prova ad aumentare la distanza o a cambiare città! :)</h4>');
                    $('.no-results').removeClass('non-visible');
                };
            },
        });
    }
    
    function distance(lat1, lon1, lat2, lon2, apartmentData, distanza) {

        var distanza_reale = distanza * 100;
        if ((lat1 == lat2) && (lon1 == lon2)) {
            disegno_card(apartmentData.titolo_appartamento, apartmentData.immagine_appartamento, apartmentData.services, apartmentData.id)
            // return 0;
        }
        else {
            var radlat1 = Math.PI * lat1/180;
            var radlat2 = Math.PI * lat2/180;
            var theta = lon1-lon2;
            var radtheta = Math.PI * theta/180;
            var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            if (dist >= 0) {
                dist = 1;
            }
            dist = Math.acos(dist);
            dist = dist * 180/Math.PI;
            dist = dist * 60 * 1.1515;
            dist = dist * 1.609344
            if (dist < distanza_reale) {
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

    function filtroservizi(){
        var selezionati = [];

        $('.check-input:checked').each(function(){
            var nome = $(this).val();
            selezionati.push(nome);
        });

        // console.log(selezionati);

        return selezionati;
    };
    
});