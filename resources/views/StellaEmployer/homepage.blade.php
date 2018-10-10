
@extends('layouts.employerapp')

<title>@yield('pageTitle') Welcome {{ Auth::user()->firstName}}! </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/employerHome') }}" rel="tooltip" title="Browse now" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>" width="100">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

            <!-- Search Bar -->
                  <div class="col-sm-4">
                      <form action="" method="">
                            {{ csrf_field() }}
                                <div class="input-group no-border" style="padding-top:10px;" >
                                    <input name="search" id="search" class="form-control form-control-search" placeholder="Search..." itemprop="query-input">
                                </div>
                  </div>
                  <div class="col-sm-2">
                                <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="role" id="role" required>
                                                <option value="" selected disabled>Select role of model..</option>
                                                    <option value="Fashion">Fashion(Editorial) model</option>
                                                    <option value="Runway">Runway model</option>
                                                    <option value="Commercial">Commercial model</option>
                                                    <option value="Plus size">Plus size model</option>
                                                    <option value="Petite">Petite model</option>
                                                    <option value="Swimsuit">Swimsuit Model</option>
                                                    <option value="Lingerie">Lingerie Model</option>
                                                    <option value="Glamour">Glamour Model</option>
                                                    <option value="Fitness">Fitness Model</option>
                                                    <option value="Fitting">Fitting Model</option>
                                                    <option value="Parts">Parts Model</option>
                                                    <option value="Promotional">Promitional Model</option>
                                                    <option value="Mature">Mature Model</option>
                                            </select>
                                        </div>
                </div>
                            <button type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_zoom-bold"></i></button>
                      </form>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                            <a class="dropdown-header">Homepage</a>
                            <a class="dropdown-item" href="{{ url('/employerprofile') }}">
                            <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                            <a class="dropdown-item" href="{{ url('/employerapplicants') }}">View Applicants</a>
                            <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/settings') }}">Settings</a>
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
   
<!-- Two Column Display loop of Models Shown-->
<div class="column">
  <table>
      @foreach($user->chunk(3) as $chunk)
          <tr>
              @foreach($chunk as $user)
                  <td>
                    <div class="col-sm-12">
                      <div id="model" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                            <h4 class="card-title">{{ $user->firstName }} {{ $user->lastName }}</h4>
                              <img src="/uploads/avatars/{{ $user ->avatar }}" alt="" class="img-raised" width="200" height="200"><br>
                            <!--Buttons with icons -->
                              <a data-toggle="modal" data-target="#{{ $user->userID }}" style="color:white;" class="btn btn-maroon btn-round" rel="tooltip" title="View Attributes"><i class="now-ui-icons design_bullet-list-67"></i></a>
                              <a data-toggle="modal" href="#viewattributes" class="btn btn-black btn-round" rel="tooltip" title="View profile"><i class="now-ui-icons design_image"></i></a> 
                              <a data-toggle="modal" href="#confirmhire" class="btn btn-info btn-round" rel="tooltip" title="Hire Model"><i class="now-ui-icons ui-1_check"></i></a> 
                               <form class="" action="/employer/hire" method="post">
                                  {{ csrf_field() }}
                                  <input style="hidden" text="hidden" name="userID" id="userID" value="{{$user->userID}}" readonly>
                                  <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Hire</button>
                                </form>
                          </div>
                          <div class="card-footer text-muted mb-2">
                            (Skill Set)
                          </div>
                        </div>
                      </div>
                  </td>
              @endforeach
          </tr>
      @endforeach
  </table>
</div>

            

          <!-- Right Column contents -->
            <div class="col-sm-3">
                <div class="column">

                  <!-- Ads Card and carousel -->
                      <div class="card">
                        <div class="card-body" style="color:#1b1b1b; height: 15rem;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" style="width: 16rem;" class="text-center carousel slide" data-ride="carousel">
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


          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


      @foreach ($details as $details)
      <!-- View model attributes Modal -->
          <div id="{{ $details->userID }}" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <p>Attributes</p>
                      <ul>
                          <li>
                              <h0>Eye Color: </h0>
                          </li>
                          <li>
                              <h0>Hair Color:{{ $details->hairColor }} </h0>
                          </li>
                          <li>
                              <h0>Hair Length</h0>
                          </li>
                          <li>
                              <h0>Weight</h0>
                          </li>
                          <li>
                              <h0>Height</h0>
                          </li>
                          <li>
                              <h0>Skin Color</h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
                      <button type="button" class="btn btn-info btn-round" href="{{ url('/modelProfile') }}" target="_blank">View Profile</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
    @endforeach

          <!-- Apply to job confirmation Modal -->
                <div id="confirmhire" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog confirmapplymodal" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to hire (Model Name)?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div><form class="" action="/employer/hire" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="userID" id="userID" value="{{$user->userID}}" readonly>
                                <button type="submit" name="button" class="btn btn-maroon btn-round" data-dismiss="modal">Hire</button>
                              </form>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              <!-- End of Modal -->


            </div>
    </div>


@endsection
</div>