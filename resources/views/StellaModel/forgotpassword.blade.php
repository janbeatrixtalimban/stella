@extends('layouts.modelapp')

<title>@yield('pageTitle') Settings </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
    <!-- Navigation bar hehe -->
    <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/modelfeed ') }}" rel="tooltip" title="Go to Homepage" data-placement="bottom">
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
                            <a class="nav-link" href="{{ url('/modelfeed') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                                <span class="d-lg-none d-md-block">   Edit Profile</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Edit Profile</a>
                                <a class="dropdown-item" href="{{ url('/modelprofile') }}" style="color:black;">
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/model/viewJobOffers') }}" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscription') }}" style="color:black;">Subscription</a> 
                                <a class="dropdown-item" href="{{ url('/model/forgotPassword') }}" style="color:black;">Settings</a>
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
        <div class="page-header-image" style="background-image:url()"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"><!--space-->
                </div>
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black;">
                        <h4>Settings</h4>
                        <br>
                        
                    </div>
                </div>
        <!-- Form -->
                <div class="col-sm-4" style="color:black;">
                    <h3>Change Password</h3><br>
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="POST" action="/model/changePassword">
                                {{ csrf_field() }}
                                @if (\Session::has('failure'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('failure') !!}
                                    </div>
                                @endif
                                @if (\Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {!! \Session::get('success') !!}
                                    </div>
                                @endif
                        
                        <!-- Current Password -->
                        <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                                <br><br>
                        <!-- New Password -->
                                <div class="form-group">    
                                    <label>New Password</label>   
                                    <input type="password" class="form-control" id="npassword" name="npassword" value="" required> 
                                </div> 
                        <!-- Confirm Password -->
                                <div class="form-group">    
                                    <label>Confirm Password</label>   
                                    <input type="password" class="form-control" id="vpassword" name="vpassword" value="" required> 
                                </div>
                        <!-- Save button -->
                            <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button><br>
                            <a class="link" href="{{ url('/modelprofile') }}">Cancel</a>

                            </form>
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

        <!--End of form -->
        
                <div class="col-sm-1"><!--space-->
                </div>


            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


            </div>
    </div>
@endsection
</div>