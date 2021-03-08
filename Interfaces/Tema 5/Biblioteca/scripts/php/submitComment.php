<?php

session_start();
require_once 'pdoConn.php';

if (isset($_SESSION["mail"]) && isset($_POST["isbn"]) && isset($_POST["comentario"]) && isset($_POST["puntuacionComentario"])) {

    $mail = $_SESSION["mail"];
    $isbn = $_POST["isbn"];
    $comment = $_POST["comentario"];
    $stars = $_POST["puntuacionComentario"];

    $query = "INSERT INTO Comentarios (`isbn`, `comentario`, `puntuacion`, `mail`) VALUES (:isbn, :comment, :stars, :mail)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":isbn", $isbn, PDO::PARAM_STR);
    $stmt->bindParam(":comment", $comment, PDO::PARAM_STR);
    $stmt->bindParam(":stars", $stars, PDO::PARAM_INT);
    $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $stmt2 = $conn->prepare("SELECT puntuacion FROM Comentarios WHERE isbn = :isbn");
        $stmt2->bindParam(":isbn", $isbn, PDO::PARAM_STR);
        $stmt2->execute();

        $num = $stmt2->rowCount();

        if ($num > 0) {

            $puntuacionesArr = array();

            while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                
                extract($row);

                array_push($puntuacionesArr, $puntuacion);

            }

            $puntuacionesAverage = round(array_sum($puntuacionesArr)/count($puntuacionesArr), 2);
            

            if ($puntuacionesAverage != null) {
                $stmt3 = $conn->prepare("UPDATE `Books` SET `puntuacion` = :puntuacion WHERE `Books`.`isbn` = :isbn");
                $stmt3->bindParam(":puntuacion", $puntuacionesAverage, PDO::PARAM_STR);
                $stmt3->bindParam(":isbn", $isbn, PDO::PARAM_STR);
                
                if ($stmt3->execute()) {
                    echo "correct";
                } else {
                    echo "incorrect";
                }
            } else {
                echo "incorrect";
            }
            
        } else {
            echo "incorrect";
        }

    } else {
        echo "incorrect";
    }

}


?>