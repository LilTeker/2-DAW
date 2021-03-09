<?php

session_start();

require_once 'pdoConn.php';

if (!isset($_SESSION["privileges"]) || $_SESSION["privileges"] != 1) {
    die("Solo puedes acceder a este sitio si eres administrador");
} else {
    if (isset($_POST["isbnNewBook"]) && isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["genero"]) && isset($_POST["sinopsis"]) && isset($_POST["rutaimg"]) && isset($_POST["fechaSalida"]) && isset($_POST["puntuacion"])) {
   
        $query = "INSERT INTO `Books` (`isbn`, `autor`, `titulo`, `genero`, `sinopsis`, `rutaimg`, `ano`, `puntuacion`) VALUES (:isbn, :autor, :titulo, :genero, :sinopsis, :rutaimg, :ano, :puntuacion)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":isbn", $_POST["isbnNewBook"], PDO::PARAM_STR);
        $stmt->bindParam(":autor", $_POST["autor"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $_POST["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $_POST["genero"], PDO::PARAM_STR);
        $stmt->bindParam(":sinopsis", $_POST["sinopsis"], PDO::PARAM_STR);
        $stmt->bindParam(":rutaimg", $_POST["rutaimg"], PDO::PARAM_STR);
        $stmt->bindParam(":ano", $_POST["fechaSalida"], PDO::PARAM_STR);
        $stmt->bindParam(":puntuacion", $_POST["puntuacion"], PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            echo "correct";
        } else {
            echo "incorrect";
        }
    
    } else {
        echo "incorrect";
    }
}



?>