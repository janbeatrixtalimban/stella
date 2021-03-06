@extends('layouts.adminapp')

<title>@yield('pageTitle') Stella Admin </title>

<!-- Side nav bar -->
<body class="">
  <div class="wrapper ">
      <!-- Admin side bar -->
    <div class="sidebar" data-color="black">
      <div class="logo">
        <img src="<?php echo asset('img/logo_white.png')?>" width="150">
        <h5 style="color:white;"> Welcome, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}! </h5>
      </div>
      <div class="sidebar-wrapper">
          <ul class="nav">
              <li>
                <a href="{{ url('/admin/dashboard') }}">
                  <i class="now-ui-icons business_chart-pie-36"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li>
                <a href="{{ url('/admin/ViewAuditLog') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li class="active ">
                <a href="{{ url('/admin/viewAdmin') }}">
                  <i class="now-ui-icons business_badge"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li>
                  <a href="{{ url('/admin/income') }}">
                    <i class="now-ui-icons business_money-coins"></i>
                    <p>Income Report</p>
                  </a>
                </li>
              <li>
                <a href="{{ url('/admin/ViewModel') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Models</p>
                </a>
              </li>
              <li>
              <li>
                <a href="{{ url('/admin/ViewEmployer') }}">
               <i class="now-ui-icons users_single-02"></i>
                <p>Employers</p>
                </a>
              </li>
              <li>
                <a href="{{ url('/admin/reportedJobs') }}">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Job Posts</p>
                </a>
              </li>
              <li>
                <a href="{{ url('/admin/reportedImg') }}">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Photos</p>
                </a>
              </li>
            </ul>
      </div>
    </div>

<!-- Section Start -->    
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
            <a class="navbar-brand" href="#pablo">Admins List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                      <p>
                          <span class="d-lg-none d-md-block">View Admins</span>
                      </p>
                  </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                          <p style="text-align:center;">&nbsp;<b>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</b></p></a>
                                  
                          <a class="dropdown-item" href="{{ url('/admin/logout') }}" style="color:black;">Logout</a>
                      </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

			<div class="row">
                        <h4 class="card-title" style="padding-left:15px;padding-right:30px;">Admin List</h4>
			<form action="{{ url('/admin/addAdmin') }}">
			    <button type="submit" class="btn btn-info btn-round">Add Admin</button>
			</form>
                  	</div> 
				@if (\Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {!! \Session::get('success') !!}
                                    </div>
                                @endif

		    </div>

                    <div class="card-body">
                        @if (count($details) > 0)
                            <div class="panel panel-default">

                                <div class="panel-body table-responsive">
                                    <table id="adminList" class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead class="text-primary">
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Date Registered</th>
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            @foreach ($details as $detail)
                                                <tr>
                                                
                                                    <td class="table-text">
                                                        <div>{{ $detail->firstName }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $detail->lastName }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $detail->emailAddress }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                            <div>{{ $detail->contactNo }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $detail->created_at }}</div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table><br>
                                </div>
                            
                            </div>
                    
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection