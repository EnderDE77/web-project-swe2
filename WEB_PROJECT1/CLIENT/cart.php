<?php

session_start();


if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
}

if($_SESSION["show_cart_$user_id"] == FALSE) $_SESSION["show_cart_$user_id"] = TRUE;
else $_SESSION["show_cart_$user_id"] = FALSE;

header("Location: ./clientview.php");