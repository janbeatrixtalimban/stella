@extends('layouts.modelapp')

<title>@yield('pageTitle') Subscription </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" rel="tooltip" title="Click to go Home" href="{{ url('/modelfeed') }}" data-placement="bottom">
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
                        <a class="navbar-brand" href="{{ url('/modelfeed ') }}" data-placement="bottom">
                            Home
                        </a>
                        </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                            <a class="dropdown-header">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/modeljoboffers') }}">View Job Offers</a>
                            <a class="dropdown-item" href="{{ url('/subscription') }}">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/modelsettings') }}">Settings</a>
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
        <div class="page-header-image" ></div>
      <!-- End logo header -->


      <!-- Body content -->
      <div class="section section-introduction">
        <div class="container" >
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title" style="color:#1b1b1b;">Why go premium with Stella?</h2>
                <h5 class="description" style="color:black;">With Stella premium, you can avail more features such as viewing more job details and applying to the job post and getting invites from employers to join their projects. With just <b>P169 monthly</b>, subscribers can enjoy the privileges of a breezy job hunting process. </h5>
                <br><br><br>
                    <div class="col-md-7 ml-auto mr-auto">
                        <div id="jobpost" class="card">
                            <div class="card-body" style="color:#1b1b1b;">
                                <h3 class="card-title text-center">Stella Model Premium</h3>
                                <p class="card-text">
                                    Subscribe to Stella Premium today to enjoy more!<br><br>
                                </p>
                                <h5><b>Get for P169 monthly</b></h5>
                                <a href="/gopremium" class="btn btn-maroon btn-round btn-lg">Subscribe</a><br>
                                <a href="/modelfeed">No thanks</a>
                            </div>
                            <div class="card-footer text-muted mb-2">
                            </div>
                        </div>
                    </div>
            </div>
          </div><!--feed content row closing tag -->
      </div><!-- container closing tag-->
    </div>

            </div>
    </div>
@endsection
</div>