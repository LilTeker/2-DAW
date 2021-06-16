<?php

session_start();

require_once '../php_scripts/Web_html.php';

$site = new Web_html();
$message = $_GET["err"];
?>


<!DOCTYPE html>
<html>

<head>
	<?php
	$site->print_head("Prohibido");
	?>
</head>

<body class="d-flex flex-column min-vh-100">
	<div class="container-fluid fix-for-footer">
		<?php
		$site->print_navbar();
		?>

		<div class="row mt-5">
			<div class="col-sm-12 mt-5 text-center">
				<p class="mt-5" style="font-size: 30px;"><?=$message?></p>
			</div>
		</div>

	</div>
	<?php
	$site->printFooter();
	?>
</body>

</html>