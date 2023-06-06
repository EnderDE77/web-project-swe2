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
            <input type="checkbox" name="<?= "$product_id"?>">
            <input type="number" name="<?= "q"."$product_id"?>" value="0" min="0" max="<?= $product['quantity']?>">
          </div>
       
          <div class="total-price">$<?=  $product['price'] ?></div>
        </div>
    </div>
    <?php endforeach; ?>
    <button type="submit">Submit</button>
     </form>
</section>
    <?php if(isset($chosenProducts)):?>
        <aside>
          <h2>Your Cart</h2>
          <ul id="cart-items">
              <?php foreach($chosenProducts as $item):
                    $product = getProduct($connection, $item['productId'])[0];?>
                  <li>
                    <?= $product['name']?>
                    <?= " $"?>
                    <?= $product['price']?>
                    <?= " " ?>
                    <?= $item['quantity']?>
                  </li>
              <?php endforeach;?>
          </ul>
          <p>Total: <span id="cart-total">$<?= $payment['price']?></span></p>
        </aside>
    <?php endif;?>
</body>
</html>