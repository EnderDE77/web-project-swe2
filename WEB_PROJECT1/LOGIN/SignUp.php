

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../STYLE/loginstyle.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    
    <script src="../JS/validation.js" defer></script>
    
    <title>signin-signup</title>



    <!-- The style for the sentence validation -->

    <style>
                .just-validate-error-label {
                margin-top:5px;
                margin-right:125px;
                color: red;
                font-family:"Times New Roman";
                font-size:15px;
                opacity: 0.5;
                
                }

            </style>
           
</head>
<body>
  
    <div class="container">
        <div class="signin-signup">




            <form id="signin" action="loginprocess.php" method="post" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="Email" name="Email" type="text" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="Password" name="Password" type="password" placeholder="Password">
                </div>
                <input type="submit" value="Login" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">Sign up</a></p>
            </form>




            <!-- javascript for the signinform -->

            <script>
    const signInForm = document.getElementById("signin");
    const emailInput = signInForm.querySelector("#Email");
    const passInput = signInForm.querySelector("#Password");

    signInForm.addEventListener("submit", (e) => {
        if (!emailInput.value) {

            e.preventDefault();
            emailInput.setAttribute("placeholder", " ");
            
        }
         if(!passInput.value)
        {
            e.preventDefault();
          
            passInput.setAttribute("placeholder", " ");
        }
    });
</script>

           
          



            <form   id="signup" action="signinprocess.php" method="post" class="sign-up-form">
                <h2 class="title">Sign up</h2>
           
              

                <div class="input-field">
        <i class="fas fa-user"></i>
        <input id="Level" name="Level" type="text" placeholder="Level">
        <div>

        </div>
    </div>

    <div class="input-field">
        <i class="fas fa-user"></i>
        <input id="Name" name="Name" type="text" placeholder="Name">
        <div>

        </div>
    </div>

    <div class="input-field">
        <i class="fas fa-user"></i>
        <input id="Surname" name="Surname" type="text" placeholder="Surname">
        <div>

        </div>
    </div>

    <div class="input-field">
        <i class="fas fa-envelope"></i>
        <input id="Email" name="Email" type="text" placeholder="Email">
    </div>

    <div class="input-field">
        <i class="fas fa-lock"></i>
        <input id="Password" name="Password" type="password" placeholder="Password">
    </div>

    <input type="submit" value="Sign up" class="btn">
                <p class="social-text">Or Sign in with social platform</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="social-icon" >
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>


            <!-- javascript for sign up validation -->

            <script>
    const signUpForm = document.getElementById("signup");
    const levelInput = signUpForm.querySelector("#Level");
    const nameInput = signUpForm.querySelector("#Name");
    const surnameInput = signUpForm.querySelector("#Surname");
    const emailInput = signUpForm.querySelector("#Email");
    const passInput = signUpForm.querySelector("#Password");

    signUpForm.addEventListener("submit", (e) => {
        if (!emailInput.value) {
            e.preventDefault();
            emailInput.setAttribute("placeholder", " ");

        }
        if (!passInput.value) {
            e.preventDefault();
            passInput.setAttribute("placeholder", " ");

        }
        if (!nameInput.value) {
            e.preventDefault();
            nameInput.setAttribute("placeholder", " ");
        
        }
        if (!surnameInput.value) {
            e.preventDefault();
            surnameInput.setAttribute("placeholder", " ");
            
        }
        if (!levelInput.value) {
            e.preventDefault();
            levelInput.setAttribute("placeholder", " ");
           
        }
    });
</script>





        </div>


        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Member of Brand?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque accusantium dolor, eos incidunt minima iure?</p>
                    <button class="btn" id="sign-in-btn">Sign in</button>
                </div>
                <img src="signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>New to Brand?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque accusantium dolor, eos incidunt minima iure?</p>
                    <button class="btn" id="sign-up-btn">Sign up</button>
                </div>
                <img src="signup.svg" alt="" class="image">
            </div>
        </div>
    </div>

    


    <script>

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const sign_in_btn2 = document.querySelector("#sign-in-btn2");
const sign_up_btn2 = document.querySelector("#sign-up-btn2");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", (e) => {
    e.preventDefault(); 
    window.location.href = "loginprocess.php";
    container.classList.remove("sign-up-mode");
});

sign_up_btn2.addEventListener("click", () => {
    container.classList.add("sign-up-mode2");
});

sign_in_btn2.addEventListener("click", () => {
    container.classList.remove("sign-up-mode2");
});


    </script>
</body>





