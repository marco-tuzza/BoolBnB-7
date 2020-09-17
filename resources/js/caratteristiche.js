const $ = require('jquery');

var idlat = $('#id_latitudine').val();
var idlon = $('#id_longitudine').val();

var mymap = L.map('mapid').setView([idlat, idlon], 16);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1Ijoicm9oYWphczEwNCIsImEiOiJja2V5OGF1cGQwMnJxMnNvZ2t1YjRvcW4xIn0.B32yF5f2Ia7y9cmR97vZ_g'
}).addTo(mymap);
var marker = L.marker([idlat, idlon]).addTo(mymap);


$(document).ready(function(){

    $('#login').on('click', function(){
        $('.form-accedi').addClass('mostra-form');
        $('.wrapper-page').addClass('active');
    });

    $('#register').on('click', function(){
        $('.form-registrati').addClass('mostra-form');
        $('.wrapper-page').addClass('active');
    });

    $('.close').on('click', function(){
        $('.form-accedi').removeClass('mostra-form');
        $('.form-registrati').removeClass('mostra-form');
        $('.wrapper-page').removeClass('active');
    });

});