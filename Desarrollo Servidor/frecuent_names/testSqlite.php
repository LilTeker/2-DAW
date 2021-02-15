<?php

$link = new PDO('sqlite:dbTest.db');

$link->exec("CREATE TABLE IF NOT EXISTS employees(
                    id INTEGER PRIMARY KEY, 
                    name TEXT,
                    role TEXT)");

// Data to insert.
$data = array(
    array('name' => 'joe', 'role' => 'CEO'),
    array('name' => 'Amy', 'role' => 'CFO'),
);

// Prepare INSERT statement.
$insert = "INSERT INTO employees (name, role) VALUES (:name, :role)";
$stmt = $link->prepare($insert);

// Insert data in table.
foreach($data as $row) {

    // Bind parameters to statement variables.
    //    List of data type: https://www.php.net/manual/en/pdo.constants.php
    $stmt->bindParam(':name', $row['name'], PDO::PARAM_STR);
    $stmt->bindParam(':role', $row['role'], PDO::PARAM_STR);

    // Execute statement.
    $stmt->execute();
}

?>