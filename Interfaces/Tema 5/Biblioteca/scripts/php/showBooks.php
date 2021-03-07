<?php

include_once "pdoConn.php";


$stmt = $conn->prepare("SELECT * FROM Books");
$stmt->execute();

$num = $stmt->rowCount();

if ($num > 0) {

    $booksArray = array();
    $booksArray["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);


        $book = array(
            "isbn" => $isbn,
            "autor" => $autor,
            "genero" => $genero,
            "sinopsis" => html_entity_decode($sinopsis),
            "rutaimg" => $rutaimg,
            "ano" => $ano,
            "puntuacion" => $puntuacion,
            "titulo" => $titulo
        );

        array_push($booksArray["records"], $book);

    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($booksArray);


} else { // no books found 

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no books found
    echo json_encode(
        array("message" => "No books found.")
    );
}



/*

$stmt = $product->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {

    // products array
    $products_arr = array();
    $products_arr["records"] = array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $product_item = array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );

        array_push($products_arr["records"], $product_item);
    }

    // set response code - 200 OK
    http_response_code(200);

    // show products data in json format
    echo json_encode($products_arr);
} else { // no products found 

    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}
*/

/*
function read()
    {

        // select all query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
*/
?>