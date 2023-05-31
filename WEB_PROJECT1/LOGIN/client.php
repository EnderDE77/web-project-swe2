<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <?php if(isset($_SESSION["user_id"])):?>
        <p>Welcome Client!</p>

        <?php else: ?>
            <p><a href="SignUp.php">Log in</a></p>

            <?php endif; ?>
</body>
</html>