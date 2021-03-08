<?php

require_once "pdoConn.php";

function getBook($isbn) {

    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM Books WHERE isbn = $isbn");
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

            // show products data in json format
            return $booksArray;


        } else { // no books found 

            return null;
        }
    } catch (Exception $e) {
        echo("<p class='mt-5'>Hay un error en la consulta, intentelo mas tarde</p>");
    }

    
}

function getComments($isbn) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM Books WHERE isbn = $isbn");
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

            // show products data in json format
            return $booksArray;


        } else { // no books found 

            return null;
        }
    } catch (Exception $e) {
        echo("<p class='mt-5'>Hay un error en la consulta, intentelo mas tarde</p>");
    }
}