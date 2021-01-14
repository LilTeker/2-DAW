<?php
// ver 05-ws-2-ws.php

$minimo = $_REQUEST["min"];
$maximo = $_REQUEST["max"];

print rand($minimo, $maximo);
?>
