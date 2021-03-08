<?php

session_start();

require_once 'pdoConn.php';


if (isset($_POST["isbn"]) && isset($_POST["dateInicial"]) && isset($_POST["dateFinal"]) && isset($_SESSION["mail"])) {
    
    
    $query = "INSERT INTO `Alquiler` (`mail`, `isbn`, `fechainicio`, `fechafinal`) VALUES (:mail, :isbn, :fechainicio, :fechafinal);";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":mail", $_SESSION["mail"], PDO::PARAM_STR);
    $stmt->bindParam(":isbn", $_POST["isbn"], PDO::PARAM_STR);
    $stmt->bindParam(":fechainicio", $_POST["dateInicial"], PDO::PARAM_STR);
    $stmt->bindParam(":fechafinal", $_POST["dateFinal"], PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "correct";
    } else {
        echo "incorrect";
    }
} else {
    echo "No se tienen los datos necesarios para la solicitud";
}
?>