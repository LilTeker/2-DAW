let arrSquares = []; //Array donde guardar cada objeto "cuadrado" del tablero
let selector = "red"; //Variable que controla el color con el que se cambia cada cuadrado al hacer click


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



function color(e) {
    let square = e.target.getAttribute("name");

    arrSquares[square].setColor(selector);

    clearSquares();
    printSquares();
    listenersDiv();    
}

function chess() {
    arrSquares[0].setColor("red");
    arrSquares[2].setColor("red");
    arrSquares[5].setColor("red");
    arrSquares[7].setColor("red");
    arrSquares[8].setColor("red");
    arrSquares[10].setColor("red");
    arrSquares[13].setColor("red");
    arrSquares[15].setColor("red");

    arrSquares[1].setColor("white");
    arrSquares[3].setColor("white");
    arrSquares[4].setColor("white");
    arrSquares[6].setColor("white");
    arrSquares[9].setColor("white");
    arrSquares[11].setColor("white");
    arrSquares[12].setColor("white");
    arrSquares[14].setColor("white");

    clearSquares();
    printSquares();
    listenersDiv();

}

function sum(color) {
    let counter = 0;

    arrSquares.forEach(element => {
        if (element.getColor() == color) {
            counter += element.getNumber();
        }
    });

    document.getElementById("data").innerHTML = `<p>La suma de los cuadrados es ${counter}`;
}



function redSelector() {
    selector = "red";
}
function whiteSelector() {
    selector = "white";
}

function limpiar() {
    
    arrSquares.forEach(element => {
        element.setColor("white");
    });

    clearSquares();
    printSquares();
    listenersDiv();

}


function initBoard() {
    initSquares();
    printSquares();
}

function listenersDiv() { //Creo una funcion para esto para actualizar los listeners cada vez que se actualiza el tablero
    let divs = document.getElementsByClassName("square");

    Array.from(divs).forEach(function (element) {
        element.addEventListener("click", e => {
            color(e);
        });
    });
}

document.addEventListener("DOMContentLoaded", () => {

    initBoard();

    document.addEventListener("click", evento => {
        if (evento.target.matches("#limpiar")) limpiar();
        else if (evento.target.matches("#rojo")) redSelector();
        else if (evento.target.matches("#blanco")) whiteSelector();
        else if (evento.target.matches("#ajedrez")) chess();
        else if (evento.target.matches("#sumRojas")) sum("red");
        else if (evento.target.matches("#sumBlancas")) sum("white");
    });

    listenersDiv();

});