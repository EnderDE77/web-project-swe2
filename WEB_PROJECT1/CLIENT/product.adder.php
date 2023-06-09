<?php

// require_once "./product.model.php";

// session_start();
// $prod = [];
// $keys = [];
// $quants = [];
// $find = FALSE;

// foreach ($_POST as $key => $value) {
//     if (is_numeric($key)) {
//         array_push($keys, $key);
//         $find = TRUE;
//      }
//     else{
//         if($find == FALSE) continue;
//         if($value == ''){}
//         else{
//             $value = (int)$value;
//             array_push($quants,$value);
//         }
//         $find = FALSE;
//     }
// var_dump($keys);
// var_dump($quants);
// echo "<br>";
// }
// for ($i = 0; $i < count($keys); $i++) {
//     if($quants[$i] == 0)continue;
//     setProductToCart($mySQL, $keys[$i], $quants[$i], $_SESSION['cart_id']);
//     lowerProductQuantity($connection, $keys[$i], $quants[$i]);
//     modifyPaymentPrice($connection, $_SESSION['payment_id'], $keys[$i], $quants[$i]);
// }
// header("Location: ./clientview.php");





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
    } else {
        if ($find == FALSE) continue;
        if ($value == '') { }
        else {
            $value = (int)$value;
            array_push($quants, $value);
        }
        $find = FALSE;
    }
    var_dump($keys);
    var_dump($quants);
    echo "<br>";
}

// Validate quantities before updating
$validQuantities = validateQuantities($mySQL, $keys, $quants, $_SESSION['cart_id']);

for ($i = 0; $i < count($keys); $i++) {
    if ($validQuantities[$i] === 0) continue;
    setProductToCart($mySQL, $keys[$i], $validQuantities[$i], $_SESSION['cart_id']);
    lowerProductQuantity($connection, $keys[$i], $validQuantities[$i]);
    modifyPaymentPrice($connection, $_SESSION['payment_id'], $keys[$i], $validQuantities[$i]);
}

header("Location: ./clientview.php");

// Function to validate quantities
function validateQuantities($connection, $keys, $quants, $cartId)
{
    $validQuantities = [];

    for ($i = 0; $i < count($keys); $i++) {
        $productId = $keys[$i];
        $requestedQuantity = $quants[$i];

        // Retrieve the current quantity from the database
        $currentQuantity = getProductQuantity($connection, $productId);

        // Calculate the remaining quantity after deducting the requested quantity
        $remainingQuantity = $currentQuantity - $requestedQuantity;

        // Check if the remaining quantity is greater than or equal to zero
        if ($remainingQuantity >= 0) {
            $validQuantities[$i] = $requestedQuantity;
        } else {
            // Insufficient quantity, set to zero
            $validQuantities[$i] = 0;
        }
    }

    return $validQuantities;
}

