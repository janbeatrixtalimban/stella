

@extends('layouts.employerapp')

<title>@yield('pageTitle') {{ Auth::user()->firstName}} {{ Auth::user()->lastName}} </title>


@section('content')
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/employerfeed') }}" rel="tooltip" title="Return to Feed" data-placement="bottom">
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
          <li class="nav-item">
                <div class="dropdown button-dropdown">
                      <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Profile</a>
                        <a class="dropdown-item" href="{{ url('/employerHome') }}">Home</a>
                        <a class="dropdown-item" href="{{ url('#') }}">View Applicants</a>
                        <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}">Subscriptions</a>
                        <a class="dropdown-item" href="{{ url('#') }}">Settings</a>
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
          <img src="<?php echo asset('img/default-profile-pic.png')?>" alt="">
        </div>
        <h3 class="title">{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h3>
        <p class="category">{{ Auth::user()->company}}</p>
        <h6 class="category">{{ Auth::user()->position}}</h6>
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
                <h3 class="title">{{$company->name}}</h3>
                <p class="description">{{ $company->description}}</p>
            </div>
        </div>
        <div class="section">
        <div class="container">
            <div class="col-md-6 ml-auto mr-auto">
                <h3 class="title text-center">Job Posts</h3>
            </div>


            <div class="row">

                    @foreach ($projects as $projects)
                    @if($projects->hidden > 0)         
                    <div class="col-sm-6">
                        <div id="jobdesc" class="card text-center">
                            <div class="card-body" style="padding-top: 0; color:#1b1b1b;">
                                <h4 class="title">{{ $projects->prjTitle }}</h4>
                                <p class="description">{{ $projects->jobDescription }}</p>
                                <a data-toggle="modal" href="#viewdetails" class="btn btn-maroon btn-round">View Job Post</a>
                                <a class="btn btn-info btn-round" href="{{ url('/editPost/'.$projects->projectID)}}">Edit Post</a>
                                {{-- {{ route('project.edit',$projects->projectID) }} --}}
                            </div>
                        </div>
                    </div> 
                    
                     @else   

                     @endif 
                     
                    @endforeach
            
            </div>
</div>
</div>

        <!-- View Job detials Modal -->
        <div id="viewdetails" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">(Job Title)</h4>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <p>Job Description</p>
                      <ul>
                          <li>
                              <h0>Location</h0>
                          </li>
                          <li>
                              <h0>Date</h0>
                          </li>
                          <li>
                              <h0>Time</h0>
                          </li>
                          <li>
                              <h0>Role</h0>
                          </li>
                          <li>
                              <h0>Talent Fee</h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->

      </div>
    </div>
@endsection

