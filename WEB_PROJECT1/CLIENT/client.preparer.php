<?php
    require_once "./product.model.php";
    session_start();
    if(isset($_SESSION["user_id"])){
        $_ = $_SESSION["user_id"];
        $_SESSION["productList_$_"] = [];
        $_SESSION["payment_id_$_"] = createPayment($mySQL, $_SESSION['user_id']);
        $_SESSION["cart_id_$_"] = createCart($mySQL, $_SESSION['user_id'], $_SESSION['payment_id']);
        $_SESSION["show_cart_$_"] = FALSE;
    }
    header("Location: ./clientview.php");