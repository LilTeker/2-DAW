<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();


if (!isset($_SESSION['user_login']))	//check unauthorize user not access in "welcome.php" page
{
	header("location: index.php");
}



?>

<!DOCTYPE html>
<html>

<head>
	<?php
	$site->print_head("Tus Playlists");
	?>
	<script src="../js/jquery.serializeToJSON.js"></script>
	<script src="../js/playlists.js"></script>
</head>

<body>

	<div class="container-fluid">

		<?php
		$site->print_navbar();
		?>
		<div class="row" id="container-navbar-playlists">
			<div class="col-sm-12 col-md-4">
				<h3 class="header-pl-text">Tus Playlists</h3>
			</div>
			<div class="col-sm-12 col-md-8 d-flex justify-content-end">
				<button type="button" data-toggle="modal" data-target="#newPlModal" id="new-pl-button" class="btn btn-outline-warning mx-2">Nueva Playlist</button>
				<button type="button" class="btn btn-outline-warning mx-2">Compartir</button>
				<button type="button" class="btn btn-outline-warning mx-2">Importar</button>
				<button type="button" class="btn btn-outline-warning mx-2">Exportar</button>
			</div>
		</div>
		<div class="row" id="container-list-playlists">
			<div class="col-sm-12 item-pl">
				<div class="row ">
					<div class="col-md-2">
						<img src="../img/default_ss.svg" class="img-pl" alt="default_pl_img" />
					</div>
					<div class="col-md-8">
						<p class="text-pl">Playlist de prueba</p>
					</div>
					<div class="col-md-1">
						<i class="fas fa-trash-alt pl-crud-icon"></i>
					</div>
					<div class="col-md-1">
						<i class="fas fa-pen-square pl-crud-icon"></i>
					</div>
				</div>
			</div>
			<div class="col-sm-12 item-pl">
				<div class="row ">
					<div class="col-md-2">
						<img src="../img/default_ss.svg" class="img-pl" alt="default_pl_img" />
					</div>
					<div class="col-md-8">
						<p class="text-pl">Playlist de prueba</p>
					</div>
					<div class="col-md-1">
						<i class="fas fa-trash-alt pl-crud-icon"></i>
					</div>
					<div class="col-md-1">
						<i class="fas fa-pen-square pl-crud-icon"></i>
					</div>
				</div>
			</div>
			<div class="col-sm-12 item-pl">
				<div class="row ">
					<div class="col-md-2">
						<img src="../img/default_ss.svg" class="img-pl" alt="default_pl_img" />
					</div>
					<div class="col-md-8">
						<p class="text-pl">Playlist de prueba</p>
					</div>
					<div class="col-md-1">
						<i class="fas fa-trash-alt pl-crud-icon"></i>
					</div>
					<div class="col-md-1">
						<i class="fas fa-pen-square pl-crud-icon"></i>
					</div>
				</div>
			</div>
		</div>


		<!--Modal window for new playlist-->

		<div class="modal fade" id="newPlModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form id="newPlForm">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Añadir Playlist</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="form-group col-sm-12">
									<label for="pl_name">Nombre</label>
									<input type="text" class="form-control" id="pl_name" name="pl_name" placeholder="Hip Hop">
								</div>
								<div class="form-group col-sm-12">
									<label for="access_type">Privacidad:</label>
									<select class="form-control" name="access_type" id="access_type">
										<option value="0">Pública</option>
										<option value="1">Privada</option>
									</select>
								</div>
								<div class="form-group col-sm-12">
									<label for="access_type">Añade Una Imagen a la Lista:</label>
									<input type="file" class="form-control-file" accept="image/*" id="pl_img" name="pl_img">
									<div id="preview"><img src="../img/default_ss.svg" class="img-pl" alt="preview"/></div>
									<p class="mt-3">Si no se añade ninguna imagen se usará la imagen por defecto :)</p>
								</div>
								<div class="col-sm-12" id="err"></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-primary">Crear</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



	<!--
	<div class="wrapper mt-5">
		<div class="container">

			<div class="col-lg-12">
				<center>
					<h2>
						<?php



						$id = $_SESSION['user_login'];

						$select_stmt = $db->prepare("SELECT * FROM user WHERE user_id=:uid");
						$select_stmt->execute(array(":uid" => $id));

						$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

						if (isset($_SESSION['user_login'])) {
						?>
							Welcome,
						<?php
							echo $row['username'];
						}
						?>
					</h2>
				</center>

			</div>

		</div>
	</div>
	-->

</body>

</html>