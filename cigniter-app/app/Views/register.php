<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/mainpage.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Register</title>
</head>
<body>

<nav class="navbar">
    <a href="/" class="home_link">
        <div class="navbar_left">
            <img class="logo" src="<?= base_url('img/logo2.png') ?>">
            <h2 class="heading--2">Notify</h2>
        </div>
    </a>
    <div class="navbar_right">
        <div>
            <a href="about" class="link link--big">About us</a>
        </div>
        <div>
            <a href="login" class="link link--big">Login</a>
        </div>
    </div>
</nav>

<section class="section_login">
    <h1 class="heading--1">Register</h1>
    <div class="form_container">
        <form class="form_registration" name="form1" method="post" action="<?= site_url('register/process') ?>">
            <div class="form_main">
                <div class="input_container">
                    <label>Username</label>
                    <input type="text" placeholder="Enter Username" name="myusername" required>
                </div>
                <div class="input_container">
                    <label>Password</label>
                    <input type="password" name="mypassword" placeholder="Enter Password" required>
                </div>

                <div class="input_container">
                    <label>Repeat Password</label>
                    <input type="password" name="mypasswordrepeated" placeholder="Repeat Password" required>
                </div>

                <div class="error_message">
                  <?php echo isset($errMsg) ? $errMsg : ''; ?>
                </div>

                <div class="input_container">
                    <label>Captcha:</label>
                    <input type="text" id="captcha" name="captcha" required>
                </div>
                <img src="data:image/png;base64,<?php echo base64_encode($captcha_image); ?>" alt="CAPTCHA">

                <button type="submit" name="submit" class="btn_submit">Register</button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
