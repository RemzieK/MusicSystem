
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
    <li><a href="{{ url('explore') }}"class="active">Explore</a></li>
    @auth
        <!-- Show when user is logged in -->
        <li>
        <form method="POST" action="{{ url('/') }}">
    @csrf
    <button type="submit" style="background: none; border: none; padding: 0; color: black; text-decoration: none; cursor: pointer;">Logout</button>
</form>
        </li>
    @endauth

    @guest
        <!-- Show when user is not logged in -->
        <li><a href="{{ route('author.register') }}">Register</a></li>
        <li><a href="{{ route('create.login') }}">Login</a></li>
    @endguest
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>MusicSystem</h6>
          <h2>Discover Some Top Artists</h2>
          <span>Home > <a href="#">Explore</a></span>
        </div>
      </div>
    </div>
    <div class="featured-explore">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-features owl-carousel">
              <div class="item">
                <div class="thumb">
                  <img src="assets/images/featured-01.jpg" alt="" style="border-radius: 20px;">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>Daisy 2.0</h4>
                      <span class="author">
                        
                        <h6>Artist:<br><a href="#">Ashnikko</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <img src="assets/images/featured-02.jpg" alt="" style="border-radius: 20px;">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>Thrill Seeker</h4>
                      <span class="author">
                        
                        <h6>Artist:<br><a href="#">Sub Urban</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <img src="assets/images/featured-03.jpg" alt="" style="border-radius: 20px;">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>Fever Dream</h4>
                      <span class="author">
                       
                        <h6>Artist:<br><a href="#">Palaye Royale</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="thumb">
                  <img src="assets/images/featured-04.jpg" alt="" style="border-radius: 20px;">
                  <div class="hover-effect">
                    <div class="content">
                      <h4>W.D.Y.M</h4>
                      <span class="author">
                        
                        <h6>Artist<br><a href="#">5SOS</a></h6>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @extends('layouts.app')
@section('content')
    @auth
        Authenticated User: {{ Auth::user() }}
        Is Admin: {{ Auth::user()->is_admin }}
    @endauth
    <h1>Database Table</h1>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid #ffffff;">
        <thead>
            <tr>
                <th style="border: 1px solid #ffffff;color: white;">Artist</th>
                <th style="border: 1px solid #ffffff;color: white;">Album</th>
                <th style="border: 1px solid #ffffff;color: white;">Genre</th>
                <th style="border: 1px solid #ffffff;color: white;">Image</th>
                @auth
                    @if(Auth::user()->is_admin)
                        <th style="border: 1px solid #ffffff;color: white;">Actions</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @auth
                @if(Auth::user()->is_admin)
                    <tr>
                        <form action="{{ route('crud.action') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="model" value="albums">
                            <input type="hidden" name="action" value="create">
                            <td><input type="text" name="artist_name" placeholder="Artist Name"></td>
                            <td><input type="text" name="album_name" placeholder="Album Name"></td>
                            <td><input type="text" name="genre" placeholder="Genre"></td>
                            <td><input type="file" name="image"></td>
                            <td>
                                <button type="submit">Create</button>
                            </td>
                        </form>
                    </tr>
                @endif
            @endauth
            @foreach($data as $album)
                <tr>
                    <form action="{{ route('crud.action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="model" value="albums">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="{{ $album->id }}">
                        <td><input type="text" name="artist_name" value="{{ $album->artist->name }}" placeholder="Artist Name"></td>
                        <td><input type="text" name="album_name" value="{{ $album->name }}" placeholder="Album Name"></td>
                        <td><input type="text" name="genre" value="{{ $album->genre->name }}" placeholder="Genre"></td>
                        <td><input type="file" name="image"></td>
                        <td>
                            <button type="submit">Update</button>
                        </td>
                    </form>
                </tr>
            @endforeach
            @foreach($data as $album)
    <tr>
        <td>{{ $album->artist->name }}</td>
        <td>{{ $album->name }}</td>
        <td>{{ $album->genre->name }}</td>
        <td>
            @if($album->images->isNotEmpty())
                @foreach($album->images as $image)
                    <img src="{{ asset($image->image_path) }}" alt="Album Image" style="width: 50px; height: 50px;">
                @endforeach
            @endif
        </td>
        <td>
            @auth
                @if(Auth::user()->is_admin)
                    <form action="{{ route('crud.action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="model" value="albums">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" value="{{ $album->id }}">
                        <button type="submit">Edit</button>
                    </form>
                    <form action="{{ route('crud.action') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="model" value="albums">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="{{ $album->id }}">
                        <button type="submit">Delete</button>
                    </form>
                @endif
            @endauth
        </td>
    </tr>
@endforeach



        </tbody>
    </table>
@endsection














  <div class="discover-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Discover more with our <em>Database</em>.</h2>
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