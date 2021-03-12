<?php

require_once "pdoConn.php";


if (isset($_POST["mailUser"])) {
    $query = "DELETE FROM `Users` WHERE `Users`.`mail` = :mail";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":mail", $_POST["mailUser"], PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "correct";
    } else {
        echo "incorrect";
    }

} else {
    echo "incorrect";
}

?>