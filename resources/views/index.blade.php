@extends('layouts.app')
@section('content')

  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    
                    <a href="index.html" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" alt="">
                    </a>
                  
                    <ul class="nav">
    <li><a href="{{ url('index') }}"class="active">Home</a></li>
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
       
        <li><a href="{{ route('author.register') }}">Register</a></li>
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
 
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="header-text">
            <h6>MusicSystem</h6>
            <h2>Where Beats and Emotions Collide</h2>
            <p>Dive into the pulsating universe of modern soundscapes, where rhythms and emotions converge in a dance of sonic innovation. From the digital whispers of synthesizers to the bold declarations of bass, this is more than music—it's an exploration of the contemporary heartbeat.</p>
            <div class="buttons">
              <div class="border-button">
                <a href="explore">Explore</a>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="owl-banner owl-carousel">
            <div class="item">
              <img src="{{asset('assets/images/banner-01.png')}}" alt="">
            </div>
            <div class="item">
              <img src="{{asset('assets/images/banner-02.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="categories-collections">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="categories">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Browse Through Our <em>Database</em>.</h2>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-01.png')}}" alt="">
                  </div>
                  <h4>Songs</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-02.png')}}" alt="">
                  </div>
                  <h4>Music Art</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-03.png')}}" alt="">
                  </div>
                  <h4>Artists</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-04.png')}}" alt="">
                  </div>
                  <h4>Albums</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-05.png')}}" alt="">
                  </div>
                  <h4>Genres</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 col-sm-6">
                <div class="item">
                  <div class="icon">
                    <img src="{{asset('assets/images/icon-06.png')}}" alt="">
                  </div>
                  <h4>Bands</h4>
                  <div class="icon-button">
                    <a href="#"><i class="fa fa-angle-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="collections">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h2>Explore Some Hot <em>Artist</em> Right Now.</h2>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="owl-collection owl-carousel">
                  <div class="item">
                    <img src="{{asset('assets/images/collection-01.jpg')}}" alt="">
                    <div class="down-content">
                      <h4>Maneskin</h4>
                      <span class="collection">Sold Albums:<br><strong>2 million</strong></span>
                      <span class="category">Category:<br><strong>Italian pop</strong></span>
                      <div class="main-button">
                        <a href="explore">Explore</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/images/collection-02.jpg')}}" alt="">
                    <div class="down-content">
                      <h4>Doja Cat</h4>
                      <span class="collection">Sold Albums:<br><strong>34 million</strong></span>
                      <span class="category">Category:<br><strong>Pop</strong></span>
                      <div class="main-button">
                        <a href="explore">Explore</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/images/collection-03.jpg')}}" alt="">
                    <div class="down-content">
                      <h4>Palaye Royale</h4>
                      <span class="collection">Sold Albums:<br><strong>12 millon</strong></span>
                      <span class="category">Category:<br><strong>Art rock</strong></span>
                      <div class="main-button">
                        <a href="explore">Explore</a>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <img src="{{asset('assets/images/collection-04.jpg')}}" alt="">
                    <div class="down-content">
                      <h4>Sub Urban</h4>
                      <span class="collection">Sold Albums:<br><strong>4 million</strong></span>
                      <span class="category">Category:<br><strong>Dark pop</strong></span>
                      <div class="main-button">
                        <a href="explore">Explore</a>
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
            <a href="author">Register</a>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item first-item">
            <div class="number">
              <h6>1</h6>
            </div>
            <div class="icon">
              <img src="{{asset('assets/images/icon-02.png')}}" alt="">
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
              <img src="{{asset('assets/images/icon-04.png')}}" alt="">
            </div>
            <h4>Check for new/ non added records!</h4>
            <p>Check to see if your database is missing something and fill it up, now the power is in your hands!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item">
            <div class="icon">
              <img src="{{asset('assets/images/icon-06.png')}}" alt="">
            </div>
            <h4>Create, Update, Delete</h4>
            <p>By our user friendly interface you can create new records, update the ones left in the past, edit if you found a mistake and delete a record you don't think that should be there.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection