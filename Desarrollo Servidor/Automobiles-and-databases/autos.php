<?php

include_once "pdo.php";

if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}


if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
} elseif (isset($_POST["add"])) {
    $make = htmlentities($_POST["make"]);
    $year = htmlentities($_POST["year"]);
    $mileage = htmlentities($_POST["mileage"]);

    if (!is_numeric($mileage) || !is_numeric($year)) {
        echo "<p style='color: red'>Mileage and year must be numeric</p>";
    } elseif (strlen($_POST["make"]) < 1) {
        echo "<p style='color: red'>Make is required</p>";
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
        echo "<p style='color: green'>Record Inserted</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>61f57271 Tracking Autos Page</title>
</head>
<body>
<div class="container">
    <h1>Tracking Autos for csev@umich.edu</h1>
    <form method="POST">
        <label for="make">Make</label>
        <input type="text" name="make" id="make"><br/>
        <label for="year">Year</label>
        <input type="text" name="year" id="year"><br/>
        <label for="mileage">Mileage</label>
        <input type="text" name="mileage" id="mileage"><br/>
        <input type="submit" name="add" value="Add">
        <input type="submit" name="logout" value="Logout">
    </form>
    <h1>Automobiles</h1>
    <ul>
    <?php
    $stmt = $pdo->query("SELECT make, year, mileage FROM autos");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        echo "<li>";
        echo($row["year"] . " " . $row["make"] . " / " . $row["mileage"]);
        echo "</li>";
    }
    ?>
    </ul>
</div>
</body>
