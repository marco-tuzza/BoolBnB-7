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
          document.querySelector('#form-address2').value = e.suggestion.administrative || '';
          document.querySelector('#form-city').value = e.suggestion.city || '';
          document.querySelector('#form-zip').value = e.suggestion.postcode || '';
          $('#latitudine').val(e.suggestion.latlng.lat);
          $('#longitudine').val(e.suggestion.latlng.lng);
        });
    })();
});



