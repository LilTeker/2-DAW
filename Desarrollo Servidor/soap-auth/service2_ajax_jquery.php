<?php
// How to Create a SOAP Client/Server in PHP (Added Authentification) - Part 02
// https://www.youtube.com/watch?v=6V_myufS89A
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consume a SOAP Service with PHP (AJAX JQuery)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function(){
            $('#student').change(function(){
                //Selected value
                var selected_val = $(this).val();
                
                //Ajax calling php function
                $.post('data.php', { dropdownValue: selected_val }, function(data){
                    $('#output').html(data);  
                });
            });
            // Trigger a change event
            $('#student').val('0').trigger('change');

        });
        </script>

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
    <h1>Consume a SOAP Service with PHP (AJAX JQuery)</h1>      
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

</body>
</html>





