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
                                <a class="nav-link" href="{{ url('/modelattribute') }}">Edit Attributes</a>
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
                            <form method="POST" action="{{ url('/updateAttribute/'.Auth::user()->userID) }}">
                                {{ csrf_field() }}
                                
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="{{ Auth::user()->firstName}}" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastName" value="{{ Auth::user()->lastName}}"  readonly="true">
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" >
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <select size="0.5" class="form-control" name="location" id="location" required>
                                            <option value="" selected disabled>Select your location..</option>
                                            <optgroup label="Luzon" style="color: black;">
                                                <option value="abra">Abra</option>
                                                <option value="albay">Albay</option>
                                                <option value="apayo">Apayo</option>
                                                <option value="aurora">Aurora</ option>
                                                <option value="bataan">Bataan</option>
                                                <option value="batanes">Batanes</option>
                                                <option value="batangas">Batangas</option>
                                                <option value="benguet">Benguet</option>
                                                <option value="bulacan">Bulacan</option>
                                                <option value="cagayan">Cagayan</option>
                                                <option value="camarines">Camarines</option>
                                                <option value="catanduanes">Catanduanes</option>
                                                <option value="cavite">Cavite</option>
                                                <option value="ifugao">Ifugao</option>
                                                <option value="ilocos">Ilocos</option>
                                                <option value="isabela">Isabela</option>
                                                <option value="kalinga">Kalinga</option> 
                                                <option value="lu">La Union</option>
                                                <option value="laguna">Laguna</option>
                                                <option value="marinduque">Marinduque</option>
                                                <option value="masbate">Masbate</option>
                                                <option value="mm">Metro Manila</option>
                                                <option value="mp">Mountain Province</option>
                                                <option value="nueveja">Nueva Ecija</option>
                                                <option value="nuevviz">Nueva Vizcaya</option>
                                                <option value="mindoro">Mindoro</option>
                                                <option value="palawan">Palawan</option>
                                                <option value="pampanga">Pampanga</option>
                                                <option value="pangasinan">Pangasinan</option>
                                                <option value="rizal">Rizal</option>
                                                <option value="romblon">Romblon</option>
                                                <option value="quezon">Quezon</option>
                                                <option value="quirino">Quirino</option>
                                                <option value="sorsogon">Sorsogon</option>
                                                <option value="tarlac">Tarlac</option>
                                                <option value="zamba">Zambales</option>
                                            </optgroup>
                                            <optgroup label="Visayas" style="color: black;">
                                                <option value="aklan">Aklan</option>
                                                <option value="antique">Antique</option>
                                                <option value="biliran">Biliran</option>
                                                <option value="bohol">Bohol</option>
                                                <option value="capiz">Capiz</option>
                                                <option value="cebu">Cebu</option>
                                                <option value="es">Eastern Samar</option>
                                                <option value="guimaras">Guimaras</option>
                                                <option value="iloilo">Iloilo</option>
                                                <option value="leyte">Leyte</option>
                                                <option value="negros">Negros</option>
                                                <option value="samar">Samar</option>
                                                <option value="siquijor">Siquijor</option>
                                            </optgroup>
                                            <optgroup label="Mindnao" >
                                            <option value="agusan">Agusan</option>
                                                <option value="basilan">Basilan</option>
                                                <option value="bukidnon">Bukidnon</option>
                                                <option value="camiguin">Camiguin</option>
                                                <option value="compvalley">Compostela Valley</option>
                                                <option value="cotabato">Cotabato</option>
                                                <option value="cebu">Cebu</option>
                                                <option value="davao">Davao</option>
                                                <option value="di">Dinagat Islands</option>
                                                <option value="lanao">Lanao</option>
                                                <option value="mindanao">Maguindanao</option>
                                                <option value="misamis">Misamis</option>
                                                <option value="sarangani">Sarangani</option>
                                                <option value="sulkud">Sultan Kudarat</option>
                                                <option value="sulu">Sulu</option>
                                                <option value="surigao">Surigao</option>
                                                <option value="tt">Tawi-Tawi</option>
                                                <option value="zambo">Zamboanga</option>
                                            </optgroup>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input type="text" class="form-control" name="birthDate" value="{{ Auth::user()->birthDate}}"  readonly="true">
                                </div>
                                <div class="form-group">    
                                    <label>Email</label>   
                                    <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{ Auth::user()->emailAddress}}"  readonly="true"> 
                                </div> 
                                
                                <a href="/modelfeed" class="btn btn-rounded float-right animated pulse btn-warning">Back</a>
                                <button type="submit" class="btn btn-rounded float-right animated pulse btn-success">Save</button>
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