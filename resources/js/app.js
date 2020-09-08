/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

const $ = require('jquery');

// (function() {
//     var placesAutocomplete = places({
//       appId: 'plT92Q60ZYBJ',
//       apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
//       container: document.querySelector('#address'),
//       templates: {
//         value: function(suggestion) {
//           return suggestion.name;
//         }
//       }
//     }).configure({
//       type: 'address'
//     });
//     placesAutocomplete.on('change', function resultSelected(e) {
//       document.querySelector('#form-address2').value = e.suggestion.administrative || '';
//       document.querySelector('#form-city').value = e.suggestion.city || '';
//       document.querySelector('#form-zip').value = e.suggestion.postcode || '';
//       $('#latitudine').val(e.suggestion.latlng.lat);
//       $('#longitudine').val(e.suggestion.latlng.lng);
//     });
// })();

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
    
                // var placesAutocomplete = places({
                //     appId: 'plT92Q60ZYBJ',
                //     apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
                //     container: document.querySelector('#address-input')
                // }).configure({
                //     language: 'it', // Ricevo risultati in italiano
                //     countries: ['it'], // Ricevo risultati per l'Italia
                //     type: ['city', 'address'], // Cerco per città e indirizzo
                // });
            
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



