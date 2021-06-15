<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();

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
		$errorMsg[] = "Por favor inserte su usuario o correo electrónico";	//check "username/email" textbox not empty 
	} else if (empty($email)) {
		$errorMsg[] = "Por favor inserte su usuario o correo electrónico";	//check "username/email" textbox not empty 
	} else if (empty($password)) {
		$errorMsg[] = "Por favor inserte la contraseña";	//check "passowrd" textbox not empty 
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
						$loginMsg = "Registrado correctamente...";		//user login success message
						header("refresh:2; playlists.php");			//refresh 2 second after redirect to "playlists.php" page
					} else {
						$errorMsg[] = "Datos de identificación incorrectos";
					}
				} else {
					$errorMsg[] = "Datos de identificación incorrectos";
				}
			} else {
				$errorMsg[] = "Datos de identificación incorrectos";
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<?php
	$site->print_head("Identificarse");
	?>
</head>

<body class="d-flex flex-column min-vh-100">
	<div class="container-fluid fix-for-footer">
		<?php
		$site->print_navbar();
		?>

		<div class="row mb-5" id="container-navbar-playlists">
			<div class="col-sm-12 col-md-4">
				<h3 class="header-pl-text">Identificarse</h3>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-sm-12 text-center">
				<h3>Formulario de Identificación</h3>
			</div>
		</div>
		<form method="post" class="form-horizontal">

			<div class="row">
				

				<div class="col-sm-6 offset-3">
					<?php
					if (isset($errorMsg)) {
						foreach ($errorMsg as $error) {
					?>
							<div class="alert alert-danger">
								<strong><?php echo $error; ?></strong>
							</div>
						<?php
						}
					}
					if (isset($loginMsg)) {
						?>
						<div class="alert alert-success">
							<strong><?php echo $loginMsg; ?></strong>
						</div>
					<?php
					}
					?>
					<div class="row mt-5">
						<div class="form-group col-sm-12">
							<label class="col-sm-12 control-label">Usuario o Correo</label>
							<div class="col-sm-12">
								<input type="text" name="txt_username_email" class="form-control" placeholder="Por favor escriba su usuario o correo electrónico" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<label class="col-sm-12 control-label">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" name="txt_password" class="form-control" placeholder="Inserte su contraseña de acceso" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="text-center">
								<input type="submit" name="btn_login" class="btn btn-outline-warning btn-form-login-register" value="Identificarse">
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="col-sm-offset-3 col-sm-9">
								¿No tienes una cuenta en ShareSounds? 
								<a href="register.php"><p class="text-info">Regístrate Aquí</p></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php
	$site->printFooter();
	?>
</body>

</html>