<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A

include 'client2.php';

$client = new client();   

$selected_val = $_POST['dropdownValue'];

if ($selected_val == 0) {
    echo "<p>Please choose option</p>";
} else { 
    $id_array = array('id' => $selected_val);
    $name = $client->getName($id_array);
    echo "<p>You have selected id: " . $selected_val;
    echo "</p><p>Name = " . $name . "</p>";
}

?>

