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
<div id="fb-root"></div>

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
        <?php 
          helper(['cookie']);
        ?>
        <a href="login" class="link link--big"><?= !is_null(get_cookie('username')) ? "To App" : "Login" ?></a>
      </div>
    </div>
  </nav>
  <header>
    <div class="header_main">
      <div class="header_text">
      <h1 class="heading--1">Make your own notes!</h1>
      <p class="header_text--secondary">Empower Your Mind, Capture Your Thoughts: Notes Made Simple.</p>
      </div>
      
      <div class="header_links">
        <a href="login" class="link link--main link--big">
        <?= !is_null(get_cookie('username')) ? "To App" : "Get Started" ?>
        </a>
        <a href="#info" class="link link--big">
          Learn More
        </a>
      </div>
    </div>
    <div class="gif-container">
      <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
      <dotlottie-player src="https://lottie.host/c6ac4cfa-3a49-4123-a172-c42dd15c0fbd/Flbok3DEWT.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></dotlottie-player>
    </div>
  </header>
  <section id='info' class="section_info">
    <div class="heading--1">
      <b>A better way to organize your thoughts</b>
    </div>
    <div class="list_container">
      <ul class="list_uses">
        <li class="use"><img src="img/memory.svg" class="icon"><span>Memory Aid</span>Notes serve as memory aids, helping you retain and recall important information. </li>
        <li class="use"><img src="img/organization.svg" class="icon"><span>Organization</span>Notes are invaluable for organizing thoughts and information.</li>
        <li class="use"><img src="img/learning.svg" class="icon"><span>Learning Tool</span>Taking notes actively engages your mind and enhances learning.</li>
        <li class="use"><img src="img/communication.svg" class="icon"><span>Communication</span>Notes facilitate communication by serving as a reference point for discussions and collaborations.</li>
      </ul>
    </div>
    
  </section>
  <footer>
      <div class="pre-footer">
        <div class="pre-footer__contacts">
          <h3 class="heading-3">Connect with us</h3>

          <ul class="social-media">
            <li class="social-media__item">
              <a href="#" class="social-media__link">
                <svg class="social-media__icon">
                  <use xlink:href="img/sprite.svg#icon-facebook"></use>
                </svg>
              </a>
            </li>

            <li class="social-media__item">
              <a href="#" class="social-media__link">
                <svg class="social-media__icon">
                  <use xlink:href="img/sprite.svg#icon-instagram"></use>
                </svg>
              </a>
            </li>

            <li class="social-media__item">
              <a href="#" class="social-media__link">
                <svg class="social-media__icon">
                  <use xlink:href="img/sprite.svg#icon-youtube"></use>
                </svg>
              </a>
            </li>

            <li class="social-media__item">
              <a href="#" class="social-media__link">
                <svg class="social-media__icon">
                  <use xlink:href="img/sprite.svg#icon-whatsapp"></use>
                </svg>
              </a>
            </li>
          </ul>
          
        </div>

        

        <form action="" class="newsletter">
          <label for="email" class="newsletter__email-label"
            >Enter your email address to receive our newsletter</label
          >
          <div class="newsletter__email">
            <input
              type="email"
              class="newsletter__email-input"
              required
              id="email"
              placeholder="Email"
            />
            <button class="newsletter__button">Sign up</button>
          </div>
        </form>
      </div>
      <div class="footer">
      

      </div>

      <div class="copyright">
        Copyright &copy; by <a href="#">Maxim Chele</a>. Any similarity with other works is purely coincidental.
      </div>
    </footer>

</body>
</html>