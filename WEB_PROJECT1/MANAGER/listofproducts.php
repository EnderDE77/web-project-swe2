<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product {
            display: flex;
            margin-bottom: 20px;
            
        }

        .product-container {
            position: relative;
            width: 200vh;
            height:100vh;
            display: flex;
            align-items: center;
            margin: 0 auto; 
            margin-top: 20px; 
            background-color:rgb(216, 195, 169);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
        }


        .product-container .product-list {
            display: flex;
            overflow-x: hidden;
            background-color:transparent;
        }

        .product-container .product-list .product {
            flex: 0 0 auto;
            display: flex;
            margin-top:0px;
            margin-left:110px;
            margin-right: 20px;
            transition: margin-right 0.3s ease-in-out;
        }

        .product-container .product-list .product:last-child {
            margin-right: 0;
        }

        .product-container .product-list .product-image img {
        width: 250px;
        height: 250px; 
        object-fit: cover;
    }

        .product-container .product-list .product-details {
            padding-left: 20px;
        }

        .product-container .product-list .product-details p {
            margin: 5px 0;
        }

        .product-container .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            background-color: rgba(255, 255, 255, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .product-container .arrow:hover {
            background-color: rgba(255, 255, 255, 1);
        }

        .product-container .arrow.left {
            margin-top:10px;
            margin-left:5vh;
        }

        .product-container .arrow.right {
            margin-top:10px;
            margin-left:180vh;
        }

        /* Rest of your CSS code */

        .menu-container {
            width: 100%;
            height: 75px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            padding-top: 20px;
        }

        #logo1 {
            width: 60px;
            height: 60px;
            margin-left: 50px;
        }

        #nameofshop {
            font-size: 20px;
            font-family: sans-serif;
            color: #ccafaf;
            margin-left: 5px;
        }

        .menu {
            width: 800px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 20px;
        }

        ul {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        ul li {
            list-style: none;
            margin-right: 150px; /*This is a defect*/
            margin-left: -10px;
        }

        ul li a {
            text-decoration: none;
            color: rgb(207, 190, 183);
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            transition: 0.4s ease-in-out;
        }

        ul li a:hover {
            color: rgb(137, 188, 202);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="menu-container">
        <div class="logo">
            <img id="logo1" src="../IMAGES/groceries.png" alt="Logo of GroceryShop">
            <h4 id="nameofshop">GroceryMania</h4>
        </div>
        <div class="menu">
            <ul>
                <li id="home-txt"><a href="manager.php">Create Product</a></li>
                <li><a href="listofproducts.php">Product list</a></li>
            </ul>
        </div>
    </div>

    <div class="product-container">
        <div class="arrow left" onclick="scrollProductContainer('left')">&lt;</div>
        <div class="product-list">
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

            // Check if plus or minus button is clicked
            if (isset($_POST['plus'])) {
                $productId = $_POST['productId'];
                incrementQuantity($productId);
            }

            if (isset($_POST['minus'])) {
                $productId = $_POST['productId'];
                decrementQuantity($productId);
            }

            // Prepare and execute the SQL query
            $query = "SELECT * FROM product";
            $result = $mySQL->query($query);

            // Check if the query was successful
            if ($result) {
                // Fetch data from the result set
                while ($row = $result->fetch_assoc()) {
                    $productId = $row['id'];
                    $name = $row['name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $imagePath = $row['imgPath'];

                    // Display the retrieved data in div containers with inline CSS styles
                    echo "<div class='product'>";
                    echo "<div class='product-image'>";
                    echo "<img src='$imagePath' alt='Product Image'>";
                    echo "</div>";
                    echo "<div class='product-details'>";
                    echo "<p><strong>Name:</strong> $name</p>";
                    echo "<p><strong>Price:</strong> $price</p>";
                    echo "<p><strong>Quantity:</strong> $quantity</p>";

                    // Create a form for incrementing and decrementing the quantity
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='productId' value='$productId'>";
                    echo "<input type='submit' name='plus' value='+'>";
                    echo "<input type='submit' name='minus' value='-'>";
                    echo "</form>";

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

            // Function to increment the quantity
            function incrementQuantity($productId)
            {
                global $mySQL;
                $query = "UPDATE product SET quantity = quantity + 1 WHERE id = $productId";
                $result = $mySQL->query($query);
                if (!$result) {
                    echo "Error updating quantity: " . $mySQL->error;
                }
            }

            // Function to decrement the quantity
            function decrementQuantity($productId)
            {
                global $mySQL;
                $query = "UPDATE product SET quantity = GREATEST(quantity - 1, 0) WHERE id = $productId";
                $result = $mySQL->query($query);
                if (!$result) {
                    echo "Error updating quantity: " . $mySQL->error;
                }
            }
            ?>
        </div>
        <div class="arrow right" onclick="scrollProductContainer('right')">&gt;</div>
    </div>
</div>

<script>
    function scrollProductContainer(direction) {
        const productContainer = document.querySelector('.product-container');
        const productList = document.querySelector('.product-list');
        const scrollAmount = 400;
        const containerWidth = productContainer.offsetWidth;
        const scrollWidth = productList.scrollWidth;

        if (direction === 'left') {
            productList.scrollLeft -= scrollAmount;
        } else if (direction === 'right') {
            productList.scrollLeft += scrollAmount;
        }

        const maxScrollLeft = scrollWidth - containerWidth;
        const isAtBeginning = productList.scrollLeft === 0;
        const isAtEnd = productList.scrollLeft === maxScrollLeft;

        const leftArrow = document.querySelector('.arrow.left');
        const rightArrow = document.querySelector('.arrow.right');

        leftArrow.style.visibility = isAtBeginning ? 'hidden' : 'visible';
        rightArrow.style.visibility = isAtEnd ? 'hidden' : 'visible';
    }
</script>

</body>
</html>
