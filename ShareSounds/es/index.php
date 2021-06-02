<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();


/*
if (isset($_SESSION["user_login"]))	//check condition user login not direct back to index.php page
{
	header("location: welcome.php");
}

if (isset($_REQUEST['btn_login']))	//button name is "btn_login" 
{
	$username	= strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
	$email		= strip_tags($_REQUEST["txt_username_email"]);	//textbox name "txt_username_email"
	$password	= strip_tags($_REQUEST["txt_password"]);			//textbox name "txt_password"

	if (empty($username)) {
		$errorMsg[] = "please enter username or email";	//check "username/email" textbox not empty 
	} else if (empty($email)) {
		$errorMsg[] = "please enter username or email";	//check "username/email" textbox not empty 
	} else if (empty($password)) {
		$errorMsg[] = "please enter password";	//check "passowrd" textbox not empty 
	} else {
		try {
			$select_stmt = $db->prepare("SELECT * FROM user WHERE username=:uname OR email=:uemail"); //sql select query
			$select_stmt->execute(array(':uname' => $username, ':uemail' => $email));	//execute query with bind parameter
			$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($select_stmt->rowCount() > 0)	//check condition database record greater zero after continue
			{
				if ($username == $row["username"] or $email == $row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
					if (password_verify($password, $row["password"])) //check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["user_login"] = $row["user_id"];	//session name is "user_login"
						$loginMsg = "Successfully Login...";		//user login success message
						header("refresh:2; welcome.php");			//refresh 2 second after redirect to "welcome.php" page
					} else {
						$errorMsg[] = "wrong password";
					}
				} else {
					$errorMsg[] = "wrong username or email";
				}
			} else {
				$errorMsg[] = "wrong username or email";
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
*/
?>

<!DOCTYPE html>
<html>
<head>
<?php
$site->print_head("Inicio");
?>
</head>


<body>
	<div class="container-fluid">
		
		<?php
		$site->print_navbar();
		?>

		<div class="row">
		<br/><br/><br/><br/><br/><br/><br/><br/><br/>
			<h1 class="mt-5">Página de Inicio</h1>
		</div>

	</div>
</body>

</html>