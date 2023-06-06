<?php
require_once './product.model.php';
session_start();


$search = '';
$productList = [];
$errors = '';
$user = [];
$payment = [];
$cart = [];

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $payment_id = $_SESSION['payment_id'];
    $cart_id = $_SESSION['cart_id'];
}

try {
    $user = getUser($connection, $user_id)[0];
    $payment = getPayment($connection,$payment_id)[0];
    $cart = getCart($connection,$cart_id)[0];
    $chosenProducts = getChosenProducts($connection,$cart_id);
    $productList = getProducts($connection);
} catch (PDOException $error) {
    $errors = $error->getMessage();
}
