<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerySHOP</title>
    <link rel="stylesheet" href="NewCssAbout.css">

</head>
<body>
    <div class="main">
    <?php require_once "../PHP/user.php";?>
    <div class="navbar">

        <div class="logo">
            <img id="logo1" src="../IMAGES/groceries.png" alt="Logo of gorceryShop">
            <h4 id="nameofshop">GroceryMania</h4>
        </div>


        <div class="menu">
            
            <ul>
                <li><a href="../HOME/index.php">HOME</a></li>
                <li><a href="../ABOUT/NewAbout.php">ABOUT</a></li>
                <li><a href="../DELIVERY/Delivery.php">DELIVERY</a></li>
                <li><a href="../CONTACT/Contacts.php">CONTACT</a></li>
                <?php if(isset($_SESSION['user_id'])):?>
                    <?php if($user_lvl == "1"):?>
                <li><a href="../CLIENT/clientview.php">CLIENT</a></li>
                    <?php endif;?>
                    <?php if($user_lvl == "2"):?>
                <li><a href="../MANAGER/manager.php">MANAGER</a></li>
                    <?php endif;?>
                <?php endif;?>
             </ul>
        </div>

        
            

     <?php if($user_id == ""):?>
        <div class="reg">
            <!-- <ion-icon id="find" name="search-circle-outline"></ion-icon>
            <a href="#"><ion-icon id="find" name="search"></ion-icon></a>
            <input type="searchBar" name="searchBar" id="searchBar" placeholder="SearchBar">
            <button type="submit" class="searchButton"><i class="fas fa-search"></i></button> -->
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="register">Register</button>
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="login">Log in</button>
        </div>
    <?php endif;?>
    </div>
    
        </div>
    </div>
    
       
            <div>
                <br>
                <br>
                <br> 
                <img src="../IMAGES/groc1.jpg" style="width: 50em; height: 30em; margin-left: 20em; ">
                <br>
                <br>

             
               <div class="text" id="text" >
                <div class="ab_us">
               <h1 class="abu_usc" style="font-size: 1.7em;">About us</h1>
               <p class="abu_usc"> GrocerySHOP is a premier grocery shop located in the heart of Albania, dedicated to providing our customers with the finest quality products and a delightful shopping experience. Established in 2002, we have been serving the local community and visitors with a wide range of fresh and authentic Albanian food products.</p>
               <div class="image_container">
               <img src="../IMAGES/groc3.jpg" style="width: 17em; height: 20em; margin-top: 3em; margin-right: 10em; "> 
               <img src="../IMAGES/groc2.jpg" style="width: 35em; height: 20em; margin-top: 3em; margin-right: 5em; margin-left: 3em;">  
               
               </div>
             </div>
             </div>
            
            
             <div  class="text" id="text">
                <div  class="prodrange">
                        <h2>Our Product Range</h2>
                        <p> At  groceryShop, we take pride in offering a diverse selection of groceries that cater to the needs of our customers. Our shelves are stocked with a variety of fresh fruits, vegetables, dairy products, meats, seafood, bakery items, spices, condiments, and pantry staples. We understand the importance of maintaining high standards, so we carefully source our products from trusted local farmers, suppliers, and renowned brands to ensure freshness, quality, and authenticity.</p>
                        
                </div>
            
            

              <div class="aboutbg">
                <div class="staycon"> 
                    <div class="staycon_c">
                    <h2 style="text-align:center;font-size: 1.7em;">Stay Connected</h2>
                    <p>We love staying connected with our valued customers. Follow us on social media platforms, including Facebook, Instagram, and Twitter, to stay updated on the latest offers, promotions, and new product arrivals. Additionally, you can subscribe to our newsletter to receive exclusive discounts and special offers directly in your inbox.</p>
                </div>
                </div>
                <img class="image" src="../IMAGES/icons.png" width="20%" height="20%">
              </div>
            </div>
        </div>
       

</body>
</html>
