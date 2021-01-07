let arrSquares = [];

function getNumbers(arr) {

    let number = Math.floor(Math.random() * arr.length);

    let value = arr[number];

    arr.splice(number, 1);

    return value;
}

function initSquares() {
    let numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];

    for (let index = 0; index < 16; index++) {

        let newSquare = new square(index, getNumbers(numbers));
        arrSquares.push(newSquare);
    }
}

function printSquares() {
    let tableSquares = document.getElementsByTagName("td");

    for (let index = 0; index < arrSquares.length; index++) {

        arrSquares[index].display(tableSquares[index]);

    }

}

function clearSquares() {
    let tableSquares = document.getElementsByTagName("td");

    for (let index = 0; index < tableSquares.length; index++) {
        while (tableSquares[index].firstChild) {
            tableSquares[index].removeChild(tableSquares[index].lastChild);
        }
    }
}

function initBoard() {
    initSquares();
    printSquares();
}

function limpiar() {
    
    arrSquares.forEach(element => {
        element.setColor("white");
    });

    clearSquares();
    printSquares();

}


document.addEventListener("DOMContentLoaded", () => {

    initBoard();

    document.addEventListener("click", evento => {
        if (evento.target.matches("#limpiar")) limpiar();
        else if (evento.target.matches("#passInput")) passInput();
    });

    let divs = document.getElementsByClassName("square");

    Array.from(divs).forEach(function (element) {
        element.addEventListener("click", e => {
            alert(e.target.getAttribute("name"));
        });
    });
});



/*
    let input = prompt("Escriba el nombre del input al que va referido");

    let newLabel = document.createElement("label");
    newLabel.setAttribute("for", input);
    newLabel.innerText = input;

    //Busco el input y añado el label encima de el
    let targetInput = document.querySelector(`input[name=${input}]`);

    targetInput.parentNode.insertBefore(newLabel, targetInput);






function funPrueba(e) {

    let element = e.target;

    console.log(element.getAttribute("name"));
}

*/