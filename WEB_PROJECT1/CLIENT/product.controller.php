<?php
require_once './product.model.php';
session_start();


$search = '';
$productList = [];
$chosenProduct = [];
$chosenProducts = [];
$errors = '';
$user = [];
$payment = [];
$cart = [];

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user = getUser($connection, $user_id)[0];
    $payment_id = createPayment($mySQL, $user_id);
    $payment = getPayment($connection,$payment_id)[0];
    $cart_id = createCart($mySQL, $user_id, $payment_id);
    $cart = getCart($connection,$cart_id)[0];
}

if((isset($_POST['name']))){

        $prod_id = $_GET['chosenProd'];
        $quantity = $_GET['chosenQuant'];
        setProductToCart($mySQL, $prod_id, $quantity, $cart_id);
    }

try {
    $productList = getProducts($connection);
} catch (PDOException $error) {
    $errors = $error->getMessage();
}
if(isset($chosenProducts[0])){
    var_dump($chosenProducts);
}
