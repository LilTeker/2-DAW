$(document).ready(function () {
    $("p:first").next().css("font-weight", "bold");

    $("[href]").css("border", "1px solid black");

    $("ul li ul li:nth-child(2)").css("color", "red");

    $(":empty").text("Nodo Vacío");    
});


/*
1. Selecciona todos los módulos de primero (Ponlos en negrita)
2. Selecciona los módulos que tengan el atributo href (Ponles un borde)
3. Selecciona todas las horas de los módulos de segundo (Cambia el color)
4. Selecciona los ítems vacíos y añade el contenido 'Nodo vacío
*/