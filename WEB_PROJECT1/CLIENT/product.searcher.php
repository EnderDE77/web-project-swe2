<?php

require_once "./product.model.php";

session_start();

$search = ""; 

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $payment_id = $_SESSION["payment_id_$user_id"];
    $cart_id = $_SESSION["cart_id_$user_id"];
}

if(isset($_GET['searchBar'])){
$search = $_GET['searchBar'];
}
var_dump($search);
try {
    $_SESSION["productList_$user_id"] = searchProducts($connection, $search);
} catch (PDOException $error) {
    $errors = $error->getMessage();
}
var_dump($_SESSION["productList_$user_id"]);
header("Location: ./clientview.php");

