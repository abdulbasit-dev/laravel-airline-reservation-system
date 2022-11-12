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
  <title>{{ config('app.name') }}</title>
</head>

<body>
  <div class="conatiner">
    <section class="front-page">
      <img class="hero" src="{{ asset('frontend/assets/hero.png') }}" alt="meditation" autoplay />
      <video muted autoplay loop class="hero" src="{{ asset('frontend/assets/video.mp4') }}"></video>
      <nav>
        <div class="logo">
          <img src="{{ asset('frontend/assets/logo.png') }}" alt="mind & body" style="width: 15rem" />
          {{-- <h1>SULAYMANIYAH INTERNATIONAL AIRPORT</h1> --}}
        </div>
        <div class="links">
          @auth
            @if (Auth::user()->is_admin)
              <a href="{{ route('root') }}">Dashbaord</a>
            @else
              <a href="{{ route('root') }}">Dashbaord</a>
              <a href="{{ route('tickets.flights') }}">Book a Flight</a>
              <a href="{{ route('tickets.userTickets') }}">My Booking</a>
            @endif
            <a href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 me-1 text-danger align-middle"></i> @lang('translation.Logout')</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}">Register</a>
            @endif
          @endauth
        </div>
        <svg width="44" height="18" viewBox="0 0 44 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <line class="line" y1="1" x2="44" y2="1" stroke="white" stroke-width="2" />
          <line class="line" y1="9" x2="27" y2="9" stroke="white" stroke-width="2" />
          <line class="line" y1="17" x2="11" y2="17" stroke="white" stroke-width="2" />
        </svg>

      </nav>
      <div class="primary-overlay">
        <div class="selling-point">
          <h2>Let your mind breathe.</h2>
          <h3>
            The world is a book and those who do not travel read only one page.
          </h3>
          <div class="ctas">
            @auth
              <button class="cta-main">
                @if (Auth::user()->is_admin)
                  <a href="{{ route('root') }}">Dashboard</a>
                @else
                  <a href="{{ route('tickets.flights') }}">Book A Flight</a>
                @endif
              </button>
            @else
              <button class="cta-main">
                <a href="{{ route('tickets.flights') }}">Book A Flight</a>
              </button>
              <button class="cta-sec">
                <a href="{{ route('register') }}">Sign up</a>
              </button>
            @endauth
          </div>
        </div>
      </div>
    </section>


    <section class="classes">
      <div class="classes-description">
        <h2>Placees waiting for you</h2>
        <h3>It's time to heal your mind and body</h3>
      </div>
      <div class="videos">
        <div class="pilates">
          <h3>Pilates</h3>
          <video muted loop class="video" src="{{ asset('frontend/assets/travel-4.mp4') }}"></video>
        </div>
        <div class="yoga">
          <h3>Yoga</h3>
          <video muted loop class="video" src="{{ asset('frontend/assets/travel-2.mp4') }}"></video>
        </div>
        <div class="meditation">
          <h3>Meditation</h3>
          <video muted loop class="video" src="{{ asset('frontend/assets/travel-3.mp4') }}"></video>
        </div>
      </div>
    </section>
    <section class="about">
      <div class="our-story">
        <h2>About Us</h2>
        <p>
          Always a student, Janet has immersed herself in the ancient practices
          of yoga for over thirty years. A global yoga teacher, she shares the
          teachings from the heart. Through curiosity, devotion, and dedication
          she creates a unique approach to living yoga.
        </p>
      </div>
      <img src="{{ asset('frontend/assets/our-story.jpg') }}" alt="our-story" />
    </section>

  </div>

  <footer>
    <div>
      <p>©
        <script>
          document.write(new Date().getFullYear())
        </script> {{ config('app.name') }}. Crafted with ❤️
      </p>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollTrigger.min.js"></script>
  <script src="{{ asset('frontend/script.js') }}"></script>
</body>

</html>
