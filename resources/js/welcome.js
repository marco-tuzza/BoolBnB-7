/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const $ = require('jquery');
const Handlebars = require("handlebars");
const template = Handlebars.compile("Name: {{name}}");
console.log(template({ name: "Nils" }));

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

    var placesAutocomplete = places({
        appId: 'plT92Q60ZYBJ',
        apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
        container: document.querySelector('#address-input')
        }).configure({
            language: 'it', // Ricevo risultati in italiano
            countries: ['it'], // Ricevo risultati per l'Italia
            type: ['city', 'address'], // Cerco per città e indirizzo
        });
    
    placesAutocomplete.on('change', function prova (e)  {

        $('.risultati').empty()
    
        var lat = e.suggestion.latlng.lat
        var lon = e.suggestion.latlng.lng
    
        $.ajax({
    
            "url" : "http://localhost:8000/api/apartment/search/" + Math.round(lat) + '/' + Math.round(lon),
    
            "method" : "GET",
    
            "success" : function(answer) {
    
                var apartment = answer.data;
    
                $('.risultati').append(apartment)
    
                console.log(apartment);
            
                for (var i = 0; i < apartment.length; i++) {
                        var apartmentData = apartment[i]
                        var lat2 = apartment[i].latitudine
                        var lon2 = apartment[i].longitudine    
                        var lat1 = e.suggestion.latlng.lat
                        var lon1 = e.suggestion.latlng.lng
                        distance(lat1,lon1,lat2,lon2, apartmentData)        
                };
    
                if ($('.risultati').is(':empty')){
                    $('.risultati').append('nessun risultato trovato')
                };
    
            },
        });
    });
    
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
            if (dist < 100) {
                $('.risultati').append(apartmentData.id + apartmentData.titolo_appartamento + parseInt(dist) + 'km'+ '<br>');
            } else {
                console.log('troppo lontano');
            }
        }
    }
});



