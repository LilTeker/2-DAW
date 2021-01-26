$(document).ready(function () {
    $("h2").css({"color": "blue"});
    $("#vacations h2").text("VélezMálaga");
    $("#vacations").css("background-color", "red");
    $(".america").css("font-size", "30px");
    $.each($(".details"), function () { 
        let value = $(this).text();
        valueClean = value.replace("$","");
        valueNew = (valueClean * 0.10) + valueClean;
        console.log(valueNew);
    });
    
    let values = $(".details").text().slice();
    console.log(values);
});


/*
1. Selecciona todos los elementos de tipo h2. (Cambia el color)
2. Modifica todos los títulos de las vacaciones (h2), su nuevo valor será "VélezMálaga".
3. Selecciona la lista de vacaciones cuyo id es #vacations. (Cambia el color de fondo)
4. Selecciona aquellos ítems que tenga la clase .america (Cambia el tamaño de letra)
5. Modifica el precio del vuelo para que ahora sea un 10% más que su precio original
*/