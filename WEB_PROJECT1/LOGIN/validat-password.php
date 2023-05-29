<?php
$mySQL = require __DIR__ . "/database1.php";

$email = $_GET["Email"];
$password = $_GET["Password"]; // Assuming the password is sent via GET for demonstration purposes

$stmt = $mySQL->prepare("SELECT Password FROM user WHERE Email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Email not found
    $is_valid = false;
} else {
    $row = $result->fetch_assoc();
    $stored_password = $row["Password"];

    // Compare stored password with user-provided password
    $is_valid = password_verify($password, $stored_password);
}

header("Content-Type: application/json");
echo json_encode(["valid" => $is_valid]);

?>
