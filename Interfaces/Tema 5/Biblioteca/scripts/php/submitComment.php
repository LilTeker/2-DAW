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
        echo "correct";
    } else {
        echo "incorrect";
    }

}


?>