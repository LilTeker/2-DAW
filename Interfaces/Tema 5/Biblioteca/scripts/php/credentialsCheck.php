<?php

session_start();

require_once 'pdoConn.php';


if (isset($_POST["tipoSolicitud"])) {

    if ($_POST["tipoSolicitud"] == "inputlogin") {


        $email = htmlspecialchars(strip_tags($_POST["email"]));
        $contrasena = htmlspecialchars(strip_tags($_POST["contrasena"]));

        $query = "SELECT * FROM Users WHERE mail = :email AND contrasena = :contrasena";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);

        $stmt->execute();

        if ($row = $stmt->fetch()) {

            $_SESSION["nombre"] = $row["nombre"];
            $_SESSION["mail"] = $row["mail"];
            $_SESSION["privileges"] = $row["administrator"];

            echo "correct";

        } else {
            echo "incorrect";
        }

    } elseif ($_POST["tipoSolicitud"] == "inputRegister") {

        $email = htmlspecialchars(strip_tags($_POST["mail"]));
        $contrasena = htmlspecialchars(strip_tags($_POST["contrasenaRegister"]));
        $nombre = htmlspecialchars(strip_tags($_POST["nombre"]));

        $query = "INSERT INTO Users (mail, nombre, multaId, contrasena, administrator) VALUES (:mail, :nombre, NULL, :contrasena, '0')";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":mail", $email, PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "correct";
        } else {
            echo "incorrect";
        }

    
    }
} else {
    echo "no data was sent";
}

?>