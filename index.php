<?php 

include('register.php');
include('login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Grand Fantasia - Registration Page</title>
</head>

<body>
    <div id="signup-form">
        <main>
            <div class="container">
                <img src="/assets/img/Engineer_Portrait.png" alt="knight">
            </div>

            <form id='register' action="<?= $_SERVER['PHP_SELF']; ?>" method=post>
                <div class="form-content">
                    <img src="/assets/img/grand-fantasia.png" alt="gf-logo">
                    <h1>Register / <span class="login-link"><a href="#" onclick="showLogin()">Login</a></span></h1>
                    <label for="username">Login</label>
                    <input type="text" name="username" id="username" placeholder="Type your login">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" placeholder="Type your real email" required>
                    <label for="password">Password</label>
                    <input class="password-field" type="password" id="password" placeholder="Type your password"
                        required>
                    <div class="terms">
                        <label class="switch" for="checkbox">
                            <input type="checkbox" id="checkbox" required />
                            <div class="slider round">
                            </div>
                        </label>
                        <p>Eu aceito as <a href="#"><strong>regras</strong></a> e condições.</p>
                    </div>
                    <input type="submit" value="REGISTRATION" id="enter">
                </div>
            </form>
        </main>
    </div>


    <div id="login-form" style="display: none;">
        <main class="login">
            <div class="container-login">
                <img src="/assets/img/kindpng.png" alt="knight-red">
            </div>
            <form class="form-login" id='login' action="<?= $_SERVER['PHP_SELF']; ?>" method=post>
                <div class="form-content-login">
                    <img src="/assets/img/grand-fantasia.png" alt="gf-logo">
                    <h1>Login / <a href="#" onclick="showRegister()">Register</a></h1>
                    <label for="username">Login</label>
                    <input type="text" name="username" id="username" placeholder="Type your login">
                    <label for="password">Password</label>
                    <input class="password-field" type="password" id="password" placeholder="Type your password"
                        required>
                    </label>
                    <div class="save-pass">
                        <input type="checkbox" id="checkbox" required>
                        <p>Remember Login?</p>
                    </div>

                    <input type="submit" value="L O G I N">
            </form>
        </main>
    </div>
    <script src="/assets/js/script.js"></script>
</body>

</html>