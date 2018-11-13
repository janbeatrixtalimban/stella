 
@extends('layouts.employerapp')

<title>@yield('pageTitle') Welcome {{ Auth::user()->firstName}}! </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">

  <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/employerHome') }}" rel="tooltip" title="Browse now" data-placement="bottom">
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

            <!-- Search Bar -->
                  <div class="col-sm-4">
                      <form action="{{ url('/find') }}" method="get">
                            {{ csrf_field() }}
                                <div class="input-group" style="padding-top:10px;" >
                                    <input name="find" id="find" class="form-control form-control-search" placeholder="Search..." itemprop="query-input" style="background:#fffff0;">
                                  </div>
                  </div>
                  <div class="col-sm-2">
                                <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="searchtype" id="searchtype" style="background:#fffff0;">
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
                    <li class="nav-item">
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
                                <span class="d-lg-none d-md-block">   Homepage</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Homepage</a>
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
	</nav><!-- Nav ending tag -->
  


  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
      <!-- Logo Header -->
      <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image:url()"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
        <div class="container-fluid">
        
            <div class="row" style="padding-left:10%;">

                @foreach($user->chunk(1) as $chunk)
                <div class="row">
                    <div class="col-sm-12">
                        @foreach($chunk as $user)
                            <div class="column">

                                @if($user->typeID == 2)
                                    <div style="display: none;">
                                @elseif($user->typeID == 2 || $user->status == 1)
                                    <div class="col-md-12 col-sm-12 col-md-12" style="width:100%;">
                                        <div id="model" class="card text-center">
                                            <div class="card-body" style="color:#1b1b1b;" style="width:100%;">
                                                <h5 class="card-title"><b>{{ $user->firstName }} {{ $user->lastName }}</b></h5>
                                                <img src="{{asset('/uploads/avatars/'.$user->avatar)}}" alt="Thumbnail Image" class="img-raised" width="200" height="200"><br>
                                        <!--Buttons with icons -->
                                        @if( Auth::user()->status == 1)
                                        <form class="hire" action="/employer/hire" method="post">
                                            {{ csrf_field() }}
                                            <!-- Attributes Modal Button -->
                                            <a data-toggle="modal" data-target="#attributes{{ $user->userID }}" style="color:white;" class="btn btn-success btn-round" rel="tooltip" title="View Attributes"><i class="now-ui-icons design_bullet-list-67"></i></a>
                                            <!-- View Profile Button -->
                                            <a href="{{url('/profile/view/'.$user->userID)}}" target="_blank" class="btn btn-maroon btn-round" rel="tooltip" title="View profile"><i class="now-ui-icons design_image"></i></a> 
                                            <!-- Hire Modal Button -->
                                            <a data-toggle="modal" data-target="#hire{{ $user->userID }}" style="color:white;" class="btn btn-info btn-round" rel="tooltip" title="Hire Model"><i class="now-ui-icons ui-1_check"></i></a>
                                            </form>
                                        @else
                                            <a data-toggle="modal" data-target="#attributes{{ $user->userID }}" style="color:white;" class="btn btn-success btn-round" rel="tooltip" title="View Attributes"><i class="now-ui-icons design_bullet-list-67"></i></a>
                                            <a href="{{url('/profile/view/'.$user->userID)}}" target="_blank" class="btn btn-maroon btn-round" rel="tooltip" title="View profile"><i class="now-ui-icons design_image"></i></a> 
                                        @endif
                                    
                                        </div>
                                        <div class="card-footer text-muted mb-2">
                                            {{ $user ->skill }}
                                        </div>
                                    </div>
                                    </div>
                                @else
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
                
                @endforeach
      
          </div><!--feed content row closing tag -->

      </div><!-- container fluid closing tag-->
</div>
     @foreach ($details as $details)
      <!-- View model attributes Modal -->
          <div id="attributes{{ $details->userID }}" class="modal fade show" style="padding-top: 50px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <br><img src="{{asset('/uploads/avatars/'.$details->avatar)}}" alt="Thumbnail Image" width="60" height="60" class="rounded-circle img-raised">
                    <h4>{{ $details->firstName}} {{ $details->lastName}}</h4><br>
                    <h6><h6><br>
                    </div>
                    <div class="modal-body">
                      <br><h6>{{ $details->skill}}</h6><br>
                      <p>Attributes</p>
                      <ul>
                          <li>
                              <h0>Gender: <b>{{ $details->gender }}<b></h0>
                          </li>
                          <li>
                              <h0>Eye Color: <b>{{ $details->eyeColor }}<b></h0>
                          </li>
                          <li>
                              <h0>Hair Color: <b>{{ $details->hairColor }}<b> </h0>
                          </li>
                          <li>
                              <h0>Hair Length: <b>{{ $details->hairLength }}<b> </h0>
                          </li>
                          <li>
                              <h0>Weight: <b>{{ $details->weight }} lbs<b></h0>
                          </li>
                          <li>
                              <h0>Height: <b>{{ $details->height }} cm<b></h0>
                          </li>
                          <li>
                              <h0>Skin Color: <b>{{ $details->complexion }}<b></h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
                      <a class="btn btn-info btn-round" href="{{url('/profile/view/'.$details->userID)}}" target="_blank">View Profile</a>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
    @endforeach

    @foreach ($model as $model)                                       
          <!-- Hiring confirmation Modal with job posts -->
                <div id="hire{{ $model->userID }}" class="modal fade" tabindex="-1" style="padding-top: 150px;" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                          <h4 class="modal-title">Are you sure you want to hire <b>{{ $model->firstName }} {{ $model->lastName }}</b>?</h4><br>
                          <!-- Opening Form Tag -->
                              <form class="" action="{{ url('/employer/hire') }}" method="post">
                                    {{ csrf_field() }}
                                    
                                  <input type="hidden" name="modelID" id="modelID" value="{{$model->userID}}" readonly>
                                  <input type="hidden" name="emailAddress" id="emailAddress" value="{{$model->emailAddress}}" readonly>
                                  <label>Choose Project:</label>
                                    <div class="input-group input-lg">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">
                                          </span>
                                      </div>
                                      <select size="0.4" class="form-control" name="projectID" id="projectID" required>
                                          <option value="" selected disabled>Select Project..</option>
                                            @foreach($projects as $project)
                                            @if($project->hidden == 1)
                                              <option value="{{ $project->projectID }}">{{ $project->prjTitle }}</option>
                                              @else
                                              @endif
                                            @endforeach
                                      </select>
                            </div><br>
                          </div>
                          <div class="modal-footer text-center">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <div class="row">
                              <div class="col-sm-4"></div>
                                
                                    <button type="submit" name="button" class="btn btn-success btn-round">Hire</button>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>

                                </form>
                            <!--Closing form tag -->
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            @endforeach
              <!-- End of Modal -->


            </div>
    </div>


@endsection
</div>