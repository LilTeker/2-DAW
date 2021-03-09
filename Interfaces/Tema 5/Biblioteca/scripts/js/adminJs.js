$(document).ready(function () {

    $(".buttonDeleteUser").click(function (e) {
        e.preventDefault();

        let mailUser = $(this).data("id");

        $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/deleteUser.php",
            data: {mailUser: mailUser},
            success: function (response) {

                console.log(response);


                if (response == "correct") {
                    location = location;
                } else {
                    $("#errorBorrarUser").css("display", "block");
                }
            },
            error: function (xhr, resp, text){
                console.log(xhr, resp, text);
            }
        });
    });


    $(".buttonDeleteBook").click(function (e) {
        e.preventDefault();

        let isbnBook = $(this).data("id");

        $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/deleteBook.php",
            data: {isbnBook: isbnBook},
            success: function (response) {

                console.log(response);
                

                if (response == "correct") {
                    location = location;
                } else {
                    $("#errorBorrarBook").css("display", "block");
                }
            },
            error: function (xhr, resp, text){
                console.log(xhr, resp, text);
            }
        });
    });



    $("#createUser").click(function (e) { 
        e.preventDefault();


        let form_data = $("#createUserForm").serializeToJSON();

        console.log(form_data.privileges);


        if (form_data.mailNewUser != "" && form_data.contrasena != "" && form_data.nombreNewUser != "" && (form_data.privileges == 0 || form_data.privileges == 1)) {

            $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/createUser.php",
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
        
    });

    $("#createBook").click(function (e) { 
        e.preventDefault();


        let form_data = $("#createBookForm").serializeToJSON();

        console.log(form_data);

        if (form_data.isbnNewBook != "" && form_data.titulo != "" && form_data.autor != "" && form_data.genero != "" && form_data.sinopsis != "" && form_data.rutaimg != "" && form_data.fechaSalida != "" && form_data.puntuacion != "") {

            $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/createBook.php",
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
        
    });
    
});