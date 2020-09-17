require('./bootstrap');

const $ = require('jquery');

$(function() {

    var leggo_valore = $('#id-apartment').val();
    console.log(leggo_valore);

    $.ajax({
    
        "url" : "http://localhost:8000/api/statistiche/search/" + leggo_valore,

        "method" : "GET",

        "success" : function(answer) {


            var stat = answer.data;

            console.log(stat);
        
            // for (var i = 0; i < apartment.length; i++) {
            //         var apartmentData = apartment[i]
            //         var lat2 = apartment[i].latitudine
            //         var lon2 = apartment[i].longitudine    
            //         var lat1 = e.suggestion.latlng.lat
            //         var lon1 = e.suggestion.latlng.lng
            //         distance(lat1,lon1,lat2,lon2,apartmentData, distanza);
            // };
        },
    });

    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var chart1 = new Chart(ctx1, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });

    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var chart2 = new Chart(ctx2, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {}
    });

    var ctx1a = document.getElementById('myChart1a').getContext('2d');
    var myBarChart1 = new Chart(ctx1a, {
        type: 'bar',
        data: {
            datasets: [{
                barPercentage: 0.5,
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                data: [10, 20, 30, 40, 50, 60, 70]
            }]
        },
    });

    var ctx2a = document.getElementById('myChart2a').getContext('2d');
    var myBarChart2 = new Chart(ctx2a, {
        type: 'bar',
        data: {
            datasets: [{
                barPercentage: 0.5,
                barThickness: 6,
                maxBarThickness: 8,
                minBarLength: 2,
                data: [10, 20, 30, 40, 50, 60, 70]
            }]
        },
    });

});