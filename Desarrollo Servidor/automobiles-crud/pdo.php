<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=misc', 'fred', 'zap');
//$pdo = new PDO('mysql:host=sql207.epizy.com;port=3306;dbname=epiz_26867226_misc', 'epiz_26867226', 'nEHdMFDA4jj');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);