<?php
// Establish database connection and select the database
$host = "localhost";
$dbname = "database";
$username = "root";

$mySQL = new mysqli($host, $username, "", $dbname);

if ($mySQL->connect_error) {
    die("Connect error: " . $mySQL->connect_error);
}

// Check if the contactId parameter is received
if (isset($_POST['contactId'])) {
    $contactId = $_POST['contactId'];
    
    // Update the isRead attribute in the database
    $updateQuery = "UPDATE contact SET isRead = 1 WHERE id = $contactId";
    $mySQL->query($updateQuery);
    exit(); // Stop further execution after the update is done
}

// Close the database connection
$mySQL->close();
?>
