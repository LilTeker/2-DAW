<?php

require_once("page.php");

// The ReflectionClass class
// https://www.php.net/manual/en/class.reflectionclass.php

$class = new ReflectionClass("Page");
echo "<pre>".$class."</pre>";

?>
