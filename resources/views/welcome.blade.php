<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('frontend/style.css') }}" />
  <title>Mind & Body</title>
</head>

<body>
  <section class="front-page">
    <img class="hero" src="{{ asset('frontend/assets/hero.png') }}" alt="meditation" />
    <nav>
      <div class="logo">
        <img src="{{ asset('frontend/assets/logo.svg') }}" alt="mind & body" />
        <h1>mind & body</h1>
      </div>
      <div class="links">
        <a href="#">Dashbaord</a>
        <a href="#">Book a Flight</a>
        <a href="#">My Booking</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      </div>
      <svg width="44" height="18" viewBox="0 0 44 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <line class="line" y1="1" x2="44" y2="1" stroke="white" stroke-width="2" />
        <line class="line" y1="9" x2="27" y2="9" stroke="white" stroke-width="2" />
        <line class="line" y1="17" x2="11" y2="17" stroke="white" stroke-width="2" />
      </svg>
    </nav>
    <div class="selling-point">
      <h2>Let your mind breathe.</h2>
      <h3>
        Get unlimited acces to yoga, pilates, and meditation classes that fit
        the way you feel.
      </h3>
      <div class="ctas">
        <button class="cta-sec">Explore classes</button>
        <button class="cta-main">
          <a href="https://koalendar.com/e/yoga-appointment">Sign up today</a>
        </button>
      </div>
    </div>
  </section>


  <section class="classes">
    <div class="classes-description">
      <h2>Classes tailored for you</h2>
      <h3>It's time to heal your mind and body</h3>
    </div>
    <div class="videos">
      <div class="pilates">
        <h3>Pilates</h3>
        <video muted loop class="video" src="{{ asset('frontend/assets/pilates.mp4') }}"></video>
      </div>
      <div class="yoga">
        <h3>Yoga</h3>
        <video muted loop class="video" src="{{ asset('frontend/assets/yoga.mp4') }}"></video>
      </div>
      <div class="meditation">
        <h3>Meditation</h3>
        <video muted loop class="video" src="{{ asset('frontend/assets/meditation.mp4') }}"></video>
      </div>
    </div>
  </section>
  <section class="about">
    <div class="our-story">
      <h2>Our story...</h2>
      <p>
        Always a student, Janet has immersed herself in the ancient practices
        of yoga for over thirty years. A global yoga teacher, she shares the
        teachings from the heart. Through curiosity, devotion, and dedication
        she creates a unique approach to living yoga.
      </p>
    </div>
    <img src="{{ asset('frontend/assets/our-story.png') }}" alt="our-story" />
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
  <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
