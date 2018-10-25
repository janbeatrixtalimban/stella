@extends('layouts.adminapp')

<title>@yield('pageTitle') Stella Admin </title>

<!-- Side nav bar moved from layouts coz separate pa side nav designs huhu-->
<body class="">
  <div class="wrapper ">
      <!-- Admin DASHBOARD side bar -->
    <div class="sidebar" data-color="black">
      <div class="logo">
        <img src="<?php echo asset('img/logo_white.png')?>" width="150">
        <h5 style="color:white;"> Welcome, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}! </h5>
      </div>
      <div class="sidebar-wrapper">
          <ul class="nav">
              <li class="active ">
                <a href="{{ url('/admin/dashboard') }}">
                  <i class="now-ui-icons business_chart-pie-36"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li>
                <a href="/admin/ViewAuditLog">
                  <i class="now-ui-icons files_paper"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li>
                <a href="/admin/viewAdmin">
                  <i class="now-ui-icons business_badge"></i>
                  <p>Admin Panel</p>
                </a>
              </li>
              <li>
                  <a href="/admin/addAdmin">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Add Admin</p>
                  </a>
                </li>
              <li>
                <a href="/admin/ViewModel">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Models</p>
                </a>
              </li>
              <li>
              <li>
                <a href="/admin/ViewEmployer">
               <i class="now-ui-icons users_single-02"></i>
                <p>Employers</p>
                </a>
              </li>
              <li>
                <a href="/admin/reportedJobs">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Job Posts</p>
                </a>
              </li>
              <li>
                <a href="/admin/reportedImg">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Photos</p>
                </a>
              </li>
            </ul>
      </div>
    </div>


<!-- Start of Contents -->
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="/admin/logout">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      {{-- HERE ACTIVE USERS or PREMIUM --}}
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Model</h5>
                <h4 class="card-title">Model Count</h4>
                
              </div>
              <div class="card-body">
                
               <p> NUMBER OF PREMIUM MODELS: <b>{{ $models }}</b> </p>
               <p> TOTAL NUMBER OF MODELS: <b>{{ $numModels }}</b> </p>
               
               
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">PROJECTS</h5>
                <h4 class="card-title">Project Count</h4>
                
              </div>
              <div class="card-body">
                  <p> NUMBER OF ACTIVE PROJECTS: <b>{{ $projActive }}</b> </p>
                  <p> TOTAL NUMBER OF PROJECTS: <b>{{ $proj }}</b> </p>
                  
              </div>
             
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Employer</h5>
                <h4 class="card-title">Employer Count</h4>
              </div>
              <div class="card-body">
                  <p> NUMBER OF PREMIUM EMPLOYERS: <b>{{ $employer }}</b> </p>
                  <p> TOTAL NUMBER OF EMPLOYERS: <b>{{ $numEmps }}</b> </p>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
          <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Admins List</h5>
                <h4 class="card-title"> Admin Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                      
                    <thead class=" text-primary">
                     
                      <th>
                        Name
                      </th>
                      <th>
                         Log Type
                        </th>
                      <th>
                        Date Created
                      </th>
                      
                    </thead>
                    <tbody>
                        
                      <tr>
                          @foreach($audit as $audit)
                        <td>
                          {{$audit->firstName}}  {{$audit->lastName}}
                        </td>
                        <td>
                            {{$audit->logType}}
                        </td>
                        <td>
                            {{$audit->created_at}}
                        </td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">All Admins List</h5>
                <h4 class="card-title"> Admin Stats</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                   
                    <thead class=" text-primary">
                      
                      <th>
                        Name
                      </th>
                      <th>
                        Date Created
                      </th>
                      
                    </thead>
                    <tbody>
                        @foreach($details as $details)
                      <tr>
                        <td>
                          {{$details-> firstName}} {{$details-> lastName}}
                        </td>
                        <td>
                            {{$details-> created_at}}
                        </td>
                        
                      </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection