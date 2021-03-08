<?php

require_once "pdoConn.php";

function getBook($isbn) {

    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT * FROM Books WHERE isbn = :isbn");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);

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
        $stmt = $conn->prepare("SELECT * FROM Comentarios WHERE isbn = :isbn");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);

        $stmt->execute();

        $num = $stmt->rowCount();

        if ($num > 0) {

            $commentArray = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                extract($row);

                $stmt2 = $conn->prepare("SELECT nombre FROM Users WHERE mail = :mail");
                $stmt2->bindParam(":mail", $row["mail"], PDO::PARAM_STR);
                $stmt2->execute();
                $user = $stmt2->fetch(PDO::FETCH_ASSOC);

                $comment = array(
                    "idcomentario" => $idcomentario,
                    "isbn" => $isbn,
                    "comentario" => html_entity_decode($comentario),
                    "puntuacion" => $puntuacion,
                    "user" => $user,
                );

                array_push($commentArray, $comment);

            }

            // show products data in json format
            return $commentArray;


        } else { // no books found 

            return null;
        }
    } catch (Exception $e) {
        echo("<p class='mt-5'>Hay un error en la consulta, intentelo mas tarde</p>");
    }
}

function isAlquiler($isbn) {
    global $conn;
    
    try {
        $stmt = $conn->prepare("SELECT idalquiler, fechafinal FROM Alquiler WHERE isbn = :isbn");
        $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);
        $stmt->execute();

        $num = $stmt->rowCount();

        if ($num > 0) {

            $alquilerArray = array();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                extract($row);

                $alquiler = array(
                    "id" => $idalquiler,
                    "fechafinal" => $fechafinal,
                );

                array_push($alquilerArray, $alquiler);

            }

            // show products data in json format
            return $alquilerArray;


        } else { // no books found 

            return null;
        }
    } catch (Exception $e) {
        echo("<p class='mt-5'>Hay un error en la consulta, intentelo mas tarde</p>");
    }
}