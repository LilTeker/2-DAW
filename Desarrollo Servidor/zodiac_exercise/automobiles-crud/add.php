<?php

include_once "pdo.php";
session_start();

if ( ! isset($_SESSION["name"])) {
    die('ACCESS DENIED');
}

if (isset($_POST["add"])) {
    $make = htmlentities($_POST["make"]);
    $model = htmlentities($_POST["model"]);
    $year = htmlentities($_POST["year"]);
    $mileage = htmlentities($_POST["mileage"]);

    if (strlen($_POST["make"]) < 1 || strlen($_POST["model"]) < 1 || strlen($_POST["year"]) < 1 || strlen($_POST["mileage"]) < 1) {
        $_SESSION["error"] = "All fields are required";
        header("Location: add.php");
        return;
    } elseif (!is_numeric($mileage) || !is_numeric($year)) {
        $_SESSION["error"] = "Mileage and year must be numeric";
        header("Location: add.php");
        return;
    } else {

        $stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage, model) VALUES ( :make, :year, :mileage, :model)");
        $stmt->execute(array(
                ":make" => $make,
                ":year" => $year,
                ":model" => $model,
                ":mileage" => $mileage)
        );

        $_SESSION["success"] = "Record Added";
        header("Location: index.php");
        return;
    }
} elseif (isset($_POST["cancel"])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>b19bfb52 Tracking Autos Page</title>
</head>
<body>
<div class="container">
    <h1>Tracking Autos for <?=$_SESSION["name"]?></h1>
    <?php

    if (isset($_SESSION["error"])) {
        echo('<p style="color: #ff0000;">' .htmlentities($_SESSION["error"])."</p>\n");
        unset($_SESSION["error"]);
    }

    ?>
    <form method="POST">
        <label for="make">Make</label>
        <input type="text" name="make" id="make"><br/>
        <label for="model">Model</label>
        <input type="text" name="model" id="model"><br/>
        <label for="year">Year</label>
        <input type="text" name="year" id="year"><br/>
        <label for="mileage">Mileage</label>
        <input type="text" name="mileage" id="mileage"><br/>
        <input type="submit" name="add" value="Add">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>
</body>
