<?php
$mySQL = require __DIR__ . "/database1.php";
$stmt = $mySQL->prepare("SELECT * FROM user WHERE Email = ?");
$stmt->bind_param("s", $_GET["Email"]);
$stmt->execute();
$result = $stmt->get_result();
$is_available = $result->num_rows === 0;

header("Content-Type: application/json");
echo json_encode(["available" => $is_available]);
?>
