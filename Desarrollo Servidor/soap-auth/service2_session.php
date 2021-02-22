<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A

session_start();

include 'client2.php';

$client = new client();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consume a SOAP Service with PHP (Session)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  #form {
    font-size: 1.5em;
  }
 
  </style>

</head>
<body>


<div class="container">
  <div class="page-header">
    <h1>Consume a SOAP Service with PHP (Session)</h1>      
  </div>
  <div class="jumbotron text-center">
    <div id="form" class="form-group">
      <form action="#" method="post">
        <select name="student">
          <option value="0" selected>Choose Student</option>
          <option value="1">Student One</option>
          <option value="2">Student Two</option>
          <option value="3">Student Three</option>
        </select>
        <input type="submit" name="submit" value="Get Name" />
      </form>
    </div>
    <div class="well well-lg" id="output">
<?php
if(isset($_POST['submit'])){
    $selected_val = $_POST['student'];
    $id_array = array('id' => $selected_val);
    $name = $client->getName($id_array);
    echo "<p>You have selected id: " . $selected_val;
    echo "</p><p>Name = " . $name . "</p>";
    $_SESSION['selected_val'] = $selected_val;
    $_SESSION['name'] = $name;

    // POST Redirect GET
    header("Location: " . $_SERVER['REQUEST_URI']);
    return;
}
    if(isset($_SESSION['selected_val'])) {
        if ($_SESSION['selected_val'] == 0)
           echo "<p>Please choose option</p>";
        else { 
            echo "<p>You have selected id: " . $_SESSION['selected_val'];
           
        }
        unset($_SESSION['selected_val']);
    }
    if(isset($_SESSION['name'])) {
        echo "</p><p>Name = " . $_SESSION['name'] . "</p>";
        unset($_SESSION['name']);
    }

?>
    </div>

  </div>

</div>

</body>
</html>


