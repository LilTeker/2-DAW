<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();

if (isset($_REQUEST['btn_register'])) {
	$username	= strip_tags($_REQUEST['txt_username']);
	$email		= strip_tags($_REQUEST['txt_email']);
	$password	= strip_tags($_REQUEST['txt_password']);

	if (empty($username)) {
		$errorMsg[] = "Por favor inserte el nombre de usuario";
	} else if (empty($email)) {
		$errorMsg[] = "Por favor inserte su correo electrónico";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errorMsg[] = "Por favor inserte un correo electrónico válido";
	} else if (empty($password)) {
		$errorMsg[] = "Por favor inserte una contraseña";
	} else if (strlen($password) < 6) {
		$errorMsg[] = "La contraseña debe contener como mínimo 6 caracteres";
	} else {
		try {
			$select_stmt = $db->prepare("SELECT username, email FROM user 
										WHERE username=:uname OR email=:uemail");

			$select_stmt->execute(array(':uname' => $username, ':uemail' => $email));
			$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

			if ($row["username"] == $username) {
				$errorMsg[] = "Lo sentimos, el nombre de usuario ya existe";
			} else if ($row["email"] == $email) {
				$errorMsg[] = "Lo sentimos, el correo electrónico ya existe";
			} else if (!isset($errorMsg)) {
				$new_password = password_hash($password, PASSWORD_DEFAULT);

				$insert_stmt = $db->prepare("INSERT INTO user	(username,email,password) VALUES
																(:uname,:uemail,:upassword)");

				if ($insert_stmt->execute(array(
					':uname'	=> $username,
					':uemail'	=> $email,
					':upassword' => $new_password
				))) {

					$registerMsg = "Registrado correctamente. Para identificarse haga click en el boton de Identificarse";
				}
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<?php
	$site->print_head("Regístrate");
	?>
</head>

<body class="d-flex flex-column min-vh-100">
	<div class="container-fluid fix-for-footer">
		<?php
		$site->print_navbar();
		?>


		<div class="row mb-5" id="container-navbar-playlists">
			<div class="col-sm-12 col-md-4">
				<h3 class="header-pl-text">Registrarse</h3>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-sm-12 text-center">
				<h3>Formulario de Registro</h3>
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
					if (isset($registerMsg)) {
						?>
						<div class="alert alert-success">
							<strong><?php echo $registerMsg; ?></strong>
						</div>
					<?php
					}
					?>
					<div class="row mt-5">

						<div class="form-group col-sm-12">
							<label class="col-sm-12 control-label">Nombre de Usuario</label>
							<div class="col-sm-12">
								<input type="text" name="txt_username" class="form-control" placeholder="Escriba su nombre de usuario" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<label class="col-sm-12 control-label">Correo Electrónico</label>
							<div class="col-sm-12">
								<input type="text" name="txt_email" class="form-control" placeholder="Escriba su correo electrónico" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<label class="col-sm-12 control-label">Contraseña</label>
							<div class="col-sm-12">
								<input type="password" name="txt_password" class="form-control" placeholder="Escriba su contraseña" />
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="col-sm-offset-3 col-sm-9">
								<input type="submit" name="btn_register" class="btn btn-outline-warning btn-form-login-register" value="Registrarse">
							</div>
						</div>

						<div class="form-group col-sm-12">
							<div class="col-sm-offset-3 col-sm-9">¿Ya tienes una cuenta registrada en ShareSounds?
								<a href="index.php">
									<p class="text-info">Identificarse</p>
								</a>
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