function checkLogIn(e) {

    e.preventDefault();

    let form_data = $("#loginForm").serializeToJSON();

    if (form_data.email != "" || form_data.contrasena != "") {

        $.ajax({
        type: "POST",
        url: "http://localhost/Biblioteca/scripts/php/credentialsCheck.php",
        data: form_data,
        success: function (response) {
            console.log(response);

            if (response == "correct") {
            window.location.href="http://localhost/Biblioteca/";
            } else {
            $("#infoLoginDiv").css("display", "block");
            }
            
            //window.location.href="index.php";
        },
        error: function (xhr, resp, text){
            console.log(xhr, resp, text);
        }
        });

    } else {
        alert("Por favor rellena los campos antes de hacer login");
    }

    }
    function checkRegister(e) {
    e.preventDefault();


    let form_data = $("#registerForm").serializeToJSON();

    if (form_data.mail != "" && form_data.contrasenaRegister != "" && form_data.nombre != "") {

        $.ajax({
        type: "POST",
        url: "http://localhost/Biblioteca/scripts/php/credentialsCheck.php",
        data: form_data,
        success: function (response) {
            console.log(response);

            if (response == "correct") {
                location = location;
            } else {
            $("#infoLoginDiv").css("display", "block");
            }
        },
        error: function (xhr, resp, text){
            console.log(xhr, resp, text);
        }
        });

    } else {
        alert("Por favor rellena los campos antes de hacer registrarte");
    }

}

function addListenersLoginRegister() {

    $("#login").click(function (e) {checkLogIn(e)});
    $("#register").click(function (e) {checkRegister(e)});
  
}




$(document).ready(function () {

    addListenersLoginRegister();

});