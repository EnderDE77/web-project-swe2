<html>
    <head>
        <title>GroceryShop</title>
        <link rel="stylesheet" href="../HOME/style.css">
    </head>
    <body> 
        <div class="navbar">

            <div class="logo">
                <img id="logo1" src="../IMAGES/groceries.png" alt="Logo of gorceryShop">
                <h4 id="nameofshop">GroceryMania</h4>
            </div>


            <div class="menu">
                
                <ul>
                    <li><a href="../HOME/index.php">HOME</a></li>
                    <li><a href="../ABOUT/NewAbout.php">ABOUT</a></li>
                    <li><a href="">DELIVERY</a></li>
                    <li><a href="../CONTACT/Contacts.php">CONTACT</a></li>
                </ul>
            </div>

            
                

        
            <div class="reg">
                <ion-icon id="find" name="search-circle-outline"></ion-icon>
                <!-- <a href="#"><ion-icon id="find" name="search"></ion-icon></a> -->
                <input type="searchBar" name="searchBar" id="searchBar" placeholder="SearchBar">
                <!-- <button type="submit" class="searchButton"><i class="fas fa-search"></i></button> -->
            <button onclick="openRegistration()" type="click" id="register">Register</button>
            <button onclick="openLogIn()" type="click" id="login">Log in</button>
            </div>

        </div>

        <div class="Cart">
            <ion-icon id="cart" name="cart"></ion-icon>
        </div>

        <br><br><br><br>
        <div class="DelPrices">
            <h2>Delivery Prices</h2><br>
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
            <h2>Delivery Methods & Timescales</h2><br>
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