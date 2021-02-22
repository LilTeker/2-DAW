<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consume a SOAP Service with PHP (AJAX XMLHttpRequest)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
  #student {
    background-color: lightblue;
    color: #fff;
    font-size: 1.5em;
  }
 
  </style>

</head>
<body>

<div class="container">
  <div class="page-header">
    <h1>Consume a SOAP Service with PHP (AJAX XMLHttpRequest)</h1>      
  </div>
  <div class="jumbotron text-center">
    <div id="form" class="form-group">
      <select size="4" autofocus class="form-control form-control-lg" name="student" id="student">
        <option value="0" selected>Choose Student</option>
        <option value="1">Student One</option>
        <option value="2">Student Two</option>
        <option value="3">Student Three</option>
      </select>
    </div>
    <div class="well well-lg" id="output"></div>
  </div>
</div>
<script>
let student = document.getElementById("student");
let output = document.getElementById("output");

student.addEventListener("change", function() {
    getText("data.php");
    console.log(student.value);
});

student.dispatchEvent(new Event('change'));

function getText(url) {
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      output.innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", url, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("dropdownValue=" + student.value); 
}
</script>
</body>
</html>





