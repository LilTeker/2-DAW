let br = document.createElement("br");


function textInput() {
    let input = prompt("Escriba el nombre del input tipo texto");

    let newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    newInput.setAttribute("name", input);
    document.getElementById("form").appendChild(newInput);

    document.getElementById("form").appendChild(br.cloneNode(true));
}

function passInput() {
    let input = prompt("Escriba el nombre del input tipo password");

    let newInput = document.createElement("input");
    newInput.setAttribute("type", "password");
    newInput.setAttribute("name", input);
    document.getElementById("form").appendChild(newInput);
    document.getElementById("form").appendChild(br.cloneNode(true));
}

function textArea() {
    let input = prompt("Escriba el nombre del textarea");

    let newTextArea = document.createElement("textarea");
    newTextArea.setAttribute("rows", 5);
    newTextArea.setAttribute("cols", 40);
    newTextArea.setAttribute("name", input);
    document.getElementById("form").appendChild(newTextArea);
    document.getElementById("form").appendChild(br.cloneNode(true));
}

function label() {
    let input = prompt("Escriba el nombre del input al que va referido");

    let newLabel = document.createElement("label");
    newLabel.setAttribute("for", input);
    newLabel.innerText = input;

    //Busco el input y añado el label encima de el
    let targetInput = document.querySelector(`input[name=${input}]`);

    targetInput.parentNode.insertBefore(newLabel, targetInput);
}

function img() {
    let input = prompt("Escriba el la ruta de la imagen (src)");

    let newImg = document.createElement("img");
    newImg.setAttribute("src", input);
    document.getElementById("form").appendChild(newImg);
    document.getElementById("form").appendChild(br.cloneNode(true));
}

function checkbox() {
    let checkboxName = prompt("Escriba el nombre del checkbox");
    let checkboxValue = prompt("Escriba el valor del checkbox");

    let newCheckbox = document.createElement("input");
    newCheckbox.setAttribute("type", "checkbox");
    newCheckbox.setAttribute("name", checkboxName);
    newCheckbox.setAttribute("value", checkboxValue);
    document.getElementById("form").appendChild(newCheckbox);
    document.getElementById("form").appendChild(br.cloneNode(true));
}

function radio() {
    let radioName = prompt("Escriba el nombre del radio");
    let radioValue = prompt("Escriba el valor del radio");

    let newRadio = document.createElement("input");
    newRadio.setAttribute("type", "radio");
    newRadio.setAttribute("name", radioName);
    newRadio.setAttribute("value", radioValue);
    document.getElementById("form").appendChild(newRadio);
    document.getElementById("form").appendChild(br.cloneNode(true));
}

function insertSubmit() {
    let submitName = prompt("Escriba el nombre del submit");
    let submitValue = prompt("Escriba el valor del submit");

    let newSubmit = document.createElement("input");
    newSubmit.setAttribute("type", "submit");
    newSubmit.setAttribute("name", submitName);
    newSubmit.setAttribute("value", submitValue);
    document.getElementById("form").appendChild(newSubmit);
    document.getElementById("form").appendChild(br.cloneNode(true));
}


document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    document.addEventListener("click", evento => {
        if (evento.target.matches("#textInput")) textInput();
        else if (evento.target.matches("#passInput")) passInput();
        else if (evento.target.matches("#textarea")) textArea();
        else if (evento.target.matches("#label")) label();
        else if (evento.target.matches("#img")) img();
        else if (evento.target.matches("#checkbox")) checkbox();
        else if (evento.target.matches("#radio")) radio();
        else if (evento.target.matches("#insertSubmit")) insertSubmit();
    });
});



/*
<th><button type="button" id="textInput">Crear Input Text</button></th>
<th><button type="button" id="passInput">Crear Input Password</button></th>
<th><button type="button" id="textarea">Crear Textarea</button></th>
<th><button type="button" id="label">Crear label</button></th>
<th><button type="button" id="img">Insertar Imagen</button></th>
<th><button type="button" id="checkbox">Crear checkbox</button></th>
<th><button type="button" id="radio">Crear radio button</button></th>
<th><button type="button" id="insertSubmit">Crear Submit</button></th>

    Crear un input de tipo texto. Le preguntará al usuario mediante un prompt qué nombre (atributo name) tiene el input.
    Crear un input de tipo password. Le preguntará al usuario mediante un prompt qué nombre (atributo name) tiene el input.
    Crear un textarea. Le preguntará al usuario el nombre y generará automáticamente un textarea de 40 columnas y 5 filas.
    Crear un label. Preguntará al usuario a qué input va referido (atributo for).
    Crear una imagen. Preguntará al usuario qué ruta tiene la imagen (atributo src).
    Crear un checkbox. Preguntará al usuario el nombre y el valor (atributos name y value).
    Crear un radio. Preguntará al usuario el nombre y el valor (atributos name y value).
    Crear un botón (submit). Preguntará al usuario el nombre y el valor (atributos name y value).
*/


//https://attacomsian.com/blog/javascript-insert-element-before