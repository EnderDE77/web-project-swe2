<?php
require_once "../CLIENT/product.model.php";
session_start();

$message = $_POST['message'];
$name = "";
$email = "";
$user = [];
if(!isset($_SESSION['user_id'])){
    $name = $_POST['message'];
    $email = $_POST['email'];
}
else{
    $user = getUser($connection, $_SESSION['user_id'])[0];
    $name = $user['name']." ".$user['surname'];
    $email = $user['email'];
}
if($message != ''){
    insertContact($mySQL, $name, $email, $message);
}
header("Location: ./Contacts.php");