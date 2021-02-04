let inputSave1 = "";
let inputSave2 = "";



function colorChess() {
    $(".black").css("background-color", "black");
    $(".white").css("background-color", "white");
}

function inputTextCheck() { 
    let val = $("#inputText").val();

    if (val.length < 16) {
        inputSave1 = val;
        $("#infoText").text("Tiene " + (15 - val.length) + " caracteres restantes");
    } else {
        $("#inputText").val(inputSave1);
        $("#infoText").text("No puede escribir más de: " + (val.length - 1) + " caracteres");
    }
}

function inputOnlyNum() { 
    let val = $("#onlyNum").val();
    if (!isNaN(val)) {
        inputSave2 = val;
    } else {
        $("#onlyNum").val(inputSave2);
    }
}

function blockCheck(block) {
    $("#blockText").text("Estás en el Bloque " + block.data("id"));
    $(".block").css("background-color", "white");
    block.css("background-color", "yellow");
}


$(document).ready(function () {
    //1
    colorChess();

    //2
    $("#inputText").on("input", function () {inputTextCheck();});

    //3
    $(document).keypress(function (e) { 
        if (e.keyCode == "13") {
            $("#keyboardInputInfo").text("Has presionado el 'Enter'");
        }
    });
    $(document).mousedown(function (e) { 
        if (e.which == 1) {
            $("#keyboardInputInfo").text("Has presionado el 'Click izquierdo'");
        } else if (e.which == 3) {
            $("#keyboardInputInfo").text("Has presionado el 'Click derecho'");
        }      
    });

    //4
    $("#onlyNum").on("input", function () {inputOnlyNum();});

    //5
    $(".block").mouseenter(function () {blockCheck($(this))});
    
    //6
    $("#imgBombilla").click(function (e) { 
        if ($(this).attr("src") == "img/bombillaOn.jpg") {
            $(this).attr("src", "img/bombillaOff.jpg");
        } else {
            $(this).attr("src", "img/bombillaOn.jpg");
        }
    });

});
