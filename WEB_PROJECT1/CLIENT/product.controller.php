<?php
require_once './product.model.php';
session_start();

$chosenProductsLen = 0;
$showCart = FALSE;
$search = '';
$errors = '';
$user = [];
$payment = [];
$cart = [];
$productList = [];

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $payment_id = $_SESSION["payment_id_$user_id"];
    $cart_id = $_SESSION["cart_id_$user_id"];
    $showCart = $_SESSION["show_cart_$user_id"];
    $productList = $_SESSION["productList_$user_id"];
}

try {
    if(isset($productList[0])){}
    else $productList = getProducts($connection);
    $user = getUser($connection, $user_id)[0];
    $payment = getPayment($connection,$payment_id)[0];
    $cart = getCart($connection,$cart_id)[0];
    $chosenProducts = getChosenProducts($connection,$cart_id);
    if(isset(getNoChosenProducts($connection,$cart_id)[0][0])){
        $chosenProductsLen = getNoChosenProducts($connection,$cart_id)[0][0];
}} catch (PDOException $error) {
    $errors = $error->getMessage();
}
