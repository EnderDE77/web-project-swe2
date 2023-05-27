<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyings</title>
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
        <button type="submit">Search</button>
    </form>
    <table border="2">
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </thead>
    <?php require_once "./product.controller.php" ?>
        <tbody>
            <?php if(isset($chosenProducts)):?>
            <?php foreach($chosenProducts as $product): ?>
                <tr>
                    <td><?= $product[0]?></td>
                    <td><?= $product[1]?></td>
                    <td><?= $product[2]?></td>
                </tr>
            <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
</body>
</html>
