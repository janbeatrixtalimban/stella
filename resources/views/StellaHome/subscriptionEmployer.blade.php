@extends('layouts.employerapp')

<title>@yield('pageTitle') Subscription </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
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

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerHome') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                            <p>Home</p>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                        <img src="{{asset('/uploads/avatars/'.Auth::user()->avatar)}}" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                                <span class="d-lg-none d-md-block">   Subscription</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Subscription</a>
                                <a class="dropdown-item" href="{{ url('/employerprofile') }}" style="color:black;"> 
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/employer/viewapplicants') }}" style="color:black;">View Applicants</a>
                                <a class="dropdown-item" href="{{ url('/employer/haggleFee') }}" style="color:black;">View Haggle Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="{{ url('/employer/forgotPassword') }}" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" style="color:black;">Logout</a>
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
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
            @if( Auth::user()->status == 0)
                <h2 class="title" style="color:#1b1b1b;">Why go premium with Stella?</h2>
                <h5 class="description" style="color:black;">With Stella premium, you can avail more features such as viewing the model's profile and their attributes and inviting them to join projects. With just <b>P250 monthly</b>, subscribers can enjoy the privileges of a breezy model scouting process. </h5>
            @else( Auth::user()->status == 1)
                <h2 class="title" style="color:#1b1b1b;">Thank you for subscribing to Stella Premium!</h2>
                <h5 class="description" style="color:black;">Dear {{Auth::user()->firstName}} {{Auth::user()->lastName}}, enjoy your premium subscription! Your subscription will automatically end in {{$diff}} days, be sure to renew your subscription if you want to maintain your premium membership. </h5>
            @endif
                <br><br><br>
                    <div class="col-md-7 ml-auto mr-auto">
                    @if( Auth::user()->status == 0)
                        <div id="jobpost" class="card">
                            <div class="card-body" style="color:#1b1b1b;">
                                <h3 class="card-title text-center">Stella Employer Premium</h3>
                                <p class="card-text">
                                    Subscribe to Stella Premium today to enjoy more!<br><br>
                                </p>
                                <h5><b>Get for P250 monthly</b></h5>
                                <form class="in-line" method="POST" action="{{ url('/freetrial') }}">
                                {{ csrf_field() }}
                                        <input type="hidden" class="form-control" name="userID" id="userID" value="{{ Auth::user()->userID}}" required >
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="0.00" required >
                                        <input type="hidden" class="form-control" id="email" name="email" value="{{ Auth::user()->emailAddress}}"  required> 
                                        <input type="hidden" class="form-control" id="first_name" name="first_name" value="{{ Auth::user()->firstName}}"  required >
                                        <input type="hidden" class="form-control" id="last_name" name="last_name" value="{{ Auth::user()->lastName}}"  required >
                                        <input type="hidden" class="form-control" id="payer_id" name="payer_id" value="{{ Auth::user()->userID}}" required>
                                        <input type="hidden" class="form-control" id="transactiondetails" name="transactiondetails" value="1"  required>
                                    <button type="submit" class="btn btn-info btn-round btn-lg" style="display: {{ $hidetrial }};">7-Day Trial</button><br>
                                <a href="/gopremium" target="_blank" class="btn btn-maroon btn-round btn-lg">Subscribe</a><br>
                                </form>
                                <a href="/employerHome">No, thanks</a>
                            </div>
                            <div class="card-footer text-muted mb-2">
                            </div>
                        </div>
                    @else( Auth::user()->status == 1)
                        <a href="/employerHome" class="btn btn-maroon btn-round btn-lg">Start Browsing!</a>
                    @endif
                    </div>
            </div>
          </div><!--feed content row closing tag -->
      </div><!-- container closing tag-->
    </div>

            </div>
    </div>
@endsection
</div>