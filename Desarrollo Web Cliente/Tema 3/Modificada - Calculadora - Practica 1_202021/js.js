digito1 = 0;
operador = "+";         //variables usadas en la suma y multiplicacion
digito2 = 0;
checker = false;        //Check usado para comprobar si antes de darle a eq() hemos usado la suma o la multiplicacion


function rellenar_info(result) {                                //Rellenar info

    if (result < 100) {
        document.getElementById("info").innerHTML = "El resultado es menor que 100";
    } else if (result >= 100 && result <= 200) {
        document.getElementById("info").innerHTML = "El resultado está entre 100 y 200";
    } else {
        document.getElementById("info").innerHTML = "El resultado es superior a 200";
    }
}


const vaciar = () => {                                        //Vaciar
    document.getElementById("pantalla").value = "";
}

const cuadrado = () => {

    if (validar()) {          //Cuadrado
        let num = document.getElementById("pantalla");
        num.value = num.value * num.value;
        rellenar_info(num.value);
    }

}

const mod = () => {

    if (validar()) {                                       //Modulo
        let num = document.getElementById("pantalla");

        num.value = Math.abs(num.value);;
        rellenar_info(num.value);
    }

}

const fact = () => {

    if (validar()) {                                    //Factorial
        let num = document.getElementById("pantalla");
        let total = 1;

        for (i = 1; i <= num.value; i++) {
            total = total * i;
        }

        num.value = total;
        rellenar_info(total);
    }

}

const add = () => {                                             //Suma

    if (validar()) {
        digito1 = parseInt(document.getElementById("pantalla").value);
        operador = "+";
        checker = true;
        vaciar();
    }

}

const mul = () => {                                             //Multiplicación

    if (validar()) {
        digito1 = parseInt(document.getElementById("pantalla").value);
        operador = "*";
        checker = true;
        vaciar();
    }

}

const eq = () => {                                             //Igual

    if (validar()) {
        digito2 = parseInt(document.getElementById("pantalla").value);


        let total = 0;

        if (checker) {
            if (operador == "+") {
                total = digito1 + digito2;
                document.getElementById("pantalla").value = total;
                rellenar_info(total);
            } else if (operador == "*") {
                total = digito1 * digito2;
                document.getElementById("pantalla").value = total;
                rellenar_info(total);
            }
        }

        checker = false;
    }

}

const sumatorio = () => {                                             //Sumatorio

    if (validar()) {
        let input = document.getElementById("pantalla").value;
        let numArray = input.split(',');
        let total = 0;

        for (i = 0; i < numArray.length; i++) {
            total += parseInt(numArray[i]);
        }

        document.getElementById("pantalla").value = total;
        rellenar_info(total);
    }

}

const ordenar = () => {                                             //Ordenar

    if (validar()) {
        let input = document.getElementById("pantalla").value;
        let numArray = input.split(',');

        document.getElementById("pantalla").value = numArray.sort((a, b) => a - b);
    }
}

const revertir = () => {                                             //Revertir

    if (validar()) {
        let input = document.getElementById("pantalla").value;
        let numArray = input.split(',');

        document.getElementById("pantalla").value = numArray.reverse();
    }
}

const quitar = () => {                                             //Quitar

    if (validar()) {
        let input = document.getElementById("pantalla").value;
        let numArray = input.split(',');
        numArray.pop();

        document.getElementById("pantalla").value = numArray;
    }
}

const validar = () => {                                             //Validación - sin terminar, mirar https://stackoverflow.com/questions/5917082/regular-expression-to-match-numbers-with-or-without-commas-and-decimals-in-text

    let input = document.getElementById("pantalla").value;

    if (input.match("[,.|0-9]+")) {

        return true;

    } else {

        document.getElementById("pantalla").value = "error";
        return false;

    }
}

document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM fully loaded and parsed");

    document.addEventListener("click", evento => {
        if (evento.target.matches("#pantalla")) vaciar();
        else if (evento.target.matches("#cuadrado")) cuadrado();
        else if (evento.target.matches("#modulo")) mod();
        else if (evento.target.matches("#factorial")) fact();
        else if (evento.target.matches("#suma")) add();
        else if (evento.target.matches("#multiplicacion")) mul();
        else if (evento.target.matches("#igual")) eq();
        else if (evento.target.matches("#sumatorio")) sumatorio();
        else if (evento.target.matches("#ordenar")) ordenar();
        else if (evento.target.matches("#revertir")) revertir();
        else if (evento.target.matches("#quitar")) quitar();
    });
});