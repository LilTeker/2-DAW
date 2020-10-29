let date = new Date();


const fecha1 = () => {
    var dias = date.getDate();
    var mes = date.getMonth();
    if(dias < 10) { dias = '0' + dias; }
    if(mes < 10) { mes = '0' + mes; }
    return dias + '/' + mes + '/' + date.getFullYear();
}

const fecha2 = () => {
    let dia = date.getDay();

    switch (dia){
        case 0:
            dia = "Domingo";
            break;
        case 1:
            dia = "Lunes";
            break;
        case 2:
            dia = "Martes";
            break;
        case 3:
            dia = "Miércoles";
            break;
        case 4:
            dia = "Jueves";
            break;
        case 5:
            dia = "Viernes";
            break;
        case 6:
            dia = "Sábado";
            break;
    }

    let numDia = date.getDate();

    let mes = date.getMonth();

    switch (mes){
        case 0:
            mes = "Enero";
            break;
        case 1:
            mes = "Febrero";
            break;
        case 2:
            mes = "Marzo";
            break;
        case 3:
            mes = "Abril";
            break;
        case 4:
            mes = "Mayo";
            break;
        case 5:
            mes = "Junio";
            break;
        case 6:
            mes = "Julio";
            break;
        case 7:
            mes = "Agosto";
            break;
        case 8:
            mes = "Septiembre";
            break;
        case 9:
            mes = "Octubre";
            break;
        case 10:
            mes = "Noviembre";
            break;
        case 11:
            mes = "Diciembre";
            break;
    }

    return dia + ", " + numDia + " de " + mes + " de " + date.getFullYear();
}

const fecha3 = () => {

    let dia = date.getDay();

    switch (dia){
        case 0:
            dia = "Sunday";
            break;
        case 1:
            dia = "Monday";
            break;
        case 2:
            dia = "Tuesday";
            break;
        case 3:
            dia = "Wednesday";
            break;
        case 4:
            dia = "Thursday";
            break;
        case 5:
            dia = "Friday";
            break;
        case 6:
            dia = "Saturday";
            break;
    }

    let numDia = date.getDate();

    let mes = date.getMonth();

    switch (mes){
        case 0:
            mes = "January";
            break;
        case 1:
            mes = "February";
            break;
        case 2:
            mes = "March";
            break;
        case 3:
            mes = "April";
            break;
        case 4:
            mes = "May";
            break;
        case 5:
            mes = "June";
            break;
        case 6:
            mes = "July";
            break;
        case 7:
            mes = "August";
            break;
        case 8:
            mes = "September";
            break;
        case 9:
            mes = "October";
            break;
        case 10:
            mes = "November";
            break;
        case 11:
            mes = "December";
            break;
    }

    return dia + ", " + mes + " " + numDia + ", " + date.getFullYear();
}

let input = parseInt(prompt("Elije un número (1-3): "));

switch(input) {
    case 1:
        document.getElementById("reloj").innerHTML = fecha1();
        break;
    case 2:
        document.getElementById("reloj").innerHTML = fecha2();
        break;
    case 3:
        document.getElementById("reloj").innerHTML = fecha3();
        break;
}

