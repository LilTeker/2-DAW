<?php

require_once "pdoConn.php";


if (isset($_POST["idAlquiler"])) {
    $query = "DELETE FROM `Alquiler` WHERE `Alquiler`.`idalquiler` = :idAqluiler";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":idAqluiler", $_POST["idAlquiler"], PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "correct";
    } else {
        echo "incorrect";
    }

} else {
    echo "incorrect";
}

?>