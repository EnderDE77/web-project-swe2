<?php

$connection = include './connection.php';

// $search = '; DROP Tabale 'product'';
$tableName = 'product';

function searchProducts($connection, $tableName, $search) {
    $search = "%$search%";

    // placeholder 1 ?
    // placeholder 2 :search
    $sql = "SELECT * FROM $tableName WHERE name LIKE :search;";
    // $sql = "SELECT * FROM $tableName WHERE name LIKE %:search%";

    // $sql = "SELECT * FROM $tableName WHERE name LIKE %$search%";
    // $sql = "SELECT * FROM $tableName WHERE name LIKE %; DROP Table product;%";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':search', $search);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    // $statement->execute([':search' => $search]);
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}
function getProducts($connection, $tableName) {
    // placeholder 1 ?
    // placeholder 2 :search
    $sql = "SELECT * FROM $tableName";
    // $sql = "SELECT * FROM $tableName WHERE name LIKE %:search%";

    // $sql = "SELECT * FROM $tableName WHERE name LIKE %$search%";
    // $sql = "SELECT * FROM $tableName WHERE name LIKE %; DROP Table product;%";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    // $statement->execute([':search' => $search]);
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}