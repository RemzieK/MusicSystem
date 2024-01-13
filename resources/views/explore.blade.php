@extends('layouts.app')
@section('content')

  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                  
                    <a href="index.html" class="logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="">

                    </a>
                 
                    <ul class="nav">
    <li><a href="{{ url('index') }}">Home</a></li>
    <li><a href="{{ url('explore') }}"class="active">Explore</a></li>
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
                  <img src="{{asset('assets/images/featured-01.jpg')}}" alt="" style="border-radius: 20px;">
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
                  <img src="{{asset('assets/images/featured-02.jpg')}}" alt="" style="border-radius: 20px;">
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
                  <img src="{{asset('assets/images/featured-03.jpg')}}" alt="" style="border-radius: 20px;">
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
                  <img src="{{asset('assets/images/featured-04.jpg')}}" alt="" style="border-radius: 20px;">
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
  <div class="discover-items">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2>Discover more with our <em>Database</em>.</h2>
          </div>
        </div>

      @if(Auth::check())
        <a href="{{ route('explore.create') }}">
        <button type="button">Create</button>
        </a>
      @endif

      <form action="{{ route('explore.search') }}" method="GET">
          <input type="text" name="artist" placeholder="Artist"/>
          <input type="text" name="album" placeholder="Album"/>
          <input type="text" name="genre" placeholder="Genre"/>
          <input type="text" name="release_year" placeholder="Release Year"/>
          <button type="submit">Search</button>
      </form>
      @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
              {{ session()->forget('error') }}
          </div>
      @endif

<table style="border-collapse: collapse; width: 100%; border: 1px solid white;">
    <thead>
        <tr>
            <th style="border: 1px solid white; color: white;">Artist</th>
            <th style="border: 1px solid white; color: white;">Album</th>
            <th style="border: 1px solid white; color: white;">Genre</th>
            <th style="border: 1px solid white; color: white;">Is Group</th>
            <th style="border: 1px solid white; color: white;">Release Year</th>
            <th style="border: 1px solid white; color: white;">Image</th>
            <th style="border: 1px solid white; color: white;">Actions</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($data))
        @foreach($data as $album)
            <tr>
                <td style="color: white; border: 1px solid white;">{{ $album->artist->name }}</td>
                <td style="color: white; border: 1px solid white;">{{ $album->name }}</td>
                <td style="color: white; border: 1px solid white;">{{ $album->genre->name }}</td>
                <td style="color: white; border: 1px solid white;">{{ $album->is_group ? 'Yes' : 'No' }}</td>
                <td style="color: white; border: 1px solid white;">{{ $album->release_year }}</td>
                <td style="color: white; border: 1px solid white;">
                    @if($album->images->isNotEmpty())
                        @foreach($album->images as $image)
                            <img src="{{ asset($image->image_path) }}" alt="Album Image" style="width: 130px; height: 120px;">
                            @if(Auth::check())
                                <form action="{{ route('images.delete', $image->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            @endif
                        @endforeach
                    @endif
                    @if(Auth::check())
                        <form action="{{ route('images.upload', $album->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="model" value="albums">
                            <input type="hidden" name="action" value="upload">
                            <input type="hidden" name="id" value="{{ $album->id }}">
                            <input type="file" name="image" id="image" style="color: white;" onchange="document.getElementById('preview').style.display = 'block'; readURL(this);">
                            <img id="preview" src="#" alt="your image" style="width: 50px; height: 50px; display: none;"/>
                            <button type="submit" style=" border: 1px solid white;">Upload</button>
                        </form>
                    @endif
                </td>
                @if(Auth::check())
                <td style="color: white; border: 1px solid white;">
                    <a href="{{ route('explore.edit', $album->id) }}">
                        <button type="button">Edit</button>
                    </a>
                    
                        <form action="{{ route('explore.delete', $album->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style=" border: 1px solid white;">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
@endsection
