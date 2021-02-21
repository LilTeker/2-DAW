<?php
/*
 * create country table, insert rows importing csv file using:
 * https://csv.thephpleague.com/
 * composer require league/csv 
 *
 * population data from https://datacatalog.worldbank.org/dataset/population-ranking
 *
 * IES Virgen del Carmen de Jaén
 * Desarrollo Web en Entorno Servidor 2º DAW
 * Rafael García Cabrera
 */

require __DIR__ . '/vendor/autoload.php';

use League\Csv\Reader;

$pdo = new PDO('sqlite:names.db');
$table = "CREATE TABLE IF NOT EXISTS names (
  nombre VARCHAR(70) NOT NULL,
  frecuencia INT NOT NULL,
  fmil FLOAT(20) NOT NULL,
  sexo VARCHAR(70) NOT NULL,
  PRIMARY KEY (nombre)
)";

$pdo->exec($table);

// https://csv.thephpleague.com/9.0/#importing-csv-records-into-a-database-table
// Preparo la sentencia
$stmt = $pdo->prepare("INSERT INTO names (nombre, frecuencia, fmil, sexo) VALUES (:nombre, :frecuencia, :fmil, :sexo)");



//Añado los hombres a la base de datos

$csvHombres = Reader::createFromPath('nombres_100_hombres.csv')->setHeaderOffset(0)->setDelimiter(':');

foreach ($csvHombres as $record) {
    print_r($record);
    echo "<br>";
    //Do not forget to validate your data before inserting it in your database
    $stmt->bindValue(':nombre', $record['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(':frecuencia', $record['frecuencia'], PDO::PARAM_INT);
    $stmt->bindValue(':fmil', $record['fmil'], PDO::PARAM_STR);
    $stmt->bindValue(':sexo', "hombre", PDO::PARAM_STR);
    $stmt->execute();
}



//Añado las mujeres a la base de datos

$csvMujeres = Reader::createFromPath('nombres_100_mujeres.csv')->setHeaderOffset(0)->setDelimiter(':');

foreach ($csvMujeres as $record) {
    print_r($record);
    echo "<br>";
    //Do not forget to validate your data before inserting it in your database
    $stmt->bindValue(':nombre', $record['nombre'], PDO::PARAM_STR);
    $stmt->bindValue(':frecuencia', $record['frecuencia'], PDO::PARAM_INT);
    $stmt->bindValue(':fmil', $record['fmil'], PDO::PARAM_STR);
    $stmt->bindValue(':sexo', "mujer", PDO::PARAM_STR);
    $stmt->execute();
}

