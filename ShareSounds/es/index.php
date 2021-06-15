<?php

session_start();

require_once '../php_scripts/connection.php';
require_once '../php_scripts/Web_html.php';

$site = new Web_html();

?>

<!DOCTYPE html>
<html>

<head>
	<?php
	$site->print_head("Inicio");
	?>
</head>


<body class="d-flex flex-column min-vh-100">
	<div class="container-fluid fix-for-footer">

		<?php
		$site->print_navbar();
		?>

		<div class="row mt-5" id="portada_container">

			<div class="col-md-7">
				<h1 id="title-index"><span id="sharesounds-title">ShareSounds</span> <br>Tu Música en Un Solo Lugar</h1>
			</div>
			<div class="col-md-5 mp-0">
				<img id="index-img" src="/img/portadaindex-cropped.jpg" alt="girl listening to music">
			</div>
		</div>


		<div class="row" id="advantages-container">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 mb-5">
						<h2>Toda la <span class="orange">sencillez</span> del mundo para organizar tu <span class="orange">música</span></h2>
					</div>

					<div class="col-sm-6 col-md-4 py-2">
						<div class="card h-100">
							<div class="card-body">
								<h3 class="card-title"><i class="fas fa-marker icon-features"></i> <br /> Personalización</h3>
								<p class="card-text">Personaliza tus listas de reproducción, dándoles el nombre que quieras
									y eligiendo una imagen a tu gusto
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 py-2">
						<div class="card h-100 orange-bg">
							<div class="card-body">
								<h3 class="card-title"><i class="fas fa-star icon-features"></i><br>Multitud de Fuentes</h3>
								<p class="card-text">Podrás añadir tu música de distintos sitios web<br /> ¿Por qué no pruebas con youtube
									y soundcloud para empezar?
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4 py-2">
						<div class="card h-100">
							<div class="card-body">
								<h3 class="card-title"><i class="fas fa-tablet-alt icon-features"></i><br>Accesible</h3>
								<p class="card-text">Puedes acceder a tus listas desde cualquier dispositivo, desde tu teléfono móvil
									hasta el televisor de tu salón.
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 py-2">
						<div class="card h-100">
							<div class="card-body">
								<h3 class="card-title"><i class="fas fa-share-alt icon-features"></i><br>Social</h3>
								<p class="card-text">Comparte tus listas con tus amigos, podrás elegir que lista reservarte
									para tí mismo y que otras listas compartir con los usuarios.
								</p>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6 py-2">
						<div class="card h-100">
							<div class="card-body">
								<h3 class="card-title"><i class="far fa-hand-peace icon-features"></i><br>Sencillo</h3>
								<p class="card-text">Lo más importante de todo, ¡Sin quebraderos de cabeza!, podrás hacer
									todo esto de una forma increíblemente sencilla
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row py-5" id="compatible-services">
			<div class="col-sm-12 mb-5">
				<h3>Nuestros Servicios Compatibles</h3>
			</div>
			<div class="col-sm-12 col-md-6">
				<div class="row">
					<div class="col-sm-6">
						<h4>Youtube</h4>
						<i class="fab fa-youtube"></i>
					</div>
					<div class="col-sm-6">
						<h4>SoundCloud</h4>
						<i class="fab fa-soundcloud"></i>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
				<h4>¿No encuentras tu servicio de música o vídeo favorito?</h4>
				<p>No te preocupes, trabajamos a diario tratando de ampliar nuestras posibilidades,
					si esperas un poco es muy posible que tu aplicación de streaming the música favorita
					acabe en esta lista <i class="far fa-smile-wink"></i>
				</p>
			</div>
		</div>
		<div class="row py-5" id="first-steps">
			<div class="col-sm-12">
				<h3>Primeros Pasos</h3>
			</div>
			<div class="col-sm-12 py-5">
				<div class="row">
					<div class="col-sm-12 col-md-6">
						<h4>¿No sabes por dónde empezar?</h4>
						<p>Puedes comenzar por leer nuestra guía para los usuarios novatos, ahí
							explicamos como funciona nuestra aplicación por completo, no se escapa ningún detalle,
							así que si no sabes por dónde empezar, aquí te presentamos tu mejor opción.
						</p>
					</div>
					<div class="col-sm-12 col-md-6">
						<a href="howTo.php"><img id="img-firststeps" src="/img/first-steps.png" alt="first steps image"></a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 mt-5">
				<h4>Si eres de esos confiados a los que les da igual todo...</h4>
				<p class="mb-3">Puedes probar la aplicación directamente registrándote en el sistema, ¡Esperamos que
					disfrutes!
				</p>
				<a class="btn btn-outline-warning border-dark m-2 my-sm-0" href="register.php">Registrarse</a>
			</div>
		</div>

	</div>

	<?php
	$site->printFooter();
	?>
</body>

</html>