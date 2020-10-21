
let fechaActual = new Date(); 
let cumpleaños = prompt("Escribe tu fecha de nacimiento con el formato año/mes/dia");
let fechaCumple = new Date(cumpleaños); //Creo la fecha con el cumpleaños completo de la persona

document.getElementById("reloj").innerHTML = "Cumpleaños " + fechaCumple.toDateString(); //Escribo la fecha de cumpleaños en el html

fechaCumple.setFullYear(fechaActual.getFullYear()); //Le pongo la el año actual a su cumpleaños


let anoInicial = fechaCumple.getFullYear(); //Guardo el año inicial para darle el valor a i en el bucle

let years = ""; //variable para guardar el string de años

for (let i = anoInicial; i <= 2100; i++) {
    fechaCumple.setFullYear(i);
    if (fechaCumple.getDay() == 0) {
        years = years + fechaCumple.getFullYear() + ",";    //concateno los años que caigan en domingo(0)
    }
}

alert (years);