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
				<button id="new-pl-button" class="btn btn-outline-warning mx-2">Nueva Playlist</button>
				<button id="new-pl-button" class="btn btn-outline-warning mx-2">Compartir</button>
				<button id="new-pl-button" class="btn btn-outline-warning mx-2">Importar</button>
				<button id="new-pl-button" class="btn btn-outline-warning mx-2">Exportar</button>
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