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

$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
$table = "CREATE TABLE IF NOT EXISTS country (
  code CHAR(3) NOT NULL,
  name VARCHAR(35) NOT NULL,
  pop INT NOT NULL,
  rank INT NOT NULL,
  PRIMARY KEY (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

$pdo->query($table);

// https://csv.thephpleague.com/9.0/#importing-csv-records-into-a-database-table
$stmt = $pdo->prepare("INSERT INTO country (code, name, pop, rank) VALUES (:code, :name, :pop, :rank)");

$csv = Reader::createFromPath('population2019.csv')->setHeaderOffset(0)->setDelimiter(';');

//by setting the header offset we index all records
//with the header record and remove it from the iteration

foreach ($csv as $record) {
    print_r($record);
    echo "<br>";
    //Do not forget to validate your data before inserting it in your database
    $stmt->bindValue(':code', $record['code'], PDO::PARAM_STR);
    $stmt->bindValue(':name', $record['name'], PDO::PARAM_STR);
    $stmt->bindValue(':pop', $record['pop'], PDO::PARAM_INT);
    $stmt->bindValue(':rank', $record['rank'], PDO::PARAM_INT);
    $stmt->execute();
}

