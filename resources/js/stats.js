require('./bootstrap');

const $ = require('jquery');

$(function() {

    var leggo_valore = $('#id-apartment').val();
    console.log(leggo_valore);

    $.ajax({

        "url" : "http://localhost:8000/api/statistiche/search/" + leggo_valore,

        "method" : "GET",

        "success" : function(answer) {

            statistichemensili(answer);
            statistichemessaggi(answer);
        },
        'error': function() {
                console.log('errore');
        }
    });

    function statistichemensili(answer) {
        var stat = answer.data;
        var statistiche = stat.statistiche;
        var month_data = Object.values(statistiche);
        console.log(stat);

        var dates;

        var visualizzazioni_mensili = {
            'January': 20,
            'February': 11,
            'March': 9,
            'April': 17,
            'May': 23,
            'June': 35,
            'July': 16,
            'August': 46,
            'September': 0,
            'October': 0,
            'November': 0,
            'December': 0,
        };

        for (var i = 0; i < month_data.length; i++) {
            var dates = month_data[i];
            console.log(dates.data_visualizzazione);
            var mese = moment(dates.data_visualizzazione, "DD-MM-YYYY");
            console.log(mese);
            var count = 1;
            var mese_giusto = mese.format('MMMM');
            if(!visualizzazioni_mensili.hasOwnProperty(mese.format('MMMM'))) {
                visualizzazioni_mensili[mese.format('MMMM')] = parseInt(count);
            } else {
                visualizzazioni_mensili[mese.format('MMMM')] += parseInt(count);
            }
        }

        console.log(visualizzazioni_mensili);

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

        var ctx = $('#myChart1a')[0].getContext('2d')
        var myChart = new Chart(ctx, {
            type: 'bar',
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

    function statistichemessaggi(answer) {
        var stat = answer.data;
        console.log('statistiche');

        var messaggi_mensili = {
            'January': 23,
            'February': 19,
            'March': 9,
            'April': 13,
            'May': 17,
            'June': 9,
            'July': 11,
            'August': 6,
            'September': 0,
            'October': 0,
            'November': 0,
            'December': 0,
        };

        for (var i = 0; i < stat.messaggi.length; i++) {
            var messaggi = stat.messaggi[i];
            console.log(messaggi);
            var data_messaggio = messaggi.data_invio;
            var mese = moment(data_messaggio, "YYYY-MM-DD");
            console.log(mese);
            var count = 1;
            var mese_giusto = mese.format('MMMM');
            if(!messaggi_mensili.hasOwnProperty(mese.format('MMMM'))) {
                messaggi_mensili[mese.format('MMMM')] = parseInt(count);
            } else {
                messaggi_mensili[mese.format('MMMM')] += parseInt(count);
            }
        }

        console.log(messaggi_mensili);

        var chiavi = Object.keys(messaggi_mensili);
        var valori = Object.values(messaggi_mensili);

        var ctx = $('#myChart2')[0].getContext('2d')
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chiavi,
                datasets: [{
                    label: 'Messaggi Mensili',
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

        var ctx = $('#myChart2a')[0].getContext('2d')
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chiavi,
                datasets: [{
                    label: 'Messaggi Mensili',
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
