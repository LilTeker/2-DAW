<?php
$conn = new PDO('mysql:host=localhost;port=3306;dbname=biblioteca', 'fred', 'zap');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>