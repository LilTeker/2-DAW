<?php

include_once "pdo.php";
session_start();

if ( ! isset($_SESSION["name"])) {
    die('Name parameter missing');
}

if (isset($_POST["add"])) {
    $make = htmlentities($_POST["make"]);
    $year = htmlentities($_POST["year"]);
    $mileage = htmlentities($_POST["mileage"]);

    if (!is_numeric($mileage) || !is_numeric($year)) {
        $_SESSION["error"] = "Mileage and year must be numeric";
        header("Location: add.php");
        return;
    } elseif (strlen($_POST["make"]) < 1) {
        $_SESSION["error"] = "Make is required";
        header("Location: add.php");
        return;
    } else {

        $stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES ( :make, :year, :mileage)");
        $stmt->execute(array(
                ":make" => $make,
                ":year" => $year,
                ":mileage" => $mileage)
        );

        /* ESTA NO FUNCIONA NO ENCUENTRO EL ERROR
        $stmt = $pdo->prepare("INSERT INTO autos (make, year, mileage) VALUES (:make, :year; :mileage)");

        $stmt->execute(array(
                ":make" => $make,
                ":year" => $year,
                ":mileage" => $mileage)
        );
        */
        $_SESSION["success"] = "Record Inserted";
        header("Location: view.php");
        return;
    }
} elseif (isset($_POST["cancel"])) {
    header("Location: view.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>b7aaed6d Tracking Autos Page</title>
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
        <label for="year">Year</label>
        <input type="text" name="year" id="year"><br/>
        <label for="mileage">Mileage</label>
        <input type="text" name="mileage" id="mileage"><br/>
        <input type="submit" name="add" value="Add">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>
</body>
