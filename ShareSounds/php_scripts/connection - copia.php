<?php
$db_host="sql309.epizy.com";
$db_user="epiz_28901454";
$db_password="qjnRUYqQTK3";  
$db_name="epiz_28901454_sharesounds";

try {
	$db=new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOEXCEPTION $e) {
	$e->getMessage();
}

?>