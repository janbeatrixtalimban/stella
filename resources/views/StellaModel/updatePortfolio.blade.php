@extends('layouts.modelapp')

<title>@yield('pageTitle') {{ Auth::user()->firstName}} {{ Auth::user()->lastName}} </title>


@section('content')

<body class="profile-page sidebar-collapse">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate">
              <a class="navbar-brand" href="{{ url('/modelfeed') }}" rel="tooltip" title="Return to Feed" data-placement="bottom">
                  <img src="<?php echo asset('img/logo_white.png')?>" width="100">
              </a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar top-bar"></span>
                <span class="navbar-toggler-bar middle-bar"></span>
                <span class="navbar-toggler-bar bottom-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="navbar-brand" href="{{ url('/modelfeed ') }}" data-placement="bottom">
                          Home
                    </a>
                </li>
                <li class="nav-item">
                      <div class="dropdown button-dropdown">
                            <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                              <span class="button-bar"></span>
                              <span class="button-bar"></span>
                              <span class="button-bar"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-header">Profile</a>
                              <a class="dropdown-item" href="#">View Job Offers</a>
                              <a class="dropdown-item" href="{{ url('/subscription') }}">Subscription</a>
                              <a class="dropdown-item" href="#">Settings</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                            </div>
                      </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->

        <iframe src="{{ url('/imagegalleryview/'.Auth::user()->userID) }}" style="height:900px;width:900px;border:none;" scrolling="no"></iframe>
</body>      
@endsection