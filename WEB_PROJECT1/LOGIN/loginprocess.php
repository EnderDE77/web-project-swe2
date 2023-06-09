<?php

require_once "../CLIENT/product.model.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mySQL = require __DIR__ . "/database1.php";
    $email = $mySQL->real_escape_string($_POST["Email"]);

    // This line creates an SQL query string using the sprintf function.
    //  It selects all columns from the "user" table where the "Email" column matches the sanitized email value.
    $sql = sprintf("SELECT * FROM user WHERE Email='%s'", $email);

    $result = $mySQL->query($sql);
    $user = $result->fetch_assoc();


    
    if ($user) {
        if (password_verify($_POST["Password"], $user["password"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];

            // Check user level and redirect accordingly
            $level = $user["level"];
            // echo $level;
            if ($level === "1") {
                $_SESSION['payment_id'] = createPayment($mySQL, $_SESSION['user_id']);
                $_SESSION['cart_id'] = createCart($mySQL, $_SESSION['user_id'], $_SESSION['payment_id']);
                header("Location: ../CLIENT/clientview.php");
            } elseif ($level === "2") {
                header("Location: ../MANAGER/manager.php");
            } elseif($level === "3") {
                header("Location: user.php");
            }
            exit;
        } else {
            die("Invalid LogIn");
        }
    }
}




