<?php

$conn = new PDO("sqlite:dbBooks.db");



if (isset($_POST["name"]) && isset($_POST["age"])) {

    
    
    echo $_POST ["ejemplo"];

}

?>