<?php

require_once "pdoConn.php";
session_start();


if (!isset($_SESSION["mail"])) {
    echo "skere";
    die("necesitas un mail para coger datos");
} else {
    echo json_encode("bien");
}

/*
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
*/


?>