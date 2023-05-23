<?php

require_once './product.model.php';

$productList = [];
$errors = '';

try {
    $productList = getProducts($connection, $tableName);
} catch (PDOException $error) {
    $errors = $error->getMessage();
}

