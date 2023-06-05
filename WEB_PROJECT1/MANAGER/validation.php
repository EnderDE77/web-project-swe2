<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    // Perform validation
    $errors = array();

    // Validate name field
    if (empty($name)) {
        $errors['nameError'] = "Please enter a name";
    }

    // Validate quantity field
    if (empty($quantity)) {
        $errors['quantityError'] = "Please enter a quantity";
    }

    // Validate price field
    if (empty($price)) {
        $errors['priceError'] = "Please enter a price";
    }

    // Validate image field
    if (empty($image)) {
        $errors['imageError'] = "Please upload an image";
    }

    // Check if there are any errors
    if (!empty($errors)) {
        // Return the errors as a JSON response
        header('Content-Type: application/json');
        echo json_encode(array('error' => true, 'errors' => $errors));
        exit;
    }

    // If validation passes, perform further processing or database operations here

    // Return a success response if everything is successful
    header('Content-Type: application/json');
    echo json_encode(array('error' => false));
}
?>
