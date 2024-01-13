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
        <li><a href="{{ route('author.register') }}">Register</a></li>
        <li><a href="{{ route('login') }}"class="active">Login</a></li>
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

  <div class="page-heading normal-space">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Welcome back!</h6>
          <h2>Login into your account</h2>
          <span>Home > <a href="#">Login</a></span>
          <div class="buttons">
            <div class="main-button">
              <a href="explore">Explore</a>
            </div>
            <div class="border-button">
              <a href="author">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="item-details-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Admin <em>login</em> Here.</h2>
          </div>
        </div>
<div style="text-align: center;">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}" style="border: 3px solid #f1f1f1; width: 60%; margin: auto; margin-top: 1%; padding: 16px;">
            @csrf
            <div style="margin-bottom: 16px;">
                <label for="email" style="color:white">Email</label>
                <input type="email" name="email" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            </div>
            <div style="margin-bottom: 16px;">
                <label for="password"style="color:white">Password</label>
                <input type="password" name="password" style="width: 50%; padding: 10px 15px; margin: 6px 0; display: inline-block; border: 3px solid #ccc; box-sizing: border-box;" required>
            </div>
            <button type="submit" style="background-color: #aa048b; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;">Login</button>
        </form>
    </div>
    </div>
    </div>
  </div>
@endsection
