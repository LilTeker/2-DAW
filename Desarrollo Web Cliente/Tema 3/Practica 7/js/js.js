var superl = {titulo: "Superlópez", director: "Javier Ruiz Caldera", estreno: "2018"};
var et = {titulo: "E.T.", director: "Steven Spielberg", estreno: "1982"};
var interst = {titulo: "Interstellar", director: "Christopher Nolan", estreno: "2014"};

function showView(peli) {
    return `La película <b>${peli.titulo}</b>, estrenada
    en el año <b> ${peli.estreno}</b>,
    fue dirigida por <b> ${peli.director}</b>!`;
}

function superlContr() {document.getElementById("p").innerHTML = showView(superl)};
function etContr() {document.getElementById("p").innerHTML = showView(et)};
function interstContr() {document.getElementById("p").innerHTML = showView(interst)};