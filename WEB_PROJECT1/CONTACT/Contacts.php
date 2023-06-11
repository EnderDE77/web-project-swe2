<?php require_once "../PHP/user.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Form</title>
  <style>
    .main{
    width:100px;
    height:100px;
}
.menu-container{
   width: 100%;
    height: 4.688em;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.logo{
    display: flex;
    align-items: center;
    padding-top: 20px; 
}

#logo1{
    width: 60px;
    height: 60px;
    margin-left: 50px;
}

#nameofshop{
    font-size: 20px;
    font-family: sans-serif;
    color: #ccafaf;
    margin-left: 5px;
}

.menu{
    width: 800px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 20px; 
}

ul{
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
}

ul li{
    list-style:none;
    margin-right: 40px; /*This is a defect*/
    margin-left: 100px;
}

ul li a{
    text-decoration: none;
    color:rgb(207, 190, 183);
    font-family: Arial, Helvetica, sans-serif;
    font-weight:bold;
    transition: 0.4s ease-in-out;
}

ul li a:hover{
color:rgb(137, 188, 202);
}

.reg{
        display: flex;
        align-items: center;
        padding-top: 1.25em;
        margin-right: 1.25em; /* Updated margin */
    }
    
    #find{
        width: 1.875em;
        height: 1.875em;
        margin-right: 1.25em; /* Updated margin */
        border-radius: 6.25em;
    }
    
    #searchBar {
        width: 9.375em;
        height: 1.875em;
        display: inline-block;
        margin-right: 1.25em; /* Updated margin */
        padding: 0.313em; /* Added padding */
        border: 0.063em solid #ccc; /* Added border */
        border-radius: 0.25em; /* Added border radius */
    }
    
    #register {
        margin-right: 1.25em;
        margin-left: 1.25em;
        width: 6.25em;
        height: 2.188em;
        border: 0.063em solid #ccc;
        transition: 0.6s ease-in-out;
    }
    
    #login {
        margin-left: 0.5em;
        width: 6.25em;
        height: 2.188em;
        border: 0.063em solid #ccc;
        transition: 0.6s ease-in-out;
    }
    
    #register:hover{
        background-color: rgb(216, 195, 169);
        cursor:pointer;
    }
    #login:hover{
        background-color: rgb(216, 195, 169);
        cursor:pointer;
    }
    
    #find:hover{
        background-color: rgb(227, 212, 194);
        cursor:pointer;
    }
.main-photo-container {
    position: relative;
    background-color: transparent;
    height: 100vh;
    width:200vh;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  #photo-main {
    position: absolute;
    margin-top: 20px;
    height: 100vh;
    width: 200vh;
    opacity: 0.5;
    z-index: -1;
  }


    .container {
      /* width: 500px;
      height:600px;
      margin-top:100px;
      margin-left:350px;
      
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
      width: 500px;
    height: 500px;
    background-color: transparent;
    border: 1px solid #ccc;
    border-radius: 50px;
    }

    h1 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-left:10px;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input,
    textarea {
     
      width: 400px;
    height: 40px;
    margin-top: 20px;
    margin-left:10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    opacity: 0.5;
    }

    input[type="submit"] {
      margin-top: 30px;
    margin-left: 200px;
    width:100px;
    height:35px;
    background-color: rgb(207, 120, 76);
    border-color: #75230a;
    background-color: transparent;
    color:white;
    }

    input[type="submit"]:hover {
      background-color: rgb(207, 120, 76);
    }

    .error {
      color: black;
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
<div class="main">
    <?php require_once "../PHP/user.php";?>
    <div class="menu-container">

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
            <!-- <ion-icon id="find" name="search-circle-outline"></ion-icon>
            <a href="#"><ion-icon id="find" name="search"></ion-icon></a>
            <input type="searchBar" name="searchBar" id="searchBar" placeholder="SearchBar">
            <button type="submit" class="searchButton"><i class="fas fa-search"></i></button> -->
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="register">Register</button>
        <button onclick="window.location.href='../LOGIN/SignUp.php'"  type="click" id="login">Log in</button>
        </div>
    <?php endif;?>
    </div>
        <div class="main-photo-container">
            <img id="photo-main" src="../IMAGES/VegetablesAsthetics.jpg" alt="Main photo">

  <div class="container">
    <h1>Contact Form</h1>
    <form action="submit_form.php" method="POST" onsubmit="return validateForm()">

      <?php if(!isset($user[0])):?>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name">
      <div id="name-error" class="error"></div>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
      <div id="email-error" class="error"></div>
      <?php endif;?>

      <?php if(isset($user[0])):?>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value=<?= $user['name'].' '.$user['surname']?> readonly>
      <div id="name-error" class="error"></div>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" value=<?= $user['email']?> readonly>
      <div id="email-error" class="error"></div>
      <?php endif;?>

      <label for="message">Message:</label>
      <textarea id="message" name="message"></textarea>
      <div id="mess-error" class="error"></div>

      <input type="submit" value="Submit">
    </form>
  </div>
  </div>
        </div>
    </div>
  <script>
    function validateForm() {
      var nameInput = document.getElementById("name");
      var emailInput = document.getElementById("email");
      var messInput = document.getElementById("message");
      

      var nameError = document.getElementById("name-error");
      var emailError = document.getElementById("email-error");
      var messError = document.getElementById("mess-error");

      var name = nameInput.value.trim();
      var email = emailInput.value.trim();
      var mess = messInput.value.trim();

      nameError.textContent = "";
      emailError.textContent = "";
      messError.textContent = "";

      if (name === "") {
        nameError.textContent = "Name is required";
        nameInput.focus();
        return false;
      }

      if (email === "") {
        emailError.textContent = "Email is required";
        emailInput.focus();
        return false;
      }

      if (mess === "") {
        messError.textContent = "Message is required";
        messInput.focus();
        return false;
      }

      var emailRegex = /^\S+@\S+\.\S+$/;
      if (!emailRegex.test(email)) {
        emailError.textContent = "Invalid email format";
        emailInput.focus();
        return false;
      }
      return true;
    }
  </script>
</body>
</html>
