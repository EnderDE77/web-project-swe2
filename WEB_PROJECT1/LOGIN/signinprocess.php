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

        echo "Email already exists";

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




// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Check if form fields are empty
//     if (empty($_POST["Username"])) {
//         echo "Please enter a name";
//         exit;
//     }

//     if (empty($_POST["Email"])) {
//         echo "Please enter an Email";
//         exit;
//     }

//     if (empty($_POST["Password"])) {
//         echo "Please enter a Password";
//         exit;
//     }

//     // Sanitize and validate input
//     $username = filter_var($_POST["Username"], FILTER_SANITIZE_STRING);
//     $email = filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL);
//     $password = $_POST["Password"];

//     if ($email === false) {
//         echo "Invalid email format";
//         exit;
//     }

//     // Hash the password
//     $pass_hash = password_hash($password, PASSWORD_DEFAULT);

//     // Establish database connection
//     $mySQL = require __DIR__ . "/database.php";

//     if (!$mySQL) {
//         die("Failed to connect to the database");
//     }

//     $sql = "INSERT INTO user_data (Username, Email, Password) VALUES (?, ?, ?)";
//     $stmt = $mySQL->prepare($sql);

//     if (!$stmt) {
//         die("SQL Error: " . $mySQL->error);
//     }

//     $stmt->bind_param("sss", $username, $email, $pass_hash);

//     try {
//         if ($stmt->execute()) {
//             header("Location: SignUp.php");
//             exit;
//         } else {
//             echo "Email already exists";
//             exit;
//         }
//     } catch (mysqli_sql_exception $e) {
//         if ($e->getCode() == 1062) {
//             echo "Email already exists";
//         } else {
//             echo "SQL Error: " . $e->getMessage();
//         }
//         exit;
//     }
// }


?>