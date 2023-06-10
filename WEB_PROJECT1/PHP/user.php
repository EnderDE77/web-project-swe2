<?php
require_once "../CLIENT/product.model.php";
session_start();

$user_id = '';
$user = [];

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user = getUser($connection, $user_id)[0];
    $user_lvl = $user['level'];
}