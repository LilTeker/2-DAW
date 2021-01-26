let blinkNum = 0;

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
        console.log(val);
    });

});



function blink(element) {
    if (blinkNum == 0) {
        blinkNum = 1;
        $("#jQueryText").css("color", "yellow");
    } else {
        blinkNum = 0;
        $("#jQueryText").css("color", "red");
    }
}