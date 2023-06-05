<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
    <link rel="stylesheet" href="productstyle.css">
    <script>
        function validateForm() {
            var name = document.forms["productForm"]["name"].value;
            var quantity = document.forms["productForm"]["quantity"].value;
            var price = document.forms["productForm"]["price"].value;
            var image = document.forms["productForm"]["image"].value;
            var isValid = true;

            if (name === "") {
                document.getElementById("name").setAttribute("placeholder", "Please enter a name");
                isValid = false;
            }

            if (quantity === "") {
                document.getElementById("quantity").setAttribute("placeholder", "Please enter a quantity");
                isValid = false;
            }

            if (price === "") {
                document.getElementById("price").setAttribute("placeholder", "Please enter a price");
                isValid = false;
            }

            if (image === "") {
                document.getElementById("image").setAttribute("placeholder", "Please upload an image");
                isValid = false;
            }

            if (!isValid) {
                return false;
            }

            // Perform additional server-side validation
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    var response = JSON.parse(this.responseText);
                    if (response.error) {
                        document.getElementById("name").setAttribute("placeholder", response.nameError);
                        document.getElementById("quantity").setAttribute("placeholder", response.quantityError);
                        document.getElementById("price").setAttribute("placeholder", response.priceError);
                        document.getElementById("image").setAttribute("placeholder", response.imageError);
                        return false;
                    } else {
                        // Validation passed, submit the form
                        document.forms["productForm"].submit();
                    }
                }
            };
            xhttp.open("POST", "validation.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("name=" + name + "&quantity=" + quantity + "&price=" + price + "&image=" + image);

            return false; // Prevent form submission
        }
    </script>
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
            <img id="photo-main" src="../IMAGES/VegetablesAsthetics.jpg" alt="Main photo">

            <div class="big">
                <div class="container">
                    <form name="productForm" method="post" action="../MANAGER/createproduct.php" enctype="multipart/form-data" onsubmit="return validateForm()">
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
    </div>
</body>
</html>
