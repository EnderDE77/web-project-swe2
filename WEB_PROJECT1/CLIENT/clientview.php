<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client-view.css">

</head>
<body>


<section class="products" id="products">
    <h1 class="heading">Our <span>products</span></h1>
    <?php require_once "./product.controller.php";?>
    <?php foreach($productList as $product):?>
    <div class="item">
        <div class="buttons">
            <span class="delete-btn"></span>
            <span class="like-btn"></span>
        </div>

        <div class="image">
            <img src=<?= $product['imgPath']?> alt=""/>
        </div>

        <div class="description">
            <span><?=  $product['name'] ?></span>
        </div>
       
          

          <div class="number">
            <span class="minus">-</span>
            <input type="text" value="0"/>
            <span class="plus">+</span>
          </div>
       
          <div class="total-price">$<?=  $product['price'] ?></div>
        </div>
    </div>
    <br>
    <?php endforeach; ?>
</section>
<script src="./client.js"></script>
</body>
</html>


