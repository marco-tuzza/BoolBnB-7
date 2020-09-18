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
            var statistiche = stat.statistiche;
            var month_data = Object.values(statistiche);
            console.log(stat);

            var dates;

            console.log(stat.count_statistiche);
            console.log(statistiche);
            console.log(month_data);

            for (var i = 0; i < month_data.length; i++) {
                var dates = month_data[i];
                console.log(dates.created_at);
                var mese = moment(dates, "YYYY-MM-DD");
                console.log(mese);
            }

            var visualizzazioni_mensili = {
                'January': 0,
                'February': 0,
                'March': 0,
                'April': 0,
                'May': 0,
                'June': 0,
                'July': 0,
                'August': 0,
                'September': stat.count_statistiche,
                'October': 0,
                'November': 0,
                'December': 0,
            };

            var chiavi = Object.keys(visualizzazioni_mensili);
            var valori = Object.values(visualizzazioni_mensili);

            var ctx = $('#myChart1')[0].getContext('2d')
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chiavi,
                    datasets: [{
                        label: 'Visualizzazioni Mensili',
                        data: valori,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    });

    // var ctx1 = document.getElementById('myChart1').getContext('2d');
    // var chart1 = new Chart(ctx1, {
    //     // The type of chart we want to create
    //     type: 'line',
    //
    //     // The data for our dataset
    //     data: {
    //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //         datasets: [{
    //             label: 'My First dataset',
    //             backgroundColor: 'rgb(255, 99, 132)',
    //             borderColor: 'rgb(255, 99, 132)',
    //             data: [0, 10, 5, 2, 20, 30, 45]
    //         }]
    //     },
    //
    //     // Configuration options go here
    //     options: {}
    // });
    //
    // var ctx2 = document.getElementById('myChart2').getContext('2d');
    // var chart2 = new Chart(ctx2, {
    //     // The type of chart we want to create
    //     type: 'line',
    //
    //     // The data for our dataset
    //     data: {
    //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //         datasets: [{
    //             label: 'My First dataset',
    //             backgroundColor: 'rgb(255, 99, 132)',
    //             borderColor: 'rgb(255, 99, 132)',
    //             data: [0, 10, 5, 2, 20, 30, 45]
    //         }]
    //     },
    //
    //     // Configuration options go here
    //     options: {}
    // });
    //
    // var ctx1a = document.getElementById('myChart1a').getContext('2d');
    // var myBarChart1 = new Chart(ctx1a, {
    //     type: 'bar',
    //     data: {
    //         datasets: [{
    //             barPercentage: 0.5,
    //             barThickness: 6,
    //             maxBarThickness: 8,
    //             minBarLength: 2,
    //             data: [10, 20, 30, 40, 50, 60, 70]
    //         }]
    //     },
    // });
    //
    // var ctx2a = document.getElementById('myChart2a').getContext('2d');
    // var myBarChart2 = new Chart(ctx2a, {
    //     type: 'bar',
    //     data: {
    //         datasets: [{
    //             barPercentage: 0.5,
    //             barThickness: 6,
    //             maxBarThickness: 8,
    //             minBarLength: 2,
    //             data: [10, 20, 30, 40, 50, 60, 70]
    //         }]
    //     },
    // });

});
