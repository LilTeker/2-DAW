<?php
// How to Create a SOAP Client/Server in PHP - Part 01
// https://www.youtube.com/watch?v=e_7jDqN2A-Y

include 'client1.php';

$id_array = array('id' => '3');
echo $client->getName($id_array);
?>

