<?php require_once "../PHP/user.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrocerySHOP</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="main">
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
                <?php if(isset($user[0])):?>
                    <?php if($user_lvl == "1"):?>
                <li><a href="../CLIENT/clientview.php">CLIENT</a></li>
                    <?php endif;?>
                    <?php if($user_lvl == "2"):?>
                <li><a href="../MANAGER/manager.php">MANAGER</a></li>
                    <?php endif;?>
                <li><a href="../CLIENT/logout.php">LOG OUT</a></li>
                <?php endif;?>
             </ul>
        </div>

        
            

        <div class="reg">
     <?php if($user_id == ""):?>
            <!-- <ion-icon id="find" name="search-circle-outline"></ion-icon>
            <a href="#"><ion-icon id="find" name="search"></ion-icon></a>
            <input type="searchBar" name="searchBar" id="searchBar" placeholder="SearchBar">
            <button type="submit" class="searchButton"><i class="fas fa-search"></i></button> -->
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="register">Register</button>
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="login">Log in</button>
    <?php endif;?>
        </div>
    </div>
    <div class="container">

        <div class="Veggies">
            <img  id="picture-veggies"src="../IMAGES/Backgr-vegetables.jpg" style="width: 1450px; height: 700px; margin-left: 82.5px; opacity:0.3;">
            <a id="prev" onclick="plusSlides(-1)" style="position: absolute; top: 48%; left: 50px; transform: translateY(-50%); background-color:  #e4decc; color:#ffffff; font-size: 60px">❮</a>
            <a id="next" onclick="plusSlides(1)" style="position: absolute; top: 48%; right: 50px; transform: translateY(-50%); background-color:  #e8e3d7;  color:#ffffff;font-size: 60px">❯</a>
            <h1  style="position: absolute;top:20% ;left:450px;font-size:60px;font-family: 'Times New Roman';font-weight:bold;background-color: transparent;color: #946666;text-shadow: 2px 2px 2px rgba(0,0,0,0.5);">Trip to the groceryShop!</h1>
            <h4 style="position: absolute;top:35% ;left:650px;font-size:20px;font-family: 'Times New Roman';font-weight:bold;background-color: transparent;color: #5a4242;">Fill your bag till it drains!</h4>
            <button type="button" id="read-more">Read more</button>
        </div>
        
    </div>


    <div class="experience-info">

    <div class="_1ex-inf">
        <h1 style="position:absolute; margin-top:50px; margin-left: 80px; background-color: #ffffff">21</h1>
        <h4 style="position:absolute; margin-top:100px; margin-left: 25px; background-color: #ffffff; font-size: 18px">Years of experience</h4>
    </div>

    <div class="_2ex-inf">
        <h1 style="position:absolute; margin-top:50px; margin-left: 80px; background-color: #ffffff">100</h1>
        <h4  style="position:absolute; margin-top:100px; margin-left: 15px; background-color: #ffffff;font-size: 18px">Certified professionals</h4>
    </div>

    <div class="_3ex-inf">
        <h1 style="position:absolute; margin-top:50px; margin-left: 90px; background-color: #ffffff">5</h1>
        <h4 style="position:absolute; margin-top:100px; margin-left: 40px; background-color: #ffffff; font-size: 18px">Cities in Albania</h4>
    </div>

    </div>
    <div class="cmpHistory">

<div class="mission">
    <ion-icon id="eye-photo" name="eye-outline"></ion-icon>
    <h1 style="position:absolute; margin-top:20px; margin-left: 140px; background-color: #ffffff" >Our mission</h1>
    <p id="first-mission">
        We are committted to deliver the best experience to our clients in Albania,
         with the highest quality of food and services, and best prices. We strive
          to achieve the goal as the most visited website, with the happiest clients
           in every service that we provide.
    </p>

</div>



<div class="history">
    <ion-icon id="diamond-photo" name="diamond-outline"></ion-icon>
    <h1 style="position:absolute; margin-top:20px; margin-left: 150px; background-color: #efe9e2;" >Our history</h1>
    <p id="first-history">
        The grocery shop business has a rich history, serving the community for decades. It started as a small local store, gradually expanding its product range.Quality and customer satisfaction have always been its priority. With online ordering and home delivery services, customers enjoy convenience. The grocery shop actively supports the local community through events and donations. Today, it remains a trusted destination for high-quality groceries, combining innovation and personalized service for a bright future.
    </p>

</div>


<div class="Personalization">
    <ion-icon id="person-photo" name="person-outline"></ion-icon>
    <h1 style="position:absolute; margin-top:20px; margin-left: 150px;  background-color: #e4dbcc;" >Who we are</h1>
    <p id="first-personalization">
       With more than 100 certified professionals in communicating with clients, sailing products, and maintaining everyhting in the grocery shop, "GroceryMania" stand as the largest grocery shop in Albania, with the highest quality and best prices.
    </p>

</div>

    </div>


   
</div>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    function openRegistration(){
        window.location.href="Registration.html";
    }
</script>

<script>
    function openLogIn(){
        window.location.href="LogIn.html";
    }
</script>
    <script>
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.documentElement.classList.add('dark-mode');
  }
const toggleButton = document.getElementById('dark-mode-toggle');

toggleButton.addEventListener('click', () => {
  document.documentElement.classList.toggle('dark-mode');
});
    </script>


</body>
</html>
