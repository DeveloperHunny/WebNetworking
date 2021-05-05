<?php include "lib.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/d040bc7e91.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/login_style.css">
    <title>LoginPage</title>
</head>
<body>
    <div class="container">
        <header>
            <span class="title">COMPANY</span>
        </header>
        <div class="main">
            <form class="loginForm" action="login.php" method="POST">
                <span class="title">LOGIN</span>
                <input type="text" name="id" placeholder="ID" id="input_id">
                <input type="text" name="pw" placeholder="PW" id="input_pw">
                <button type="submit">LOG IN</button>

                <span class="signUp">Don't you have ID? 
                    <button id="signUpBtn">sign up</button>
                </span>
            </form>
        </div>
    </div>
</body>
</html>