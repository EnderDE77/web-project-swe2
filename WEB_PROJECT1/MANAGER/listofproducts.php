<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <!-- <link rel="stylesheet" href="productstyle.css"> -->
    <style>
       .product {
            display: flex;
            margin-bottom: 20px;
        }
  
        .product-container {
            width: 400px;
            display: flex;
            align-items: center;
        }
  
        .product-image img {
            width: 200px;
            height: auto;
        }
  
        .product-details {
            padding-left: 20px;
        }
  
        .product-details p {
            margin: 5px 0;
        }
        </style>
</head>
<body>
    <?php
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

    // Prepare and execute the SQL query
    $query = "SELECT * FROM product";
    $result = $mySQL->query($query);

    // Check if the query was successful
    if ($result) {
        // Fetch data from the result set
        while ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $imagePath = $row['imgPath'];

            // Display the retrieved data in div containers with inline CSS styles
            echo "<div class='product-container'>";
            echo "<div class='product-image'>";
            echo "<img src='$imagePath' alt='Product Image'>";
            echo "</div>";
            echo "<div class='product-details'>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Price:</strong> $price</p>";
            echo "<p><strong>Quantity:</strong> $quantity</p>";
            echo "</div>";
            echo "</div>";
        }

        // Free the result set
        $result->free();
    } else {
        echo "Error executing query: " . $mySQL->error;
    }

    // Close the database connection
    $mySQL->close();
    ?>
</body>
</html>
