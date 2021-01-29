let blinkNum = 0;


function blink(element) {
    if (blinkNum == 0) {
        blinkNum = 1;
        $("#jQueryText").css("color", "yellow");
    } else {
        blinkNum = 0;
        $("#jQueryText").css("color", "red");
    }
}




$(document).ready(function () {
    //1
    $("#check").change(function () {
        if ($(this).is(":checked")) {
            $("#submit").removeAttr("disabled");
        } else {
            $("#submit").prop("disabled", true);
        }
    });

    //2
    setInterval(blink, 700);

    //3
    $("#añadir").click(function (e) { 
        e.preventDefault();
        let val = $("#newLi").val();
        $("#list").append($("<li></li>").text(val));
    });

    //4

    $(".imgTable").mouseenter(function () { 
        $(".imgTable").css("opacity", "0.4");
        $(this).css("opacity", "1");

        $(this).css("transform", "scale(1.1)");
    });
    $(".imgTable").mouseleave(function () {
        $(".imgTable").css("opacity", "1");
        $(this).css("transform", "scale(1)");
    });

    //5
    $(".pregunta").click(function (e) { 
        $(".respuestaPreguntas").css("display", "none");
        $(this).next().css("display", "block");
    });

    //6
    $("#block").mouseenter(function () {
        if ($("#block").css("float") == "left") {
            $("#block").css("float", "right");
        } else {
            $("#block").css("float", "left");
        }
    });

});
