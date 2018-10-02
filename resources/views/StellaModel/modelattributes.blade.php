@extends('layouts.modelapp')

<title>@yield('pageTitle') Welcome {{ Auth::user()->firstName}}! </title>

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
                        <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                    <div class="side-navbar" style="color:black;">
                        <h4>{{ Auth::user()->firstName}}'s Profile</h4>
                        <br>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modeleditprofile') }}">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modeleditattributes') }}">Edit Attributes</a>
                            </li>
                            <br>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/modelprofile') }}">Go Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="POST" action="/editAttributes">
                            {{ csrf_field() }}

                            <h3>Edit Profile</h3>
                                <h4>Your Attributes</h4>
                                <!-- Eye Color -->
                                      <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="eyeColor" id="eyeColor" required>
                                                <option value="" selected disabled>Eye Color..</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="hazel">Hazel</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="green">Green</option>
                                                    <option value="grey">Grey</option>
                                                    <option value="amber">Amber</option>
                                            </select>
                                        </div>
                                <!-- Hair Color -->
                                <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairColor" id="hairColor" required>
                                                <option value="" selected disabled>Hair Color..</option>
                                                    <option value="black">Black</option>
                                                    <option value="brown">Brown</option>
                                                    <option value="blonde">Blonde</option>
                                                    <option value="ombre">Ombre</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="pink">Pink</option>
                                                    <option value="purple">Purple</option>
                                                    <option value="red">Red</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="green">Green</option>
                                                    <option value="grey">Grey</option>
                                                    <option value="highlights">Highlights</option>
                                            </select>
                                        </div> 
                                <!-- Hair Length -->
                                        <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairLength" id="hairLength" required>
                                                <option value="" selected disabled>Hair Length..</option>
                                                    <option value="bald">Bald</option>
                                                    <option value="boy cut">Boy Cut</option>
                                                    <option value="short bob">Short Bob</option>
                                                    <option value="shoulder length">Shoulder Length</option>
                                                    <option value="medium">Medium Length</option>
                                                    <option value="long">Long</option>
                                            </select>
                                        </div>
                                <!--Weight-->
                                <div class="input-group input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="weight" placeholder="Weight in pounds" required>
                                        </div>
                                <!--Height-->
                                <div class="input-group input-lg">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="height" placeholder="Height in cm" required>
                                        </div>
                                <!-- Skin Color -->
                                        <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="skinColor" id="skinColor">
                                                <option value="" selected disabled>Skin Color..</option>
                                                    <option value="fair">Fair</option>
                                                    <option value="light beige">Light Beige</option>
                                                    <option value="medium beige">Medium Beige</option>
                                                    <option value="tanned">Tanned</option>
                                                    <option value="morena">Morena</option>
                                            </select>
                                        </div>
                                <!-- Gender -->
                                      <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="gender" id="gender">
                                                <option value="" selected disabled>Gender..</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="transgender male">Transgender Male</option>
                                                    <option value="transgender female">Transgender Female</option>
                                            </select>
                                        </div>
                                <!-- Skill -->
                                        <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="skill" id="role" required>
                                                <option value="" selected disabled>Choose your specialization..</option>
                                                    <option value="Fashion Model">Fashion(Editorial) model</option>
                                                    <option value="Runway Model">Runway model</option>
                                                    <option value="Commercial Model">Commercial model</option>
                                                    <option value="Plus Size Model">Plus size model</option>
                                                    <option value="Petite Model">Petite model</option>
                                                    <option value="Swimsuit Model">Swimsuit Model</option>
                                                    <option value="Lingerie Model">Lingerie Model</option>
                                                    <option value="Glamour Model">Glamour Model</option>
                                                    <option value="Fitness Model">Fitness Model</option>
                                                    <option value="Fitting Model">Fitting Model</option>
                                                    <option value="Parts Model">Parts Model</option>
                                                    <option value="Promotional Model">Promitional Model</option>
                                                    <option value="Mature Model">Mature Model</option>
                                            </select>
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