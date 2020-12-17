
function crearForm() {

    let newForm = document.createElement("form");
    newForm.setAttribute("id", "nuevoDiscoForm");

    let labelDisco = document.createElement("label");
    labelDisco.setAttribute("for", "disco");
    labelDisco.innerText = "Nombre del disco";
    newForm.appendChild(labelDisco);

    let inputDisco = document.createElement("input");
    inputDisco.setAttribute("type", "text");
    inputDisco.setAttribute("name", "disco");
    inputDisco.setAttribute("id", "disco");
    newForm.appendChild(inputDisco);

    let br = document.createElement("br");
    newForm.appendChild(br);
    newForm.appendChild(br.cloneNode(true));

    let labelCantante =  document.createElement("label");
    labelCantante.setAttribute("for", "cantante");
    labelCantante.innerText = "Grupo de Música o Cantante";
    newForm.appendChild(labelCantante);
    
    let inputCantante = document.createElement("input");
    inputCantante.setAttribute("type", "text");
    inputCantante.setAttribute("name", "cantante");
    inputCantante.setAttribute("id", "cantante");
    newForm.appendChild(inputCantante);
    newForm.appendChild(br.cloneNode(true));
    newForm.appendChild(br.cloneNode(true));

    let labelAño =  document.createElement("label");
    labelAño.setAttribute("for", "año");
    labelAño.innerText = "Año de publicación";
    newForm.appendChild(labelAño);

    let inputAño = document.createElement("input");
    inputAño.setAttribute("type", "text");
    inputAño.setAttribute("name", "año");
    inputAño.setAttribute("id", "año");
    newForm.appendChild(inputAño);
    newForm.appendChild(br.cloneNode(true));
    newForm.appendChild(br.cloneNode(true));

    let labelTipoMusica =  document.createElement("label");
    labelTipoMusica.setAttribute("for", "tipoMusica");
    labelTipoMusica.innerText = "Tipo de Música";
    newForm.appendChild(labelTipoMusica);

    let inputMusica = document.createElement("input");
    inputMusica.setAttribute("type", "text");
    inputMusica.setAttribute("name", "tipoMusica");
    inputMusica.setAttribute("id", "tipoMusica");
    newForm.appendChild(inputMusica);
    newForm.appendChild(br.cloneNode(true));
    newForm.appendChild(br.cloneNode(true));

    let labelLocalizacion =  document.createElement("label");
    labelLocalizacion.setAttribute("for", "localizacion");
    labelLocalizacion.innerText = "Numero de estantería";
    newForm.appendChild(labelLocalizacion);

    let inputLocalizacion = document.createElement("input");
    inputLocalizacion.setAttribute("type", "text");
    inputLocalizacion.setAttribute("name", "localizacion");
    inputLocalizacion.setAttribute("id", "localizacion");
    newForm.appendChild(inputLocalizacion);
    newForm.appendChild(br.cloneNode(true));
    newForm.appendChild(br.cloneNode(true));

    let labelPrestado =  document.createElement("label");
    labelPrestado.setAttribute("for", "prestado");
    labelPrestado.innerText = "prestado";
    newForm.appendChild(labelPrestado);

    let selectPrestado = document.createElement("select");
    selectPrestado.setAttribute("name", "prestado");
    selectPrestado.setAttribute("id", "prestado");

    let optionPrestadoFalse = document.createElement("option");
    optionPrestadoFalse.setAttribute("value", "false");
    optionPrestadoFalse.innerText = "No";
    selectPrestado.appendChild(optionPrestadoFalse);

    let optionPrestadoTrue = document.createElement("option");
    optionPrestadoTrue.setAttribute("value", "True");
    optionPrestadoTrue.innerText = "Si";
    selectPrestado.appendChild(optionPrestadoTrue);
    newForm.appendChild(selectPrestado);  

    document.getElementById("divJS").appendChild(newForm);

    let buttonGuardar = document.createElement("button");
    buttonGuardar.setAttribute("id", "guardar");
    buttonGuardar.innerText = "Guardar";
    document.getElementById("divJS").appendChild(buttonGuardar);

    let buttonMostrar = document.createElement("button");
    buttonMostrar.setAttribute("id", "mostrar");
    buttonMostrar.innerText = "Mostrar";
    document.getElementById("divJS").appendChild(buttonMostrar);


/*
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
    <div id="validacion"></div>
*/
}


document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");

    crearForm();

});

