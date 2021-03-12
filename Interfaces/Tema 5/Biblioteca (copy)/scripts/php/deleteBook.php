<?php

require_once "pdoConn.php";


if (isset($_POST["isbnBook"])) {
    $query = "DELETE FROM `Books` WHERE `Books`.`isbn` = :isbn";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":isbn", $_POST["isbnBook"], PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "correct";
    } else {
        echo "incorrect";
    }

} else {
    echo "incorrect";
}

?>