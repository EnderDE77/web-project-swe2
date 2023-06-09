<?php
$mySQL = require __DIR__ . "/database1.php";

$stmt = $mySQL->prepare("SELECT * FROM user WHERE Email = ?");
$stmt->bind_param("s", $_GET["Email"]);
$stmt->execute();
$result = $stmt->get_result();
$is_available = $result->num_rows === 0;



// sets the HTTP response header to specify that the content type of the response is JSON.
//  It ensures that the client receiving the response knows how to interpret the data.
header("Content-Type: application/json");


echo json_encode(["available" => $is_available]);
?>
