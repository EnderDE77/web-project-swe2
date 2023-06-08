<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
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
