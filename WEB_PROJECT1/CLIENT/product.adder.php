<?php
require_once "./product.model.php";
session_start();
$prod = [];
$keys = [];
$quants = [];
$find = FALSE;
foreach($_POST as $key => $value){
    if(gettype($key) == "integer"){
        array_push($keys, $key);
        $find = TRUE;
    }
    else{
        if($value == ''){}
        $value = (int)$value;
        if($value == 0){}
        else if($find == TRUE){
        array_push($quants, $value);
        }
        $find = FALSE;
    }
}
for($i = 0;$i<count($keys);$i++){
    setProductToCart($mySQL, $keys[$i], $quants[$i], $_SESSION['cart_id']);
    lowerProductQuantity($connection, $keys[$i], $quants[$i]);
    modifyPaymentPrice($connection, $_SESSION['payment_id'], $keys[$i], $quants[$i]);
}

header("Location: ./clientview.php");