
var template_html = $('#templatecard_dashboard').html();
var template_function = Handlebars.compile(template_html);

var numero_casuale = Math.floor(Math.random() * 5) + 1;
console.log(numero_casuale);

// for (var i = 0; i < 5; i++) {
//     var card = {
//         'primoparametro' : 'Appartamento',
//         'secondoparametro' : 'Descrizione appartamento',
//         'terzoparametro' : 'Dettagli',
//     }
//     var card_finale = template_function(card);
//     $('.img-apartment').append(card_finale);
// }

// const tl = gsap.timeline({ defaults: { ease: "power1.out" } });

$(document).ready(function(){



});