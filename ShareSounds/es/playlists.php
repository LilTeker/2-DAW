<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();


if (!isset($_SESSION['user_login']))	//check unauthorize access
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
	<!--<script src="../js/jquery.serializeToJSON.js"></script>-->
	<script src="../js/playlists.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">

	<div class="container-fluid fix-for-footer">

		<?php
		$site->print_navbar();
		?>
		<div class="row" id="container-navbar-playlists">
			<div class="col-sm-12 col-md-4">
				<h3 class="header-pl-text">Tus Playlists</h3>
			</div>
			<div class="col-sm-12 col-md-8 d-flex justify-content-end">
				<button type="button" data-toggle="modal" data-target="#newPlModal" id="new-pl-button" class="btn btn-outline-warning mx-2">Nueva Playlist</button>
				<button type="button" data-toggle="modal" data-target="#shareModal" id="share-button" class="btn btn-outline-warning mx-2">Compartir</button>
			</div>
		</div>
		<div class="row" id="container-list-playlists"></div>


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
									<div id="preview"><img src="../img/default_ss.svg" class="img-pl" alt="preview" /></div>
									<p class="mt-3">Si no se añade ninguna imagen se usará la imagen por defecto :)</p>
								</div>
								<div class="col-sm-12 err" id="err"></div>
								<div class="col-sm-12 success" id="success"></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-outline-warning border-dark">Crear</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!--Modal for share button-->
		<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form id="shareForm">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Buscar Playlists</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">

								<div class="form-group col-sm-12">
									<label for="search_pl_name">Nombre de la Playlist</label>
									<input type="text" class="form-control" id="search_pl_name" name="search_pl_name" placeholder="Rock Español">
								</div>
								<div class="form-group col-sm-12">
									<label for="search_user_pl">Nombre del usuario creador</label>
									<input type="text" class="form-control" id="search_user_pl" name="search_user_pl" placeholder="MúsicoGuay365">
								</div>

								<div class="col-sm-12 err" id="err_shareForm"></div>

								<hr class="searchSeparator">

								<div class="col-sm-12">
									<ul id="shareResults"></ul>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-outline-warning border-dark">Buscar</button>
						</div>
					</form>
				</div>
			</div>
		</div>



		<!--Modal to edit pl-->
		<div class="modal fade" id="editPl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form id="editPlForm">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Editar Playlists</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">

								<div class="form-group col-sm-12">
									<label for="editPlName">Nuevo nombre de la playlist</label>
									<input type="text" class="form-control" id="editPlName" name="editPlName" placeholder="Rock Español">
								</div>
								<div class="form-group col-sm-12">
									<label for="editPlPrivacity">Privacidad:</label>
									<select class="form-control" name="editPlPrivacity" id="editPlPrivacity">
										<option value="0">Pública</option>
										<option value="1">Privada</option>
									</select>
								</div>
								<div class="col-sm-12 err" id="err_editForm"></div>
								<div class="col-sm-12 success" id="success_editForm"></div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="submit" class="btn btn-outline-warning border-dark">Aceptar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="error-msg"></div>

	</div>
	<?php
	$site->printFooter();
	?>
</body>

</html>