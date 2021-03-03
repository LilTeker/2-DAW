<?php

include "pdoConn.php";

echo var_dump($conn);


$stmt = $conn->prepare("SELECT * FROM Users WHERE nombre = :nombre AND mail = :mail");
$stmt->bindParam(":nombre", "TEKER", PDO::PARAM_STR);
$stmt->bindParam(":mail", "miguel00rg@hotmail.com", PDO::PARAM_STR);
$result = $stmt->execute();

echo $result;


if (isset($_POST["nombre"]) && isset($_POST["mail"])) {

    

}

?>