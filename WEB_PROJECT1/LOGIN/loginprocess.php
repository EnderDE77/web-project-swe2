<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
{
    $mySQL=require __DIR__ . "/database1.php";
    $sql=sprintf("SELECT * from user WHERE Email='%s'",$mySQL->real_escape_string($_POST["Email"]));


    $result =$mySQL->query($sql);
    $user = $result->fetch_assoc();


if($user){
    if(password_verify($_POST["Password"], $user["password"])){
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("location: user.html");
      exit;
    }
    else{
        die("Invalid LogIn");
    }
}


}



