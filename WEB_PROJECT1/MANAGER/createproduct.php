<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process the form data
        $name = $_POST["name"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];

        // Upload the image file
        $targetDir = "uploads/";
        $imageName = "Cheries.jpg"; // Specify the image name here
        $targetFile = $targetDir . $imageName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the image file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Error: File is not an image.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "Error: File already exists.";
            $uploadOk = 0;
        }

        // Check the file size (limit it if necessary)
        if ($_FILES["image"]["size"] > 500000) {
            echo "Error: File size is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats (you can modify this if needed)
        if (
            $imageFileType != "jpg" &&
            $imageFileType != "jpeg" &&
            $imageFileType != "png"
        ) {
            echo "Error: Only JPG, JPEG, and PNG files are allowed.";
            $uploadOk = 0;
        }

        // If the file is valid, move it to the target directory
        if ($uploadOk) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Save the image path to the database
                // Insert the form data into the database along with the image path
                // ... (your database code here)

                echo "Image uploaded successfully.";
            } else {
                echo "Error: There was an error uploading the file.";
            }
        }
    }
} else {
    echo "<p><a href='../LOGIN/SignUp.php'>Log in</a></p>";
}
?>
