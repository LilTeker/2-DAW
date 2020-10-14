
/*
Miguel Robles Gámez
Ejercicio 1.8
*/


let paises = ['España', 'China', 'Argentina', 'Australia', 'Turquía'];

alert(paises.length);                          //Muestro cuantos elementos tiene el array

for (let i = 0; i < paises.length; i++) {
    alert(paises[i]);                           //Enseño el valor de cada elemento en el array
}

alert("Enseño los paises en orden inverso");

for (let i = paises.length - 1; i >= 0; i--) {
    alert(paises[i]);                           //Enseño el valor de cada elemento en el array en orden inverso
}

var copy = paises.slice();
var sorted = paises.sort();

alert("Enseño los paises en orden alfabético");         //Paises en orden alfabético

alert (sorted);

paises = copy.slice();                              //Vuelvo a dejar el array como estaba originalmente



paises.unshift("Japón");                        // Añado japon al principio

alert(paises);

paises.push("República Checa");                 //Añado República Checa al final del array

alert(paises);

alert(paises[0]);                               //Muestro el valor a borrar al principio del array

paises.splice(0, 1);                            //Borro el valor

alert(paises[paises.length - 1]);               //Muestro el valor a borrar al final del array

paises.splice(paises.length - 1, 1);            //Borro el valor



var posicionUsuario = prompt("Escriba un numero entre el 0 y el " + (paises.length - 1));                        //Input del usuario

alert(paises[posicionUsuario]);                 // Muestro el elemento seleccionado

var paisUsuario = prompt("Elija uno de estos paises: " + paises);                //Input del usuario

alert(paises.indexOf(paisUsuario));             // Muestro el index del elemento seleccionado



var intervalo1 = prompt("Escriba un numero entre el 0 y el " + (paises.length - 2));        //Pido el rango que necesito
var intervalo2 = prompt("Escriba un numero entre el 1 y el " + (paises.length - 1));

var valorMax = Math.max(intervalo1, intervalo2);
var valorMin = Math.min(intervalo1, intervalo2);

for (i = valorMin; i <= valorMax; i++) {
    alert(paises[i])
}
