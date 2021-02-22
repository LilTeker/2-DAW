<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Ejemplo de uso de servicio web</title>
</head>
<body>
<?php
$client = new SoapClient(null, array(
        'uri' => 'http://localhost/soap-automoviles/',
        'location' => 'http://localhost/soap-automoviles/service-automoviles.php'
    )
);

$marcas = $client->ObtenerMarcas();
?>
<h1>Listado de marcas y modelos disponibles</h1>
<ul>
    <?php
    foreach ($marcas as $key => $value) {
        ?>
        <li><?= $value . "\n" ?>
            <ul>
                <?php
                $modelos = $client->ObtenerModelos($key);
                foreach ($modelos as $m) {
                    ?>
                    <li><?= $m ?></li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    }
    ?>
</ul>
</body>
</html>
