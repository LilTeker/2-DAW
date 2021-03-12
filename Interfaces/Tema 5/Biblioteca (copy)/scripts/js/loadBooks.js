async function loadBooks() {

    let books = [];

    try {
        
        await $.getJSON("http://localhost/Biblioteca/scripts/php/showBooks.php", function(data) {

            data.records.forEach(element => {
                books.push(element);
            });

        });

       

    } catch (error) {
        console.log(error);
    }

    return books;
}