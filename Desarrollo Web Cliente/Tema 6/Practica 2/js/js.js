
function añadir() {

    let input = prompt("Escriba el texto para el siguiente li:");
    

    let newLi = document.createElement("li");
    let contentLi = document.createTextNode(input);
    newLi.appendChild(contentLi);

    let ul = document.getElementsByTagName("ul");
    ul[0].appendChild(newLi);

}

function borrarPrimer() {
    let li = document.getElementsByTagName("li");
    li[0].parentNode.removeChild(li[0]);
}

function borrarUltimo() {
    let li = document.getElementsByTagName("li");
    li[0].parentNode.removeChild(li[li.length - 1]);
}


document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");
    document.addEventListener("click", evento => {
        if (evento.target.matches("#añadir")) añadir();
        else if (evento.target.matches("#borrarPrimer")) borrarPrimer();
        else if (evento.target.matches("#borrarUltimo")) borrarUltimo();
              
    });
});

/*Crea una página web que tenga un listado de tipo <ul> con un <li> de muestra.
Introduce un botón en la página que, cuando lo pulses, te muestre un prompt para que el usuario introduzca un texto.
Una vez cerrado el prompt el valor se añadirá como un nuevo <li> a la lista creada.

Añade dos botones más con texto “Borrar primer li” y “Borrar último li” de modo que cuando pulses el primer botón borre el 
primer elemento de la lista y cuando pulses el último borre el último elemento de la lista.*/