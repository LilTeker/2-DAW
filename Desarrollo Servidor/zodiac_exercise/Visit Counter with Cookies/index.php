<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8'/>
    <title>Visit Counter With Cookies</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
  </head>
  <body>
      <h1>Visit counter using a cookie</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <input type="submit" id="create" name="create" value="Create Cookie">
        <input type="submit" id="retrieve" name="retrieve" value="Retrieve Cookie">
        <input type="submit" id="delete" name="delete" value="Delete Cookie">
        <input type="submit" id="add" name="add" value="Increment 1">

    </form>
  </body>
</html>

<?php 

$count = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (isset($_POST["create"])) {

    if (isset($_COOKIE["counter"])) {
      echo "<p>Cookie counter exists with the value: " . $_COOKIE["counter"] . "</p>";
    } else {
      setcookie("counter", $count);
      echo "<p>Cookie created: counter = " . $count . "</p>";
    }

  } elseif (isset($_POST["retrieve"])) {

    if (isset($_COOKIE["counter"])) {
      echo "<p>Retrieving cookie counter = " . $_COOKIE["counter"] . "</p>";
    } else {
      echo "<p>Cookie counter does Not exists</p>";
    }

  } elseif (isset($_POST["delete"])) {
    if (isset($_COOKIE["counter"])) {
      setcookie("counter", $count, time() - 3600);
      echo "<p>Cookie counter deleted</p>";
    } else {
      echo "<p>Cookie counter does Not exists</p>";
    }
  } else {
    if (isset($_COOKIE["counter"])) {
      $count = $_COOKIE["counter"] + $count;
      setcookie("counter", $count);
      echo "<pre>";
      print_r($_COOKIE);
      echo "</pre>";
      echo "<p>New value of counter is " . ($_COOKIE["counter"] + 1) . "</p>";
    } else {
      echo "<p>Cookie counter does Not exists</p>";
    }
  }
}
?>