
@extends('layouts.modelapp')

<title>@yield('pageTitle') Create Portfolio </title>

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
                            <a class="dropdown-header">Edit Profile</a>
                            <a class="dropdown-item" href="{{ url('/modeljoboffers') }}">View Job Offers</a>
                            <a class="dropdown-item" href="{{ url('/modelsubscription') }}">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/modelsetting') }}">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/stellahome') }}">Logout</a>
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
                    <div class="side-navbar">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                        <form action="/createPortfolio" class="form-image-upload" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                        </ul>
                                    </div>
                                @endif

                            <br>
                            <h3>Add Picture to Portfolio</h3><br>
                            <p>You may add up to 12 of your best photos to the portfolio</p>
                                <!-- Upload Image -->
				                    <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="file" name="image[]" class="form-control" multiple required>
                                      </div>
                                <!-- Create button -->
                                    <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Add</button><br>
                                    <a class="link" href="{{ url('/modelprofile') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-3"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
            </div><!-- sm-3 closing tag -->

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


            </div>
    </div>
@endsection
</div>