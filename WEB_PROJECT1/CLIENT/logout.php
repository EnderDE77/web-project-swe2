<?php

    require_once "product.model.php";

    session_start();
    
    if(isset($_SESSION['user_id'])){
        unset($_SESSION['user_id']);
    }

    header("Location: ../LOGIN/SignUp.php");