<?php

require_once("sites-elements/Site.php");
session_start();

$site = new Site();


if (!isset($_SESSION["privileges"]) || $_SESSION["privileges"] != 1) {
    die("Solo puedes acceder a este sitio si eres administrador");
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Biblioteca RG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <script src="scripts/js/jquery.serializeToJSON.js"></script>
    <script src="https://use.fontawesome.com/b315bbeeee.js"></script>

    
</head>

<body>
    <div class="container-fluid">
    <?php

        $site->printHeader();
        $site->printAdminBody();
        $site->printFooter();

    ?>        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
    <script src="scripts/js/loadBooks.js"></script>
    <script src="scripts/js/printBooks.js"></script>
    <script src="scripts/js/loginRegister.js"></script>
    <script src="scripts/js/adminJs.js"></script>
</body>

</html>