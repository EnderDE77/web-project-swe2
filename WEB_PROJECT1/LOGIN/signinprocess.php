<?php

// kontrrollojme nqs ka errore tna i kapi php-ja
if(empty($_POST["Username"]))
{
    echo "Please enter a name";
}

if(empty($_POST["Email"]))
{
    echo "Please enter an Email";
}

if(empty($_POST["Password"]))
{
    echo "Please enter a Password";
}


// E rujm si hash
$pass_hash=password_hash($_POST["Password"], PASSWORD_DEFAULT);

// bem lidhjen me databazen
$mySQL=require __DIR__ . "/database.php";

if(!$mySQL)
{
    die("Failed to connect to the database");
}

$sql="INSERT INTO user_data(Username,Email,Password) VALUES (?,?,?)";

$stmt = $mySQL->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL Error: " . $stmt->error);
}

$stmt->bind_param("sss", $_POST["Username"], $_POST["Email"], $pass_hash);

try {
    if ($stmt->execute()) {
        header("location: SignUp.php");
    } else {
        echo "Failed to insert data.";
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        die("Email already exists");
    } else {
        die("SQL Error: " . $e->getMessage());
    }
}


// kur ska errore
echo"OKOKOK";
?>