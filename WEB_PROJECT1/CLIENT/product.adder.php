<?php
require_once "./product.model.php";
session_start();
$prod = [];
$keys = [];
$quants = [];
$find = FALSE;

foreach ($_POST as $key => $value) {
    if (is_numeric($key)) {
        array_push($keys, $key);
        $find = TRUE;
     } //else {
    //     if ($value == '') {}
    //     else{
    //         $value = (int)$value;
    //         if ($value == 0){} 
    //         elseif ($find == TRUE) {
    //             array_push($quants, $value);
    //         }
    //     }
    //     $find = FALSE;
    //}
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
    if($quants[$i] == 0)continue;
    setProductToCart($mySQL, $keys[$i], $quants[$i], $_SESSION['cart_id']);
    lowerProductQuantity($connection, $keys[$i], $quants[$i]);
    modifyPaymentPrice($connection, $_SESSION['payment_id'], $keys[$i], $quants[$i]);
}
header("Location: ./clientview.php");
