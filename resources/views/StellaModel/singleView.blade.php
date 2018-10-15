@extends('layouts.employerapp')

<title>@yield('pageTitle') {{ $user->firstName}} {{ $user->lastName}} </title>


@section('content')
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/employerHome') }}" rel="tooltip" title="Go to Homepage" data-placement="bottom">
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
                              <a class="nav-link" href="{{ url('/employerHome') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                  <p>Home</p>
                              </a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
                            <p>
                              <span class="d-lg-none d-md-block"> {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</span>
                            </p>
                            </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <p>
                                    <i class="now-ui-icons">
                                      <span class="button-bar"></span>
                                      <span class="button-bar"></span>
                                      <span class="button-bar"></span>
                                    </i>
                                    <span class="d-lg-none d-md-block">  View {{ $user->firstName}}'s Profile</span>
                                  </p>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header">View {{ $user->firstName}}'s Profile</a>
                                <a class="dropdown-item" href="{{ url('/viewapplicants') }}" style="color:black;">View Applicants</a>
                                <a class="dropdown-item" href="{{ url('/viewhaggles') }}" style="color:black;">View Haggle Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="{{ url('/settings') }}" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" style="color:black;">Logout</a>
                            </div>
                      </li>
                  </ul>

      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  
  <div class="wrapper">
    <div class="page-header page-header-model clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="/uploads/avatars/{{ $user->avatar }}" alt="">
        </div>
        <h3 class="headtitle">{{ $user->firstName}} {{ $user->lastName}}</h3>
        <p class="category"></p>
        <div class="content">
          <div class="social-description">
            <h5>{{ $user->birthDate}}</h5>
            <p>Years old</p>
          </div>
          <div class="social-description">
            <h5>{{ $user->location}}</h5>
            <p>Location</p>
          </div>
          <div class="social-description">
            <h5>{{$details->gender}}</h5>
            <p>Gender</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">

          <a data-toggle="modal" data-target="#{{$user->userID}}" style="color:white;" class="btn btn-maroon btn-round btn-lg">Leave Feedback</a>
        </div>

<!-- View Job detials Modal -->
<div id="{{$user->userID}}" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <div class="column">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                      </div>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <h5>Project Details</h5>
                      @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('feedbacks.store') }}" method="post" enctype="multipart/form-data">

    @csrf 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID</strong>
                <input type="text" name="userID" class="form-control" value="{{ Auth::user()->userID}}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reciever ID</strong>
                <input type="text" name="reciever" class="form-control" value="{{ $user->userID}}" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project ID</strong>
                <input type="text" name="projectID" class="form-control" value="0" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rating</strong><br>
                <input type="radio" name="gender" value="1"> 1<br>
  <input type="radio" name="rate" value="2"> 2<br>
  <input type="radio" name="rate" value="3"> 3<br>
  <input type="radio" name="rate" value="4"> 4<br>
  <input type="radio" name="rate" value="5" checked> 5<br>


                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments:</strong>
                <textarea class="form-control" style="height:150px" name="comment" placeholder="Detail"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->

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
                  <b>Tattoo or Scars:</b> {{$details->tatoo}}
                </h5>
                
                <h4 class="title">Feedbacks</h4>
                <h6 class="description text-left" style="color:#1b1b1b;">
                <h1>⋆⋆⋆⋆⋆</h1>
                @foreach ($feedback as $feedback)
                "{{$feedback->comment}}"<br><br>
                @endforeach
                
                </h5>
                
            </div> 
            <div class="col-sm-10">
                <h4 class="title text-center">View My Portfolio</h4>
                <!-- Portfolio Viewer -->
                <iframe src="{{ url('/imagegalleryview/'.$user->userID) }}" style="height:100%;width:100%;border:none;" scrolling="no"></iframe>
            </div>
        </div>
        <div class="row">
          <div class="container">
          </div>


        </div>
      </div>
    </div>
@endsection