<?php

    $conn = new PDO('mysql:host=localhost;port=3306;dbname=biblioteca', 'fred', 'zap');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getConn() {
    $conn = new PDO('mysql:host=localhost;port=3306;dbname=biblioteca', 'fred', 'zap');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "test";

    return $conn;
}

?>