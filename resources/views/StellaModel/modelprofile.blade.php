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
          <li class="nav-item">
                <div class="dropdown button-dropdown">
                      <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Profile</a>
                        <a class="dropdown-item" href="{{ url('/modeljoboffers') }}">View Job Offers</a>
                        <a class="dropdown-item" href="{{ url('/modelsubscription') }}">Subscription</a>
                        <a class="dropdown-item" href="{{ url('/modelsettings') }}">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/stellahome') }}">Logout</a>
                      </div>
                </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  
  <div class="wrapper">
    <div class="page-header page-header-model clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg5.jpg');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="<?php echo asset('img/default-profile-pic.png')?>" alt="">
        </div>
        <div class="row justify-content-center">
          <a data-toggle="modal" href="#profilepic" type="submit" rel="tooltip" title="Upload a Profile Picture" style="color:white; padding-top:10px;">Edit Picture</a>
        </div>
        <h3 class="headtitle">{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h3>
        <p class="category">(Skill Set)</p>
        <div class="content">
          <div class="social-description">
            <h5>{{ Auth::user()->birthDate}}</h5>
            <p>Years old</p>
          </div>
          <div class="social-description">
            <h5>{{ Auth::user()->location}}</h5>
            <p>Location</p>
          </div>
          <div class="social-description">
            <h5> {{$details->gender}} </h5>
            <p>Gender</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">
          <a href="{{ url('/modeleditprofile') }}" class="btn btn-maroon btn-round btn-lg">Edit Profile</a>
          <a href="{{ url('/addPortfolio') }}" class="btn btn-maroon btn-round btn-lg">Add to Portfolio</a>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2">
                <h4 class="title">My Attributes</h4>
                <h5 class="description text-left" style="color:#1b1b1b;">
                  <b>Eye Color:</b> {{$details->eyeColor}}<br>
                  <b>Hair Color:</b> {{$details->hairColor}}<br>
                  <b>Hair Length:</b> {{$details->hairLength}}<br>
                  <b>Weight:</b> {{$details->weight}}<br>
                  <b>Height:</b> {{$details->height}}<br>
                  <b>Chest:</b> {{$details->chest}}<br>
                  <b>Waist:</b> {{$details->waist}}<br>
                  <b>Hips:</b> {{$details->hips}}<br>
                  <b>Complexion:</b> {{$details->complexion}}<br>
                  <b>Shoe size:</b> {{$details->shoeSize}}<br>
                  <b>Tattoo or Scars:</b> {{$details->tatoo}}<br>
                </h5>
            </div>
            <div class="col-sm-10">
                <h4 class="title text-center">View My Portfolio</h4>
                <!-- Portfolio Viewer -->
                <iframe src="{{ url('/imagegalleryview/'.Auth::user()->userID) }}" style="height:900px;width:900px;border:none;" scrolling="no"></iframe>
            </div>
        </div>
        <div class="row">
          <div class="container">
          </div>
          


    <!-- Upload Profile Picture Modal -->
      <div id="profilepic" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog tncmodal" role="document">

          <!-- Modal content-->
          <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Profile Picture</h4>
              </div>
              <div class="modal-body">
                  <form action="{{ url('/avatar/'.Auth::user()->userID) }}" method="post" enctype="">
                  {{ csrf_field() }}
                          <div class="input-group no-border input-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                              </span>
                            </div>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                          </div>
                          <button type="submit" class="btn btn-success btn-round">Upload</button>
                          <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>
                  </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
        </div>
        <!-- End of Modal -->
         


        </div>
      </div>
    </div>
@endsection