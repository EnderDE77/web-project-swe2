 <?php


// Check if all required fields are filled in
if(empty($_POST["Level"]))
{
    die("Please enter a level");
}
if(empty($_POST["Name"]))
{
    die("Please enter a name");
}
if(empty($_POST["Surname"]))
{
    die("Please enter a surname");
}
if(empty($_POST["Email"]))
{
    die("Please enter an email");
}
if(empty($_POST["Password"]))
{
    die("Please enter a password");
}

// Hash the password using bcrypt
$pass_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);

// Connect to the database
$mySQL = require __DIR__ . "/database1.php";

if(!$mySQL)
{
    die("Failed to connect to the database");
}

// Prepare the SQL statement
$sql = "INSERT INTO user (level, name, surname, email, password) VALUES (?, ?, ?, ?, ?)";

$stmt = $mySQL->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL Error: " . $stmt->error);
}

$stmt->bind_param("sssss", $_POST["Level"], $_POST["Name"], $_POST["Surname"], $_POST["Email"], $pass_hash);

try {
    // Execute the SQL statement
    if ($stmt->execute()) {
        header("location: SignUp.php");
        exit();
    } else {
        die("Email already exists");
    }
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        die("Email already exists");
    } else {
        die("SQL Error: " . $e->getMessage());
    }
}

?> 