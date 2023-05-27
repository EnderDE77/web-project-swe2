<?php

require_once './product.model.php';

$search = '';
$productList = [];
$chosenProduct = [];
$chosenProducts = [];
$errors = '';

if((isset($_GET['name'])) &&
   isset($_GET['quantity'])){

        $search = $_GET['name'];
        $quantity = $_GET['quantity'];
        $chosenProduct = getProductsId($connection, $search);
        setProductToCart($connection, $chosenProduct, $quantity, $cartNo);
    }

try {
    $productList = getProducts($connection);
} catch (PDOException $error) {
    $errors = $error->getMessage();
}

var_dump($chosenProducts);

