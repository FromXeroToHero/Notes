<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/mainpage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <title>Notes</title>
</head>
<body>
  <nav class="navbar">
    <a href="/" class="home_link">
      <div class="navbar_left">
        <img class="logo" src="img/logo2.png">
        <h2 class="heading--2">Notify</h2>
      </div>
    </a>
    <div class="navbar_right">
      <div>
        <a href="about" class="link link--big">About us</a>
      </div>
      <div>
        <a href="#" class="link link--big">Login</a>
      </div>
    </div>
  </nav>



<section class="section_login">
  <h1 class="heading--1">Login</h1>
  <div class="form_container" action="" method="post">
  
    <form class="form_login" name="form1" method="post" action="<?php echo site_url('check_login'); ?>">
    <div class="form_main">
      <div class="error_message">
        <?php echo isset($errMessage) ? $errMessage : ''; ?>
      </div>
      <div class="input_container">
        <label>Username</label>
        <input type="text" placeholder="Enter Username" name="myusername" required>
      </div>
      <div class="input_container">
        <label>Password</label>
        <input type="password" name="mypassword" placeholder="Enter Password" required>
      </div>
      <label class="remember">
        <input type="checkbox" checked="checked" name="rememberme"> Remember me
      </label>
      <button type="submit" name="submit" class="btn_submit">Login</button>
    </div>
    <div class="form_secondary">
      <span>Don't have an account?</span>
      <a href="register" class="link link--medium link--main">Register</a>
    </div>
  </form>

  </div>
</section>



</body>
</html>
