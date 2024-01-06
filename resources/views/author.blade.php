<link rel="stylesheet" href="{{ asset('css/template.css') }}">
<script src="{{ asset('js/template.js') }}"></script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="templatemo">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>MusicSystem</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

  </head>
<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <ul class="nav">
                    <li><a href="{{ url('index') }}">Home</a></li>
                    <li><a href="{{ url('explore') }}">Explore</a></li>
                @auth
            <li>
                <form method="POST" action="{{ url('/') }}">
                 @csrf
                <button type="submit" style="background: none; border: none; padding: 0; color: black; text-decoration: none; cursor: pointer;">Logout</button>
                </form>
            </li>
    @endauth
    @guest
        <li><a href="{{ route('author.register') }}"class="active">Register</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
    @endguest
</ul>
          <a class='menu-trigger'>
             <span>Menu</span>
          </a>
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  @extends('layouts.app')
@section('content')
  <div class="page-heading normal-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>AdminPanel</h6>
          <h2>Register now</h2>
          <span>Home > <a href="#">AdminPanel</a></span>
          <div class="buttons">
            <div class="main-button">
              <a href="explore">Explore</a>
            </div>
            <div class="border-button">
              <a href="create">Login</a>
             </div>
             </div>
    <div style="text-align: center;">
    <form method="POST" action="{{ route('author.register') }}" style="border: 3px solid #f1f1f1; width: 60%; margin: auto; margin-top: 1%; padding: 16px;">
    @csrf
    @if(session('error'))
        <div style="color: red; margin-bottom: 16px;">{{ session('error') }}</div>
    @endif
    <div style="margin-bottom: 16px;">
        <label for="name" style="color:white;">Name</label>
        <input type="text" name="name" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
    </div>
    <div style="margin-bottom: 16px;">
        <label for="email" style="color:white;">Email</label>
        <input type="email" name="email" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
        @if ($errors->has('email'))
            <div style="color: red;">{{ $errors->first('email') }}</div>
        @endif
    </div>
    <div style="margin-bottom: 16px;">
        <label for="password" style="color:white;">Password</label>
        <input type="password" name="password" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
        @if ($errors->has('password'))
            <div style="color: red;">{{ $errors->first('password') }}</div>
        @endif
    </div>
    <button type="submit" style="background-color: #aa048b; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;">Register</button>
</form>
    </div>
        </div>
      </div>
    </div>
  </div>
 @endsection

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>

  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>
  </body>
</html>