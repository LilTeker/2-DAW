async function submitComment(e) {
    e.preventDefault();

    let form_data = $("#commentForm").serializeToJSON();

    if (form_data.comentario != "" && (form_data.puntuacionComentario != "" && form_data.puntuacionComentario != "null")) {
        
        $.ajax({
            type: "POST",
            url: "http://localhost/Biblioteca/scripts/php/submitComment.php",
            data: form_data,
            success: function (response) {
              console.log(response);
        
              

              if (response == "correct") {
                window.location.href="http://localhost/Biblioteca/book.php?isbn=" + form_data.isbn;
              } else {
                $("#textCommentaryHidden").css("display", "block");
              }
              
              //window.location.href="index.php";
            },
            error: function (xhr, resp, text){
              console.log(xhr, resp, text);
            }
        });
        
    } else {
        alert("Por favor rellena los campos antes de hacer de comentar");
    }

}

function rent(e) {
    e.preventDefault();

    let form_data = $("#commentForm").serializeToJSON();
    let date = new Date();
    let isbn = form_data.isbn;
    let dateInicial = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
    date.setDate(date.getDate() + 14);
    let dateFinal = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();

    
    $.ajax({
        type: "POST",
        url: "http://localhost/Biblioteca/scripts/php/rentBook.php",
        data: {isbn: isbn, dateInicial: dateInicial, dateFinal: dateFinal},
        success: function (response) {
          
            $("#buttonAlquiler").removeClass("btn-primary");
            $("#buttonAlquiler").addClass("btn-warning");
            $("#buttonAlquiler").text("El Libro ya esta alquilado");
            $("#buttonAlquiler").off("click");
            $("#buttonAlquiler").removeAttr("id");

          //window.location.href="http://localhost/Biblioteca/book.php?isbn=" + isbn;
        },
        error: function (xhr, resp, text){
          console.log(xhr, resp, text);
        }
    });

}

function addListeners() {

    $("#submitComment").click(function (e) {submitComment(e)});
    $("#buttonAlquiler").click(function (e) {rent(e)});
    
}




$(document).ready(function () {

    addListeners();

});
  