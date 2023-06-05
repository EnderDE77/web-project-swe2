<!DOCTYPE html>
<html lang="en">
<head>
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
     <?php foreach($productList as $product):?>
    <div class="item" id=<?= $product['id']?>>
        <div class="buttons">
            <span class="delete-btn"></span>
            <span class="like-btn"></span>
        </div>

        <div class="image">
            <img src=""+<?= "".$product['imgPath']?> alt=""/>
        </div>

        <div class="description">
            <span><?=  $product['name'] ?></span>
        </div>
       
          

          <div class="number">
            <input type="number" value="0" min="0"/>
            <span class="add">Add to cart</span>
          </div>
       
          <div class="total-price">$<?=  $product['price'] ?></div>
        </div>
    </div>
    <br>
    <?php endforeach; ?>
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
<script>
    const productElements = document.getElementsByClassName('item');
    console.log(productElements);
    var chosenProd = -1;
    var chosenquant = 0;

    for(let i=0;i<productElements.length;i++){
        productElements[i].children[3].children[1].addEventListener('click', () =>{
            chosenquant = parseInt(productElements[i].children[3].children[1].value);
            chosenProd = productElements[i].id;
            console.log('ok1');
            fetch("clientview.php", {
              method: "POST",
              headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
              },
              body: `$product = getProduct($connection, ${chosenProd});
                    echo var_dump($product);`,
            })
            console.log('ok2');
        });
    }
</script>

</body>
</html>