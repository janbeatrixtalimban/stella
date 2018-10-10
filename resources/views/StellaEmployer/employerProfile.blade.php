@extends('layouts.employerapp')

<title>@yield('pageTitle') {{ Auth::user()->firstName}} {{ Auth::user()->lastName}} </title>


@section('content')
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/employerHome') }}" rel="tooltip" title="Return to Feed" data-placement="bottom">
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
                        <a class="navbar-brand" href="{{ url('/employerHome') }}" data-placement="bottom">
                            Home
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
                        <a class="dropdown-header">Profile</a>
                            <a class="dropdown-item" href="#s">View Applicants</a>
                            <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}">Subscription</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                      </div>
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

                   @foreach ($projects->reverse() as $projects)
                    @if($projects->hidden > 0)         
                    <div class="col-sm-6">
                        <div id="jobdesc" class="card text-center">
                            <div class="card-body" style="padding-top: 0; color:#1b1b1b;">
                                <h4 class="title">{{ $projects->prjTitle }}</h4>
                                <p class="description">{{ $projects->jobDescription }}</p>
                                <a data-toggle="modal" data-target="{{$projects->projectID}}" style="color:white;" class="btn btn-maroon btn-round">View Job Post</a>
                                <a class="btn btn-info btn-round" href={{ url('/editPost/'.$projects->projectID) }}>Edit Post</a>
                                <form class="" action="/employer/archive" method="post">
                                  {{ csrf_field() }}
                                  <input style="hidden" text="hidden" name="projectID" id="projectID" value="{{$projects->projectID}}" readonly>
                                  <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Archive</button>
                                </form>
                              </div>
                            <div class="card-footer text-muted mb-2">
                            </div>
                        </div>
                    </div> 
                    
                    @else      
                    @endif
                     
                    @endforeach
            
            </div>
</div>
</div>

  @foreach ($projects as $projects)
  <!-- View Job detials Modal -->
          <div id="" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <div class="column">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"></h4>
                          <h0>Posted <h0>
                      </div>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <h5>Project Details</h5>
                      <ul>
                          <li>
                              <h0>Location:</h0>
                          </li>
                          <li>
                              <h0>Model Type: </h0>
                          </li>
                          <li>
                              <h0>Talent Fee: </h0>
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



    <!-- Upload Profile Picture Modal -->
    <div id="profilepic" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog tncmodal" role="document">

        <!-- Modal content-->
        <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Profile Picture</h4>
              </div>
              <div class="modal-body">
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

