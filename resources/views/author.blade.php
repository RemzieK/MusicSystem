
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
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
    <li><a href="{{ url('index') }}">Home</a></li>
    <li><a href="{{ url('explore') }}">Explore</a></li>
    @if(session('user'))
       
        <li>
            <form method="POST" action="{{ url('index') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </li>
    @else
       
        <li><a href="{{ url('author') }}">Register</a></li>
        <li><a href="{{ url('create') }}">Login</a></li>
    @endif
</ul>


 
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading normal-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>AdminPanel</h6>
          <h2>Register now</h2>
          <span>Home > <a href="#">AdminPanel</a></span>
          <div class="buttons">
            <div class="main-button">
              <a href="explore.html">Explore</a>
            </div>
            <div class="border-button">
              <a href="create.html">?</a>


@extends('layouts.app')

@section('content')
    <div style="text-align: center;">
        <h2>Admin Registration</h2>

        <form method="POST" action="{{ url('author') }}" style="border: 3px solid #f1f1f1; width: 60%; margin: auto; margin-top: 10%; padding: 16px;">
            @csrf

            <div style="margin-bottom: 16px;">
                <label for="name">Name</label>
                <input type="text" name="name" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 16px;">
                <label for="email">Email</label>
                <input type="email" name="email" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 16px;">
                <label for="password">Password</label>
                <input type="password" name="password" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            </div>

            <div style="margin-bottom: 16px;">
                <label for="role">Role</label>
                <input type="text" name="role" value="admin" readonly style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;">
            </div>

            <button type="submit" style="background-color: #aa048b; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;">Register</button>
        </form>
    </div>
@endsection








            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <div class="create-nft">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Become admin so you too can add the new hits!</h2>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="main-button">
            <a href="explore.html">Explore</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item first-item">
            <div class="number">
              <h6>1</h6>
            </div>
            <div class="icon">
              <img src="assets/images/icon-02.png" alt="">
            </div>
            <h4>Set Up Your Profile</h4>
            <p>Just add little information about yourself and whitin seconds you'll have the power to change everything!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item second-item">
            <div class="number">
              <h6>2</h6>
            </div>
            <div class="icon">
              <img src="assets/images/icon-04.png" alt="">
            </div>
            <h4>Check for new/ non added records!</h4>
            <p>Check to see if your database is missing something and fill it up, now the power is in your hands!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="icon">
              <img src="assets/images/icon-06.png" alt="">
            </div>
            <h4>Create, Update, Delete, Edit</h4>
            <p>By our user friendly interface you can create new records, update the ones left in the past, edit if you found a mistake and delete a record you don't think that should be there.</p>
          </div>
        </div>
      </div>
    </div>
  </div>





  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 <a href="#">Liberty</a> NFT Marketplace Co., Ltd. All rights reserved.
          &nbsp;&nbsp;
          Designed by <a title="HTML CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>

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