@extends('layouts.employerapp')

<title>@yield('pageTitle') Edit Profile </title>

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
                                <span class="d-lg-none d-md-block">   Edit Company Details</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Edit Company Details</a>
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
                                <a class="nav-link" href="{{ url('/editProfileEmp') }}">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/editCompany') }}">Edit Company Details</a>
                            </li><br> <br>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="post" action="{{ url('/updateCompany/'.Auth::user()->userID) }}">
                            {{ csrf_field() }}

                            <h3>Edit Profile</h3>
                                
                                    @if (\Session::has('desc'))
                                        <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('desc') !!}
                                        </div>
                                    @endif
				    @if (\Session::has('other'))
                                        <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('other') !!}
                                        </div>
                                    @endif


                                <h4>Your Company Details</h4><br>
                                <!-- Edit Company Name -->
                                    <label>Company Name</label>
                                    <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>  
                                          </div>
                                          <input type="text" class="form-control" name="name" id="name"  value="{{$details->name}}" placeholder="Company Name">
                                      </div>
                                <!-- Edit Position -->
                                    <label>Position</label>
                                    <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="position" id="position"  value="{{$details->position}}" placeholder="Position">
                                      </div><br>
                                <!-- About Company -->
                                    <label>About Company (Max. 300 Characters)</label>
                                    <div class="input-group input-lg">
                                        <textarea class="form-control" name="description" id="description" rows="5" value="">{{$details->description}}</textarea>
                                    </div>
                                
                                <!-- Save button -->
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button><br>
                                <a class="link" href="{{ url('/employerprofile') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

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