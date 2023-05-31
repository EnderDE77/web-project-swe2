<?php
session_start();
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<h1>Manager View Form</h1>
  <form>
    <label for="name">Name:</label>
    <input type="text" id="employee-name" name="employee-name" required><br><br>
    
    <label for="price">Price:</label>
    <input type="number" id="price" name="price" min="0.00" required><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="0" required><br><br>
    <input type="image" src="" alt="Submit"> 

    <input type="submit" value="Submit">
  </form>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 80px;
    }
    
    h1 {
      text-align: center;
      color: #333333;
    }
    
    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 80px;
      border: 1px solid #dddddd;
      border-radius: 50px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);

    }
    
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #dddddd;
      border-radius: 50px;
      margin-bottom: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);

    }
    
    input[type="submit"] {
      background-color: #4CAF50;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      border-radius: 50px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style> -->

  <!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="product-name">Name of Product:</label>
                <input type="text" id="product-name" name="product-name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" min="0" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="0" required>
            </div>
            <div class="form-group">
                <label for="image-path">Path of the Image:</label>
                <input type="text" id="image-path" name="image-path" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>



    <?php if(isset($_SESSION["user_id"])):?>

        <?php else: ?>
            <p><a href="../LOGIN/SignUp.php">Log in</a></p>

            <?php endif; ?>
</body>

</html>