@extends('layouts.employerapp')

<title>@yield('pageTitle') {{ Auth::user()->firstName}} {{ Auth::user()->lastName}} </title>


@section('content')
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
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

      <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                              <a class="nav-link" href="{{ url('/employerHome') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                  <p>Home</p>
                              </a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                                    <span class="d-lg-none d-md-block">   Profile</span>
                                  </p>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header">Profile</a>
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
    </div>
  </nav>
  <!-- End Navbar -->
  
  <div class="wrapper">
    <div class="page-header page-header-small clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg5.jpg');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="">
        </div>
        <div class="row justify-content-center">
            
          <a data-toggle="modal" data-target="#profilepic" type="submit" rel="tooltip" title="Upload a Profile Picture" style="color:white; padding-top:10px;">Edit Picture</a>
        </div>
        <h3 class="headtitle">{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h3>
        <h4 class="category">{{$company->name}}</h4>
        <h5 class="category">{{$company->position}}</h5>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">
          <a href="{{ url('/editProfileEmp') }}" class="btn btn-maroon btn-round btn-lg">Edit Profile</a>
          <a href="{{ url('/addJob') }}" class="btn btn-maroon btn-round btn-lg">Create Job Post</a>
        </div> 
        <br><br>
        <div id="companydesc" class="card text-center">
            <div class="card-body" style="padding-top: 0; color:#1b1b1b;">
                <h3 class="title">About {{$company->name}}</h3>
                <p class="description">{{ $company->description}}</p>
            </div>
        </div>
        <div class="section">
        <div class="container">
            <div class="col-md-6 ml-auto mr-auto">
                <h3 class="title text-center">Job Posts</h3>
            </div><br>


            <div class="row">

                   @foreach ($projects->reverse() as $project)
                    @if($project->hidden > 0)         
                    <div class="col-sm-6">
                        <div id="jobdesc" class="card text-center">
                            <div class="card-body" style="padding-top: 0; color:#1b1b1b;">
                                <h4 class="title">{{ $project->prjTitle }}</h4>
                                <p class="description">{{ $project->jobDescription }}</p>
                                <form class="" action="/employer/archive" method="post">
                                  {{ csrf_field() }}
                                  <a data-toggle="modal" data-target="#{{$project->projectID}}" style="color:white;" class="btn btn-success btn-round">View Job Post</a>
                                  <a class="btn btn-info btn-round" href={{ url('/editPost/'.$project->projectID) }}>Edit Post</a>
                                  <a data-toggle="modal" data-target="#confirm{{$project->projectID}}" style="color:white;" class="btn btn-maroon btn-round">Archive</a>
                                </form>
                              </div>
                            <div class="card-footer text-muted mb-2">
                                {{ $project->created_at }}
                            </div>
                        </div>
                    </div> 
                    
                    @else      
                    @endif
                     
                    @endforeach
            
            </div>
</div>
</div>

  @foreach ($projects as $project)
  <!-- View Job detials Modal -->
          <div id="{{$project->projectID}}" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <div class="column">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">{{$project->prjTitle}}</h4>
                          <p class="description">{{ $project->jobDescription }}</p>
                          <h0>Posted {{ $project->created_at }}<h0>
                      </div>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <h5>Project Details</h5>
                      <ul>
                          <li>
                              <h0>Location: <b>{{$project->address}}</b></h0>
                          </li>
                          <li>
                              <h0>Model needed: <b>{{$project->modelNo}} {{$project->role}}</b></h0>
                          </li>
                         
                          <li>
                          <h0>Project Date: <b>{{$project->jobDate}} to {{$project->jobEnd}}</b></h0>
                          </li>
                          
                          <li>
                              <h0>Talent Fee: <b>P{{$project->talentFee}}.00</b></h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
          @endforeach


        @foreach ($projects as $project)
          <!-- Apply to job confirmation Modal -->
                <div id="confirm{{$project->projectID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to archive {{$project->prjTitle}}?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                            <div class="row">
                              <div class="col-sm-4">
                              </div>
                              <form class="" action="/employer/archive" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="projectID" id="projectID" value="{{$project->projectID}}" readonly>

                                  <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                  <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button>
                              </form>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
              <!-- End of Modal -->
          @endforeach


    <!-- Upload Profile Picture Modal -->
    <div id="profilepic" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document" style="width:100%; top: 150;">

        <!-- Modal content-->
        <div class="modal-content" style="color:black;" style="width:100%;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Profile Picture</h4>
              </div>
              <div class="modal-body" style="width:100%;">
                  <form action="{{ url('/eavatarupload') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <strong>Oh no!</strong> It appears that your image file is too large, please choose a smaller image size.<br><br>
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                            </div>
                      @endif
                          <div class="input-group no-border input-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                              </span>
                            </div>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                          </div>
                      <a>*Max image size of 3.15 MB</a>
                          <button type="submit" class="btn btn-success btn-round">Upload</button>
                          <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>
                  </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
        </div>
        <!-- End of Modal -->



      </div>
    </div>
@endsection

