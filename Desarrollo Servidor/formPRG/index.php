<?php
// https://www.webslesson.info/2016/07/server-side-form-validation-in-php-programming-language.html
//Above HTML
session_start();

$name_error = (isset($_SESSION["name_error"])) ? $_SESSION["name_error"] : '';
$email_error = (isset($_SESSION["email_error"])) ? $_SESSION["email_error"] : '';
$gender_error = (isset($_SESSION["gender_error"])) ? $_SESSION["gender_error"] : '';
$output = '';

unset($_SESSION["name_error"]);
unset($_SESSION["email_error"]);
unset($_SESSION["gender_error"]);



if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $_SESSION["name_error"] = "<p>Please Enter Name</p>";
        header("Location: index.php");
        return;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $_SESSION["name_error"] = "<p>Only Letters and whitespace allowed</p>";
            header("Location: index.php");
            return;
        }
    }
    if (empty($_POST["email"])) {
        $_SESSION["email_error"] = "<p>Please Enter Email</p>";
        header("Location: index.php");
        return;
    } else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["email_error"] = "<p>Invalid Email format</p>";
            header("Location: index.php");
            return;
        }
    }
    if (empty($_POST["gender"])) {
        $_SESSION["gender_error"] = "<p>Please your Gender</p>";
        header("Location: index.php");
        return;
    } else {
        if (strcmp($_POST["gender"], "Male") != 0 && strcmp($_POST["gender"], "Female") != 0) {
            $_SESSION["gender_error"] = "<p>Gender Invalid</p>";
            header("Location: index.php");
            return;
        }
    }
    if ($name_error == "" && $email_error == "" && $gender_error == "") {
        $output = '<p><label>Ouput-</label></p>  
           <p>Your Name is ' . $_POST["name"] . '</p>  
           <p>Your Email is ' . $_POST["email"] . '</p>  
           <p>Your Gender is ' . $_POST["gender"] . '</p>  
           ';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | PHP Server Side Form Validation</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br/>
<div class="container" style="width:500px;">
    <h3 class="text-center">PHP Server Side Form Validation</h3>
    <form method="post">
        <div class="form-group">
            <label>Enter Name<span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" maxlength="75"/>
            <span class="text-danger"><?php echo $name_error; ?></span>
        </div>
        <div class="form-group">
            <label>Enter Email<span class="text-danger">*</span></label>
            <input type="text" name="email" class="form-control" maxlength="150"/>
            <span class="text-danger"><?php echo $email_error; ?></span>
        </div>
        <div class="form-group">
            <label>Select Gender<span class="text-danger">*</span></label>
            <div class="radio">
                <input type="radio" name="gender" value="Male"/>Male
            </div>
            <div class="radio">
                <input type="radio" name="gender" value="Female"/>Female
            </div>
            <span class="text-danger"><?php echo $gender_error; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-info"/>
        </div>
    </form>
    <div><?php echo $output; ?></div>
</div>
<br/>
</body>
</html>