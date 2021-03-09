<?php

session_start();

require_once 'pdoConn.php';


if (!isset($_SESSION["privileges"]) || $_SESSION["privileges"] != 1) {
    die("Solo puedes acceder a este sitio si eres administrador");
} else {
    if (isset($_POST["mailNewUser"]) && isset($_POST["contrasena"]) && isset($_POST["nombreNewUser"]) && isset($_POST["privileges"])) {
   
        $query = "INSERT INTO `Users` (`mail`, `nombre`, `contrasena`, `administrator`) VALUES (:mail, :nombre, :contrasena, :administrador)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":mail", $_POST["mailNewUser"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $_POST["nombreNewUser"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $_POST["contrasena"], PDO::PARAM_STR);
        $stmt->bindParam(":administrador", $_POST["privileges"], PDO::PARAM_INT);
    
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