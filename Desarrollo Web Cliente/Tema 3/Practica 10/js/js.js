// MODELO
var peliculas = [
    {titulo: "Superlópez",   director: "Javier Ruiz Caldera", estreno: "2018"},
    {titulo: "E.T.",         director: "Steven Spielberg",    estreno: "1982"},
    {titulo: "Interstellar", director: "Christopher Nolan",   estreno: "2014"}
];

// VISTAS
function indexView (pelis) {
    var    i=0,   html = "<ul>";
    while(i < pelis.length) {
      html = html + `<li id="show" data-my-id="${i}"> ${pelis[i].titulo}<button id="delete" data-my-id="${i}">Borrar</button></li>`;
      i = i + 1;
    };
    return html + `</ul> <button id="new">Crear</button>`;
};

function showDetails (peli) {
    return `
    La película <b> ${peli.titulo}</b>, estrenada
    en el año <b> ${peli.estreno}</b>, fue
    dirigida por <b> ${peli.director}</b>.

    <p><button id="index"> Volver </button></p>`
}

function newView() {
    return `<p>Introducir nueva pelicula:</p>
    <p>Título: <input type="text" id="tituloPeli"></p>
    <p>Director: <input type="text" id="directorPeli"></p>
    <p>Año Estreno: <input type="text" id="estrenoPeli"></p>
    <button id="create">Añadir</button>`
};

// CONTROLADORES
function indexContr() { document.getElementById("main").innerHTML = indexView(peliculas);};
function showContr(i) { document.getElementById("main").innerHTML = showDetails(peliculas[i]);};
function deleteContr(i) {
    peliculas.splice(i, 1);
    indexContr();
};
function newContr() { document.getElementById("main").innerHTML = newView(); };

function createContr() {

    let titulo = document.getElementById("tituloPeli").value;
    let director = document.getElementById("directorPeli").value;
    let estreno = document.getElementById("estrenoPeli").value;

    peliculas.push({titulo: titulo, director: director,   estreno: estreno});
    
    indexContr();
};

// EVENTOS
document.addEventListener('DOMContentLoaded', ev => indexContr());
document.addEventListener('click', ev => {
    if      (ev.target.matches('#index')) indexContr();
    else if (ev.target.matches('#show'))  showContr(ev.target.dataset.myId);
    else if (ev.target.matches('#delete')) deleteContr(ev.target.dataset.myId);
    else if (ev.target.matches('#new')) newContr();
    else if (ev.target.matches('#create')) createContr();
})
