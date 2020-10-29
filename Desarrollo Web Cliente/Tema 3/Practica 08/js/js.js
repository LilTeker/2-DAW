var peliculas = ["Superlópez", "E.T.", "Interstellar", "Harry Potter y la Piedra Filosofal", "Quien a Hierro Mata"];

function indexView(pelis) {
    var i = 0, html = "<ul>";
    while(i < pelis.length) {
        html = html + `<li> ${pelis[i]}</li>`;
        i = i + 1;
    };
    return html + "</ul>"
}

function indexContr() {
    document.getElementById("main").innerHTML = indexView(peliculas);
}

document.addEventListener("DOMContentLoaded", ev => indexContr());