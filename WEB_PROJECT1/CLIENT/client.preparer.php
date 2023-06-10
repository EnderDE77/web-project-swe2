<?php
    require_once "./product.model.php";
    session_start();
    if(isset($_SESSION["user_id"])){
        $_ = $_SESSION["user_id"];
        $_SESSION["productList_$_"] = [];
        $_SESSION["payment_id_$_"] = createPayment($mySQL, $_);
        $_SESSION["cart_id_$_"] = createCart($mySQL, $_, $_SESSION["payment_id_$_"]);
        $_SESSION["show_cart_$_"] = FALSE;
    }
    echo $_SESSION["user_id"];
    header("Location: ../HOME/index.php");