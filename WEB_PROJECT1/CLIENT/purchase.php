<?php

    require_once "product.model.php";

    session_start();
    
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $_SESSION["productList_$user_id"] = [];
        $_SESSION["payment_id_$user_id"] = createPayment($mySQL, $_SESSION['user_id']);
        $_SESSION["cart_id_$user_id"] = createCart($mySQL, $_SESSION['user_id'], $_SESSION["payment_id_$user_id"]);
    }

    header("Location: ./clientview.php");