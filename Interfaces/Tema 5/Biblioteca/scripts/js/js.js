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
    alert("Por favor rellena los campos antes de hacer registrarte");
  }

}

async function printRecomendedBooks() {
  
  let container = $("#recomendedBooks");

  let html = "";

  loadBooks()
  .then((books) => {
    for (let index = 0; index < 3; index++) {
    
      let rand = Math.floor(Math.random() * 20);

      let book = books[rand];
      
      html +=
      `
      <div class="col-sm-12 col-md-4 d-flex justify-content-center text-center py-4">
        <div class="card">
          <img src="img/books/${book.rutaimg}" class="card-img-top cardImg" alt="${book.rutaimg}">
          <div class="card-body">
            <h5 class="card-title">${book.titulo}</h5>
            <p class="card-text">Autor - <b>${book.autor}</b></p>
            <p class="card-text">Año - <b>${book.ano}</b></p>
            <a class="btn btn-primary align-text-bottom" href="book.php?isbn=${book.isbn}">Saber Más</a>
          </div>
        </div>
      </div>
      `;
      
    }

    container.html(html);

  });

}

async function printAllBooks() {

  let container = $("#allBooksContainer");

  let html = "";

  loadBooks()
  .then((books) => {

    printBooks(books, container);

  });

}





function addListeners() {

  $("#login").click(function (e) {checkLogIn(e)});
  $("#register").click(function (e) {checkRegister(e)});

}




$(document).ready(function () {

  printRecomendedBooks();

  printAllBooks();

  addListeners();

});
