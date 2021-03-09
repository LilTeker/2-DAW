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
    
});