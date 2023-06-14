<?php require_once "../PHP/user.php";?>
<html>
    <head>
        <title>GroceryShop</title>
        <link rel="stylesheet" href="../HOME/style.css">
    </head>
    <body> 
        <style>
            ul li{
    list-style:none;
    margin-right: 30px; 
        
    margin-left: 10px;
}
            </style>
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

        
            

     <?php if($user_id == ""):?>
        <div class="reg">
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="register">Register</button>
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="login">Log in</button>
        </div>
    <?php endif;?>
    </div>
        </div>

       

        <br><br><br><br>
        <div class="DelPrices">
            <h2 style="  background-color:  rgb(220, 208, 188);">Delivery Prices</h2><br>
            <table class="ShowTable" border="2">
                <thead>
                    <th>Delivery Destination</th>
                    <th>Up to 2 kg</th>
                    <th>Up to 4 kg</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Italy</td>
                        <td>EUR 12.99</td>
                        <td>EUR 49.99</td>
                    </tr>
                    <tr>
                        <td>Kosovo</td>
                        <td>EUR 9.99</td>
                        <td>EUR 19.99</td>
                    </tr>
                    <tr>
                        <td>Greece</td>
                        <td>EUR 10.99</td>
                        <td>EUR 39.99</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br><br><br><br>
        <div class="DelMethods">
            <h2 style="  background-color:  rgb(220, 208, 188);">Delivery Methods & Timescales</h2><br>
            <table class="ShowTable" border="2">
                <thead>
                    <th>Courier</th>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            DHL<br>
                            <img src="" alt="dhl logo"><br>
                            <a href="#">DHL Delivery</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
