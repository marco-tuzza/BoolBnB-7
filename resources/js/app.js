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

    var latitudine;
    var longitudine;

    (function() {
        
        var placesAutocomplete = places({
            appId: 'plT92Q60ZYBJ',
            apiKey: 'b2d1f81e1e0aa1ead87da414255dda36',
            container: document.querySelector('#address'),
            templates: {
                value: function(suggestion) {
                    return suggestion.name, suggestion.latlng.lat, suggestion.latlng.lng;
                }
            }
        }).configure({
            language: 'it', // Ricevo risultati in italiano
            countries: ['it'], // Ricevo risultati per l'Italia
            type: ['city', 'address'], // Cerco per città e indirizzo
            // aroundRadius: 2,
        });

        placesAutocomplete.on('change', function resultSelected(e) {
            latitudine = (e.suggestion.latlng.lat);
            longitudine = (e.suggestion.latlng.lng);
            console.log(latitudine, longitudine);
        });
        
    })();

    
});