$(document).ready(function () {

    $(".returnBook").click(function (e) {
        e.preventDefault();

        let idAlquiler = $(this).data("id");

        $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/endRentUser.php",
            data: {idAlquiler: idAlquiler},
            success: function (response) {

                if (response == "correct") {
                    location = location;
                } else {
                    $("#errorDevolucion").css("display", "block");
                }
            },
            error: function (xhr, resp, text){
                console.log(xhr, resp, text);
            }
        });
    });

    
    
});