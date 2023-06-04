<?php

$connection = include './connection.php';
$mySQL = require __DIR__ . "/../LOGIN/database1.php"; //"";


function searchProducts($connection, $search) {
    $search = "%$search%";

    $sql = "SELECT * FROM `product` WHERE name LIKE :search;";

    $statement = $connection->prepare($sql);
    $statement->bindParam(':search', $search);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getProducts($connection) {
    $sql = "SELECT * FROM `product`;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getProductsId($connection, $id) {

    $sql = "SELECT * FROM `product` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function createPayment($connection, $user){
    $dateX = date("Y/m/d");
    $card = 'Card';
    $z = 0;

    // Check if the payment record already exists for the given user
        $sql = "INSERT INTO `payment` (`price`, `date`, `method`, `payingUserId`) VALUE ($z, '$dateX' , '$card', $user)";
    
        $stmt = $connection->query($sql);
        
    $result = $connection->insert_id;
    return $result;
}

function createCart($connection, $user, $payment){

    $sql = "INSERT INTO `cart` (cartPaymentId, cartHolderId) VALUE ($payment,$user);";
    
        $stmt = $connection->query($sql);

    $result = $connection->insert_id;

    return $result;
}

function setProductToCart($connection, $product, $quantity, $cart){

    $product = @$product['id'];

    $sql = "INSERT INTO `cartcontains` VALUES ($product,$cartId,$quantity);";

    try {
        $connection->exec($sql);
    } catch (PDOException $error) {
        throw $error;
    }
}

function getUser($connection, $id){
    $sql = "SELECT * FROM `user` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPayment($connection, $id){
    $sql = "SELECT * FROM `payment` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function getPayment($connection, $id){
    $sql = "SELECT * FROM `cart` WHERE id = $id;";

    $statement = $connection->prepare($sql);
    try {
        $statement->execute();
    } catch (PDOException $error) {
        throw $error;
    }
    
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}