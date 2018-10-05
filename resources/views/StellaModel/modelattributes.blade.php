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

                <div class="col-sm-3">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="POST" action="{{ url('/updateAttribute/'.Auth::user()->userID) }}">
                            {{ csrf_field() }}

                            <h3>Edit Your Attributes</h3>
                                <!-- Eye Color -->
                                <label>Eye Color</label>
                                <div class="input-group input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="eyeColor" id="eyeColor" value="{{$details->eyeColor}}" required>
                                                <option value="" selected disabled>{{$details->eyeColor}}</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Hazel">Hazel</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Amber">Amber</option>
                                            </select>
                                        </div>
                                <!-- Hair Color -->
                                <label>Hair Color</label>
                                <div class="input-group input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairColor" id="hairColor" required>
                                                <option value="" selected disabled> {{$details->hairColor}} </option>
                                                    <option value="Black">Black</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Blonde">Blonde</option>
                                                    <option value="Ombre">Ombre</option>
                                                    <option value="Orange">Orange</option>
                                                    <option value="Pink">Pink</option>
                                                    <option value="Purple">Purple</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Highlights">Highlights</option>
                                            </select>
                                        </div> 
                                <!-- Hair Length -->
                                <label>Hair Length</label>
                                        <div class="input-group input-sm">
                                                
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairLength" id="hairLength" value="{{$details->hairLength}}" required>
                                                <option value="" selected disabled>{{$details->hairLength}} </option>
                                                    <option value="Bald">Bald</option>
                                                    <option value="Boy Cut">Boy Cut</option>
                                                    <option value="Short Bob">Short Bob</option>
                                                    <option value="Shoulder Length">Shoulder Length</option>
                                                    <option value="Medium Length">Medium Length</option>
                                                    <option value="Long">Long</option>
                                            </select>
                                        </div>
                                <!--Weight-->
                                <label>Weight (lbs)</label>
                                <div class="input-group input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="weight" value="{{$details->weight}}" placeholder="Weight in pounds" required>
                                        </div>
                                <!--Height-->
                                <label>Height (cm)</label>
                                <div class="input-group input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="height" value="{{$details->height}}" placeholder="Height in cm" required>
                                        </div>
                                <!--Waist-->
                                <label>Waist (inch)</label>
                                <div class="input-group input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="waist" value="{{$details->waist}}" placeholder="Waist in cm" required>
                                        </div>
                                <!--hips-->
                                <label>Hips (inch)</label>
                                <div class="input-group input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="hips" value="{{$details->hips}}" placeholder="Hips in cm" required>
                                        </div>
                                
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->
            <div class="col-sm-3">
                <div class="cointainer" style="color:black;">
                    <!-- Skin Color -->
                        <br><br>
                        <label>Complexion</label>
                        <div class="input-group input-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <select size="0.5" class="form-control" name="complexion" id="complexion" required>
                                <option value="" selected disabled>{{$details->complexion}}</option>
                                    <option value="Fair">Fair</option>
                                    <option value="Light Beige">Light Beige</option>
                                    <option value="Medium Beige">Medium Beige</option>
                                    <option value="Tanned">Tanned</option>
                                    <option value="Morena">Morena</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Black">Black</option>
                            </select>
                        </div>
                    <!-- Chest-->
                         <label>Chest (inch)</label>
                            <div class="input-group input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="chest" value="{{$details->chest}}" placeholder="Chest in cm" required>
                            </div>
                    <!-- Gender -->
                        <label>Gender</label>
                            <div class="input-group input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <select size="0.5" class="form-control" name="gender" id="gender" required>
                                    <option value="" selected disabled>{{$details->gender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender Male">Transgender Male</option>
                                        <option value="Transgender Female">Transgender Female</option>
                                </select>
                            </div>
                    <!--Shoe-->
                        <label>Shoe Size (US)</label>
                        <div class="input-group input-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                                <input type="text" class="form-control" name="shoeSize" value="{{$details->shoeSize}}" placeholder="shoe size" required>
                            </div>
                <!--Tatto-->
                        <label>Tattoos/Scars</label>
                        <div class="input-group input-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <select size="0.5" class="form-control" name="tatoo" id="tatoo" required>
                                    <option value="" selected disabled>{{$details->tatoo}}</option>
                                    <option value="Tatooed">Tatoo/s</option>
                                    <option value="Scarred">Scar/s</option>
                                    <option value="None">None</option>
                            </select>
                        </div>
                <!-- Save button -->
                    <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button>
            </form>

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