<?php

require_once "./product.model.php";

session_start();
$prod = [];
$keys = [];
$quants = [];
$find = FALSE;

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $payment_id = $_SESSION["payment_id_$user_id"];
    $cart_id = $_SESSION["cart_id_$user_id"];
}


foreach ($_POST as $key => $value) {
    if (is_numeric($key)) {
        array_push($keys, $key);
        $find = TRUE;
     }
    else{
        if($find == FALSE) continue;
        if($value == ''){}
        else{
            $value = (int)$value;
            array_push($quants,$value);
        }
        $find = FALSE;
    }
var_dump($keys);
var_dump($quants);
echo "<br>";
}
for ($i = 0; $i < count($keys); $i++) {
    if($quants[$i] == 0 || getQuantity($connection, $keys[$i]) < $quants[$i])continue;
    setProductToCart($mySQL, $keys[$i], $quants[$i], $cart_id);
    lowerProductQuantity($connection, $keys[$i], $quants[$i]);
    modifyPaymentPrice($connection, $payment_id, $keys[$i], $quants[$i]);
}
header("Location: ./clientview.php");

