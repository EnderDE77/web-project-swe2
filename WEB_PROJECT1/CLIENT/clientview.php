<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="client-view.css">

    <style>
    aside {
      width: 250px;
      padding: 20px;
      background-color: #f5f5f5;
    }
    
    #cart-items {
      list-style-type: none;
      padding: 0;
    }
    
    #cart-total {
      font-weight: bold;
    }
  </style>


</head>
 <body>
  
     <?php require_once "./product.controller.php";?> 

<section class="products" id="products">
    <h1 class="heading">Our <span>products</span></h1>
    <form method="POST" action="product.adder.php">
     <?php foreach($productList as $product):
        $product_id = strval($product['id']);?>
    <div class="item">
        <div class="buttons">
            <span class="delete-btn"></span>
            <span class="like-btn"></span>
        </div>

        <div class="image">
            <img src="<?= $product['imgPath']?>" alt=""/>
        </div>

        <div class="description">
            <span><?=  $product['name'] ?></span>
        </div>
       
          

          <div class="number">
            <input type="number" name="<?= "q".$product_id?>" value="0" min="0" max="<?= $product['quantity']?>">
            <input type="checkbox" name="<?= "$product_id"?>">
          </div>
       
          <div class="total-price">$<?=  $product['price'] ?></div>
        </div>
    </div>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
     </form>
</section>

  <aside>
    <h2>Your Cart</h2>
    <ul id="cart-items">
        <?php if(isset($chosenProducts)):?>
        <?php foreach($chosenProducts as $product):?>
            <li><?= $productList[$product['productId']]['name']." $".$productList[$product['productId']]['price']." ".$product['quantity'] ?></li>
        <?php endforeach;?>
        <?php endif;?>
    </ul>
    <p>Total: <span id="cart-total">$<?= $payment['price']?></span></p>
  </aside>
</body>
</html>