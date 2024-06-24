<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/mainpage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>


  <style>
    #map {
      height: 450px;
      width: 700px;
    }
  </style>
  
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
        <a href="login" class="link link--big">Login</a>
      </div>
    </div>
  </nav>
  <section class="about">
    
  

    <div class="fade">
      <iframe
        width="420"
        height="315"
        src="https://www.youtube.com/embed/HMluqSGag5E"
      >
      </iframe>

      <div class="about_text">
       Our app is designed to help you capture your thoughts and ideas effortlessly, ensuring they are always organized and accessible. With a focus on user-friendly design and seamless cloud synchronization, Notify allows you to write and access your notes from any device, anytime, anywhere.
      </div>
      <div class="about_text">Also, check our new podcast</div>

      <audio controls>
        <source src="media/music.mp3" type="audio/mpeg" />
      </audio>

      <div class="about_text">For any questions, you can contact us on our email or find us below</div>

      <div id="map" class="map"></div>

      <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

      <script>
          const lat = 47.17424820787146;
          const lon = 27.57098736970753;

          var map = L.map('map').setView([lat, lon], 16);

          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
              maxZoom: 19,
              attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
          }).addTo(map);

          L.marker([lat, lon]).addTo(map)
              .bindPopup('UAIC')
              .openPopup();
      </script>
        
    </div>

    <video class="video" autoplay muted loop>
        <source src="media/video.mp4" type="video/mp4" />
      </video>
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
          <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.facebook.com%2Fgroups%2Fweb2024&layout&size&width=77&height=20&appId" width="77" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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