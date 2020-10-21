let input = prompt("Elije un número (1-3): ");
let date = new Date();

switch(input) {
    case 1:
        document.getElementById("reloj").innerHTML = "caso 1";
        break;
    case 2:
        document.getElementById("reloj").innerHTML = "caso 2";
        break;
    case 3:
        document.getElementById("reloj").innerHTML = "caso 3";
        break;
}