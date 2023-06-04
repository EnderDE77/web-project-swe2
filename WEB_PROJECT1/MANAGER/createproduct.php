<?php
// Check if all required fields are filled in
if (empty($_POST["name"])) {
    die("Please enter a name");
}
if (empty($_POST["quantity"])) {
    die("Please enter a quantity");
}
if (empty($_POST["price"])) {
    die("Please enter a price");
}
if (empty($_FILES["image"])) {
    die("Please upload an image");
}

// Connect to the database
$host = "localhost";
$dbname = "database";
$username = "root";

$mySQL = new mysqli($host, $username, "", $dbname);

if ($mySQL->connect_error) {
    die("Connect error: " . $mySQL->connect_error);
}

if (!$mySQL) {
    die("Failed to connect to the database");
}

// Prepare the SQL statement
$sql = "INSERT INTO product (name, price, quantity, imgPath) VALUES (?, ?, ?, ?)";

$stmt = $mySQL->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL Error: " . $stmt->error);
}

// Process the uploaded image
$imagePath = "uploads/";

if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
    $tempPath = $_FILES["image"]["tmp_name"];
    $fileName = $_FILES["image"]["name"];
    $imagePath = "uploads/" . $fileName;
    move_uploaded_file($tempPath, $imagePath);
}
print_r($imagePath);
$stmt->bind_param("ssss", $_POST["name"], $_POST["price"], $_POST["quantity"], $imagePath);

try {
    // Execute the SQL statement
    if ($stmt->execute()) {
        header("location: listofproducts.php");
        exit();
    } else {
        die("Something went wrong!");
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        die("Something went wrong!");
    } else {
        die("SQL Error: " . $e->getMessage());
    }
}
die($imagePath);
?>