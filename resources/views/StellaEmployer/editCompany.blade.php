@extends('layouts.employerapp')

<title>@yield('pageTitle') Edit Profile </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" rel="tooltip" title="Click to go Home" href="{{ url('/employerfeed') }}" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>"  width="90">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                          <img src="<?php echo asset('img/default-profile-pic.png')?>" width="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                            <a class="dropdown-header">Edit Profile</a>
                            <a class="dropdown-item" href="{{ url('/employerapplicants') }}">View Applicants</a>
                            <a class="dropdown-item" href="{{ url('/subscription') }}">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/#') }}">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                          </div>
                        </div>
                      </li>
                    </ul>
              </div>

					</div><!-- nav container closing tag -->
	</nav>
  

  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
      <!-- Logo Header -->
      <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image:url()"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"><!--space-->
                </div>
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black;">
                        <h4>{{ Auth::user()->firstName}}'s Profile</h4>
                        <br>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/editProfile') }}">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/editCompany') }}">Edit Company Details</a>
                            </li>
                            <br>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employerprofile') }}">Go Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="post" action="{{ url('/updateCompany/'.Auth::user()->userID) }}">
                            {{ csrf_field() }}

                            <h3>Edit Profile</h3>
                                <h4>Your Company Details</h4>
                                <!-- Edit Company Name -->
                                    <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>  
                                          </div>
                                          <input type="text" class="form-control" name="name" id="name"  value="{{$details->name}}" placeholder="Company Name">
                                      </div>
                                <!-- Edit Position -->
                                    <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="position" id="position"  value="{{$details->position}}" placeholder="Position">
                                      </div>
                                      <!-- About Company -->
                                    <label>About Company</label>
                                    <div class="input-group input-lg">
                                        <input type="text" class="form-control" name="description" id="description"  value="{{$details->description}}" placeholder="">
                                    </div>
                                
                                <!-- Save button -->
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button>
                            </form>
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">


                  <!-- Ads Card and carousel -->
                      <div class="card">
                        <div class="card-body" style="color:#1b1b1b; height: 18rem;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" style="width: 18rem;" class="text-center carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo asset('img/background1.jpg')?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad title 1</h5>
                                </div>
                              </div>
                              <div class="carousel-item active">
                                <img class="d-block" src="<?php echo asset('img/header.jpg')?>" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad title 2</h5>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo asset('img/header2.jpg')?>" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad Title 3</h5>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <i class="now-ui-icons arrows-1_minimal-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <i class="now-ui-icons arrows-1_minimal-right"></i>
                            </a>
                          </div>
                        </div>
                      </div>

                </div><!-- column closing tag -->
            </div><!-- sm-3 closing tag -->

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


            </div>
    </div>
@endsection
</div>