<?php

$connection = include './connection.php';

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
function setProductToCart($connection, $product, $quantity, $cartId){

    $product = @$product['id'];

    $sql = "INSERT INTO `cartcontains` VALUES ($product,$cartId,$quantity);";

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