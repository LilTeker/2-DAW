function printBooks(books, container) {

    let html = "";    

    books.forEach(book => {
      
        html += 
        `<div class="col-sm-6 col-md-3 d-flex justify-content-center text-center py-4">
          <div class="card">
            <img src="img/books/${book.rutaimg}" class="card-img-top cardImg" alt="${book.rutaimg}">
            <div class="card-body">
              <h5 class="card-title">${book.titulo}</h5>
              <p class="card-text">Autor - <b>${book.autor}</b></p>
              <p class="card-text">Año - <b>${book.ano}</b></p>
              <a class="btn btn-primary" href="book.php?isbn=${book.isbn}">Saber Más</a>
            </div>
          </div>
        </div>
        `;
  
    });

    container.html(html);

}