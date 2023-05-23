<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once "./product.controller.php" ?>
    <form method="get" action="">
        <label for="name">Name</label>
        <select name="name" id="name">
            <?php foreach($productList as $product):?>
                <option value=<?= $product['id']?>><?= $product['name']?></option>
            <?php endforeach;?>
        </select><br>
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" min="1"><br>
        <input type="submit" name="submit" value="Search">
    </form>
    <table border="2">
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </thead>
        <tbody id="billBody">
        </tbody>
    </table>
    <script src="addition.js"></script>
</body>
</html>
