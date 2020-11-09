//MODELO

let disco = [{disco: "nombreDisco", cantante: "cantante", año: "1990", tipoMusica: "tipoMusica", localizacion: "localizacion", prestado: "true"}];



//CONTROLADOR

function indexContr() { document.getElementById("main").innerHTML = indexView(disco); };
function newDiscCont() { 
    document.getElementById("main").innerHTML = newDiscView(); 
    focusListener();
}

function guardar() {
    let nombreDisco = document.getElementById("disco").value;
    let cantante = document.getElementById("cantante").value;
    let año = document.getElementById("año").value;
    let tipoMusica = document.getElementById("tipoMusica").value;
    let localizacion = document.getElementById("localizacion").value;
    let prestado = document.getElementById("prestado").value;

    validar(nombreDisco, cantante, año, tipoMusica, localización, prestado);

    disco.push({disco: nombreDisco, cantante: cantante, año: año, tipoMusica: tipoMusica, localizacion: localizacion, prestado: prestado});
}

function validar(nombreDisco, cantante, año, tipoMusica, localización, prestado) {

    //COMPLETAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR

}

function vaciar(idElement) {                                        //Vaciar
    document.getElementById(idElement).value = "";
}

function showContr(i) { document.getElementById("main").innerHTML = showDetails(disco[i]);};

//VISTA

function indexView(discos) {
    var i = 0, html = "<ul>";
    while (i < discos.length) {
        html = html + `<li id="show" data-my-id="${i}"> ${discos[i].disco}<button id="delete" data-my-id="${i}">Borrar</button></li>`;
        i = i + 1;
    };
    return html + `</ul> <button id="new">Crear</button>`;
};

function mostrar() {
    indexContr();
}

function newDiscView() {
    return `
    <form id="nuevoDiscoForm">
    <label for="disco">Nombre del Disco</label><input type="text" name="disco" id="disco"><br><br>
    <label for="cantante">Grupo de Música o Cantante</label><input type="text" name="cantante" id="cantante"><br><br>
    <label for="año">Año de publicación</label><input type="number" name="año" id="año"><br><br>
    <label for="tipoMusica">Tipo de Música</label><input type="text" name="tipoMusica" id="tipoMusica"><br><br>
    <label for="localizacion">Numero de estantería</label><input type="text" name="localizacion" id="localizacion"><br><br>
    <label for="prestado">Prestado</label>
    <select name="prestado" id="prestado">
        <option value="false">No</option>
        <option value="true">Si</option>
    </select><br><br>
    </form>
    <button id="guardar">Guardar</button>
    <button id="mostrar">Mostrar</button>
    <div id="validacion"></div>`
}

function showDetails (i) {
    return `
    Titulo del disco ${disco[i].disco},
    Cantante del disco ${disco[i].cantante},
    Año del disco ${disco[i].año},
    Tipo de música del disco ${disco[i].tipoMusica},
    Localización del disco ${disco[i].localizacion},
    Prestado: ${disco[i].prestado},
    <p><button id="index"> Volver </button></p>
    `
}


//EVENTO
document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {
    if (evento.target.matches("#disco")) vaciar("disco");
    else if (evento.target.matches("#cantante")) vaciar("cantante");
    else if (evento.target.matches("#año")) vaciar("año");
    else if (evento.target.matches("#tipoMusica")) vaciar("tipoMusica");
    else if (evento.target.matches("#localizacion")) vaciar("localizacion");
    else if (evento.target.matches("#guardar")) guardar();
    else if (evento.target.matches("#mostrar")) mostrar();
    else if (evento.target.matches('#new')) newDiscCont();
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();
});



document.addEventListener('DOMContentLoaded', evento => indexContr());
document.addEventListener("click", evento => {

    if (evento.target.matches("#disco")) vaciar("disco");
    else if (evento.target.matches("#cantante")) vaciar("cantante");
    else if (evento.target.matches("#año")) vaciar("año");
    else if (evento.target.matches("#tipoMusica")) vaciar("tipoMusica");
    else if (evento.target.matches("#localizacion")) vaciar("localizacion");
    else if (evento.target.matches("#guardar")) guardar();
    else if (evento.target.matches("#mostrar")) mostrar();
    else if (evento.target.matches('#new')) newDiscCont();
    else if (evento.target.matches('#show'))  showContr(evento.target.dataset.myId);
    else if (evento.target.matches('#index')) indexContr();

});
