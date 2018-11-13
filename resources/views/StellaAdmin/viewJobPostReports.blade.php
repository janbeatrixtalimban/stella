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
              <li>
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
              <li class="active ">
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
            <a class="navbar-brand" href="#pablo">Reports - Job Posts</a>
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
                          <span class="d-lg-none d-md-block">Reports - Job Posts</span>
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
                        <h4 class="card-title">Reported Job List</h4>
                    </div>

                    <div class="card-body">
                        @if (count($details) > 0)
                            <div class="panel panel-default">
				
                                <div class="panel-body table-responsive">
                                    <table id="jobReports" class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead class="text-primary">
                                            <th>Project Name</th>
                                            <th>Posted By</th>
                                            <th>Status</th>
                                            <th>Date Reported</th>
                                            <th>Action</th>
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            @foreach ($details as $detail)
						
                                                <tr>
                                                
                                                    <td class="table-text">
                                                        <div>{{ $detail->prjTitle }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                            <div>{{ $detail->firstName }} {{ $detail->lastName }}</div>
                                                    </td>
                                                    <td class="table-text">
						                                        @if ($detail->reportstatus == '0')
                                                        <div style="color:red;">Achived</div>
                                                    @else
                                                        <div style="color:blue;">Reported</div>
                                                    @endif
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $detail->created_at }}</div>
                                                    </td>
                                                    <td>
                                                       
                                                          <div class="row">
                                                              <button data-toggle="modal" data-target="#archive{{$detail->projectID}}" type="submit" name="button" class="btn btn-round btn-sm btn-info">Archive</button>&nbsp;
                                                              |&nbsp;<a data-toggle="modal" data-target="#details{{$detail->projectID}} " style="color:blue; padding-top:3px;">View</a>
                                                          </div>
                                                        
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


    @foreach ($details as $detail)
          <!-- View job Post details -->
            <div id="details{{$detail->projectID}}" class="modal fade" style="padding-top: 130px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <h4><img src="{{asset('/uploads/avatars/'.$detail->avatar)}}" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">&nbsp;&nbsp;{{$detail->prjTitle}}</h4><br>

                              <p><b>Reason for report:</b>{{$detail->reason}}</p>

                              <p><b>Post Description:</b>&nbsp;{{$detail->jobDescription}}</p>

                              <p><b>Address:</b>&nbsp;{{$detail->address}}</p>

                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <button type="button" class="btn btn-info btn-round" data-dismiss="modal" style="float:right;">Close</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            @endforeach
      <!-- End of Modal -->


      @foreach ($details as $detail)
          <!-- View job Post details -->
            <div id="archive{{$detail->projectID}}" class="modal fade" style="padding-top: 130px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">

                              <h5>Are you sure you want to archive {{$detail->prjTitle}}?</h5>
                              <p class="text-center">*If this post violates our community guidelines, proceed with archiving this post.</p>

                          </div>
                          <div class="modal-footer">
                            <div class="container text-center">
                              <form class="" action="{{ url('/admin/archiveJobPost') }}" method="post">
                                 {{ csrf_field() }}
                                <input style="hidden" type="hidden" name="projectID" id="projectID" value="{{$detail->projectID}}" readonly>
                                <button type="submit" class="btn btn-danger btn-round">Archive</button>
                                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Cancel</button>
                              </form>
                            </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            @endforeach
      <!-- End of Modal -->

</body>

@endsection