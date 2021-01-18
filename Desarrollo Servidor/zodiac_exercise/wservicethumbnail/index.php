<!DOCTYPE html>
<html>
<head>
 <title>Best Of The Web Tutorial</title>
</head>
<body>
<h1>Best of the web Tutorial</h1>
<?php
//--- Load the website data ---------------
include_once('data.php');
//--- Show all websites in the array ------
foreach ($websites as $website) { ?>
    <div style="width: 400px; height: 400px; float: left; border: 1px solid black;
                padding: 10px 10px 10px 10px; margin: 0px 20px 20px 0px;
                background-color: #ccccff;">
      <h2>#<?= $website['id']  ?>. <?= $website['name'] ?></h2>
      <img src="screenshot<?= $website['id'] ?>.jpg" width="380" height="214" />
      <br />
      <?= $website['description'] ?>
    </div>
<?php } ?>
<br clear="all" />
This page is part of the thumbnail.ws <a href="https://thumbnail.ws/tutorial-php.html">PHP website screenshot tutorial</a>.
</body>
</html>

<!--php -S lalhost:8001-->
