<?php
    //GET
    echo "<p>GET:</p>";
    $url = "http://localhost:8001/password2.php";

    $output = file_get_contents($url);
    $array = json_decode($output, true);

    echo "<p>Tu contraseña es " . $array[0] . "</p>";

    //SOAP
    echo "<p>SOAP:</p>";

    $client = new SoapClient(null, array(
        'location' => "http://localhost/password%20webservice/password1.php",
        'uri' => "http://localhost/",
        'trace' => 1));

    echo $client->random_password(8);
?>