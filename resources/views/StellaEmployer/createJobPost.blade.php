@extends('layouts.modelapp')

<title>@yield('pageTitle') Create Job Post </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
                        <div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" rel="tooltip" title="Click to go Home" href="{{ url('/employerfeed') }}" data-placement="bottom">
                        <img src="<?php
echo asset('img/logo_white.png');
?>"  width="90">
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
                        <a class="navbar-brand" href="{{ url('/employerfeed ') }}" data-placement="bottom">
                            Home
                        </a>
                        </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                          <img src="<?php
echo asset('img/default-profile-pic.png');
?>" width="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                            <a class="dropdown-header">Add Job Post</a>
                            <a class="dropdown-item" href="{{ url('/employerapplicants') }}">View Applicants</a>
                            <a class="dropdown-item" href="{{ url('/subscription') }}">Subscription</a>
                            <a class="dropdown-item" href="{{ url('/settings') }}">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/stellahome') }}">Logout</a>
                          </div>
                        </div>
                      </li>
                    </ul>
              </div>

                    </div><!-- nav container closing tag -->
    </nav>
  
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

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Project</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Title:</strong>
                <input type="text" name="prjTitle" class="form-control" placeholder="Project Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="jobDescription" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
                <input type="text" name="location" class="form-control" placeholder="Location">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role</strong>
                <input type="text" name="role" class="form-control" placeholder="Role">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Talent Fee</strong>
                <input type="text" name="talentFee" class="form-control" placeholder="Enter amount of Talent Fee">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
            <div class="form-group">
                <strong>Hidden?:</strong>
                <input type="text" name="hidden" class="form-control" placeholder="Skill" value="1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="display: none;">
            <div class="form-group">
                <strong>User ID</strong>
                <input type="text" name="userID" class="form-control" placeholder="{{ Auth::user()->userID}}" value="{{ Auth::user()->userID}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div></div></div></div></div></div></div></div>
@endsection