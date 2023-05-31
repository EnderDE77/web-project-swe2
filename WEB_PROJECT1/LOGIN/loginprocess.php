<?php

// if($_SERVER["REQUEST_METHOD"]==="POST")
// {
//     $mySQL=require __DIR__ . "/database1.php";
//     $sql=sprintf("SELECT * from user WHERE Email='%s'",$mySQL->real_escape_string($_POST["Email"]));


//     $result =$mySQL->query($sql);
//     $user = $result->fetch_assoc();


// if($user){
//     if(password_verify($_POST["Password"], $user["password"])){
//       session_start();
//       session_regenerate_id();
//       $_SESSION["user_id"] = $user["id"];
//       header("location: user.php");
//       exit;
//     }
//     else{
//         die("Invalid LogIn");
//     }
// }
// }


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mySQL = require __DIR__ . "/database1.php";
    $email = $mySQL->real_escape_string($_POST["Email"]);
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
                header("Location: client.php");
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




