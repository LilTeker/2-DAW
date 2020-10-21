
let fechaHora = new Date();
let finalCurso = new Date('2021/06/24');

let diff = Math.abs(fechaHora - finalCurso);

let days = (diff / (60*60*24*1000));

document.getElementById("reloj").innerHTML = "Quedan " + Math.round(days) + " días para el final del curso";