// MODELO
var peliculas = ["Superlópez", "E.T.", "Interstellar"];

// VISTAS
function indexView(pelis) {
    var i = 0, html = "<ul>";
    while (i < pelis.length) {
        html = html + `<li> ${pelis[i]}<button id="delete" data-my-id="${i}">Borrar</button><button id="edit" data-my-id="${i}">Editar</button></li>`;
        i = i + 1;
    };
    return html + `</ul> <button id="new">Crear</button>`;
};

function newView() {
    return `Introducir nueva pelicula: <input type="text" id="peli"> <button id="create">Añadir</button>`
};

function editView(index) {
  return `<p>Pelicula número: <strong id="indexPeli">${index}</strong> </p>Escriba el nuevo nombre para la pelicula: ${peliculas[index]} <input type="text" id="nuevoTitulo"><button id="editTitle">Editar</button>`;
}

// CONTROLADORES
function indexContr() { document.getElementById("main").innerHTML = indexView(peliculas); };
function newContr() { document.getElementById("main").innerHTML = newView(); };
function editContr(index) { document.getElementById("main").innerHTML = editView(index); };

function createContr() {
    peliculas.push(document.getElementById("peli").value);
    indexContr();
};
function deleteContr(i) {
    peliculas.splice(i, 1);
    indexContr();
};
function editTitleContr() {
    let indexPeliculas = document.getElementById("indexPeli").innerHTML;
    peliculas[indexPeliculas] = document.getElementById("nuevoTitulo").value;
    indexContr();
}

// EVENTOS
document.addEventListener('DOMContentLoaded', ev => indexContr());
document.addEventListener('click', ev => {
    if (ev.target.matches('#new')) newContr();
    else if (ev.target.matches('#create')) createContr();
    else if (ev.target.matches('#delete')) deleteContr(ev.target.dataset.myId);
    else if (ev.target.matches('#edit')) editContr(ev.target.dataset.myId);
    else if (ev.target.matches('#editTitle')) editTitleContr(ev.target.dataset.myId);
})
