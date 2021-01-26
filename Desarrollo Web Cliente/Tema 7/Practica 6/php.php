<?php

$localidadesArr = ["Mengibar","Madrid","Jaén","Linares","Leganés","Barcelona","Mallorca","Zaragoza","Lleida","Girona"];

$local = $_POST["localidad"];

if (in_array($local, $localidadesArr)) {
    echo json_encode("<p style='color: green'>La ciudad existe en nuestra lista</p>");
}

?>