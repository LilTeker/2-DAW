let date = new Date();


const fecha1 = () => {

    let horas = date.getHours();
    let minutos = date.getMinutes();
    let segundos = date.getSeconds();

    if(horas < 10) { horas = '0' + horas; }
    if(minutos < 10) { minutos = '0' + minutos; }
    if(segundos < 10) { segundos = '0' + segundos; }

    return horas + ':' + minutos + ':' + segundos;
}

const fecha2 = () => {
    let date = new Date();

    let horas = date.getHours();
    let minutos = date.getMinutes();
    let segundos = date.getSeconds();

    let sufijo = ' am';
    if(horas > 12) {
        horas = horas - 12;
        sufijo = ' pm';
    }

    if(horas < 10) { horas = '0' + horas; }
    if(minutos < 10) { minutos = '0' + minutos; }
    if(segundos < 10) { segundos = '0' + segundos; }

    return horas + ':' + minutos + ':' + segundos + sufijo;
}

let input = parseInt(prompt("Elije un número (1 o 2): "));

switch(input) {
    case 1:
        document.getElementById("reloj").innerHTML = fecha1();
        break;
    case 2:
        document.getElementById("reloj").innerHTML = fecha2();
        break;
}

