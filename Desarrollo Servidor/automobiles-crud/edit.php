<?php
require_once "pdo.php";
session_start();

if ( ! isset($_SESSION["name"])) {
    die('ACCESS DENIED');
}







if (isset($_POST["update"])) {
    $make = htmlentities($_POST["make"]);
    $model = htmlentities($_POST["model"]);
    $year = htmlentities($_POST["year"]);
    $mileage = htmlentities($_POST["mileage"]);
    $auto_id = $_POST["auto_id"];

    if (strlen($_POST["make"]) < 1 || strlen($_POST["model"]) < 1 || strlen($_POST["year"]) < 1 || strlen($_POST["mileage"]) < 1) {
        $_SESSION["error"] = "All fields are required";
        header("Location: edit.php?auto_id=".$_REQUEST["auto_id"]);
        return;
    } elseif (!is_numeric($mileage) || !is_numeric($year)) {
        $_SESSION["error"] = "Mileage and year must be numeric";
        header("Location: edit.php?auto_id=".$_REQUEST["auto_id"]);
        return;
    } else {

        $stmt = $pdo->prepare("UPDATE autos SET make = :make, year = :year, mileage = :mileage, model = :model WHERE auto_id = :auto_id");
        $stmt->execute(array(
                ":make" => $make,
                ":year" => $year,
                ":model" => $model,
                ":auto_id" => $auto_id,
                ":mileage" => $mileage)
        );

        $_SESSION["success"] = "Record Edited";
        header("Location: index.php");
        return;
    }
}
/*
if ( isset($_POST['name']) && isset($_POST['email'])
     && isset($_POST['password']) && isset($_POST['user_id']) ) {

    // Data validation
    if ( strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?user_id=".$_POST['user_id']);
        return;
    }

    if ( strpos($_POST['email'],'@') === false ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: edit.php?user_id=".$_POST['user_id']);
        return;
    }

    $sql = "UPDATE users SET name = :name,
            email = :email, password = :password
            WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password'],
        ':user_id' => $_POST['user_id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}
*/








// Guardian: Make sure that user_id is present
if ( ! isset($_GET['auto_id']) ) {
  $_SESSION['error'] = "Missing auto_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM autos where auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for auto_id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$ma = htmlentities($row['make']);
$mo = htmlentities($row['model']);
$ye = htmlentities($row['year']);
$mi = htmlentities($row['mileage']);
$auto_id = $row['auto_id'];
?>
<p>Edit User</p>
<form method="POST">
    <label for="make">Make</label>
    <input type="text" name="make" id="make" value="<?=$ma?>"><br/>
    <label for="model">Model</label>
    <input type="text" name="model" id="model" value="<?=$mo?>"><br/>
    <label for="year">Year</label>
    <input type="text" name="year" id="year" value="<?=$ye?>"><br/>
    <label for="mileage">Mileage</label>
    <input type="text" name="mileage" id="mileage" value="<?=$mi?>"><br/><br/>
    <input type="hidden" name="auto_id" value="<?=$auto_id?>">
    <input type="submit" name="update" value="Save">
    <a href="index.php">Cancelar</a>
</form>
