<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <link rel="stylesheet" href="productstyle.css">
</head>
<body>
<div class="main">
    <div class="menu-container">
        <div class="logo">
            <img id="logo1" src="../IMAGES/groceries.png" alt="Logo of GroceryShop">
            <h4 id="nameofshop">GroceryMania</h4>
        </div>
        <div class="menu">
            <ul>
                <li id="home-txt"><a href="#">Create Product</a></li>
                <li><a href="#">Product list</a></li>
            </ul>
        </div>
    </div>
    <div class="main-photo-container">
        <img id="photo-main1" src="../IMAGES/VegetablesAsthetics.jpg" alt="Main photo">
        <img id="photo-main" src="../IMAGES/VegetablesAsthetics.jpg" alt="Main photo">
    </div>
    <div class="big">
        <div class="container">
            <form method="post" action="../MANAGER/createproduct.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="0">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="0" step="0.01">
                </div>
                <div class="form-group">
                    <label for="image">Upload Picture:</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <input id="btn" type="submit" value="Create">
            </form>
        </div>
    </div>
</div>
</body>
</html>