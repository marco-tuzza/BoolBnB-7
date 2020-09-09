
var template_html = $('#templatecard_dashboard').html();
var template_function = Handlebars.compile(template_html);

var numero_casuale = Math.floor(Math.random() * 5) + 1;
console.log(numero_casuale);

for (var i = 0; i < numero_casuale; i++) {
    var card = {
        'primoparametro' : 'Appartamento',
        'secondoparametro' : 'Descrizione dellappartamento per lhost',
        'terzoparametro' : 'Dettagli',
    }
    var card_finale = template_function(card);
    $('.card-container-dashboard').append(card_finale);
}
