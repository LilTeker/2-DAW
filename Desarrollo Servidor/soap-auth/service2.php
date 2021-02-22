<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A

include 'client2.php';

$client = new client();   

$id = $_GET['id'] ?? '3'; // http://localhost/soap-auth/service2.php?id=3

$id_array = array('id' => $id);

echo $client->getName($id_array);

?>

