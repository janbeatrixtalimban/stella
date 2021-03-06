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
              <li>
                <a href="{{ url('/admin/reportedJobs') }}">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Job Posts</p>
                </a>
              </li>
              <li class="active">
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
            <a class="navbar-brand" href="#pablo">Reports - Photos</a>
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
                        <span class="d-lg-none d-md-block">Reports - Photos</span>
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
                        <h4 class="card-title">Reported Photo List</h4>
                    </div>

                    <div class="card-body">
                        @if (count($details) > 0)
                            <div class="panel panel-default">

                                <div class="panel-body table-responsive">
                                    <table id="photoReports" class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead class="text-primary">
                                            <th>Photo</th>
                                            <th>Reason</th>
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
                                                        <div class="thumbnail"> 
                                                            <img class="img-responsive portrait" alt=""  width="100px" src="{{asset('/uploads/'.$detail->image)}}" alt="Image"/>
                                                            </div>  
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $detail->reason }} - {{ $detail->othercomment }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                            <div>{{ $detail->firstName }} {{ $detail->lastName }}</div>
                                                        </td>
                                                    <td class="table-text">
                                                    @if ($detail->display == 'none')
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
                                                              <button data-toggle="modal" data-target="#archive{{$detail->imageID}}" type="submit" name="button" class="btn btn-round btn-sm btn-info" rel="tooltip" title="Archive Photo"><i class="now-ui-icons files_box"></i></button>
                                                              <button data-toggle="modal" data-target="#junk{{$detail->imageID}}" type="submit" name="button" class="btn btn-round btn-sm btn-danger" rel="tooltip" title="Junk Report"><i class="now-ui-icons ui-1_simple-remove"></i></button>&nbsp;
                                                              |&nbsp;<a data-toggle="modal" data-target="#details{{$detail->imageID}} " style="color:blue; padding-top:3px;">View</a>
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
            <div id="details{{$detail->imageID}}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">

                            <img class="img-responsive portrait" alt="" src="{{asset('/uploads/'.$detail->image)}}" alt="Image"/>

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
            <div id="archive{{$detail->imageID}}" class="modal fade" style="padding-top: 130px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">

                              <h5>Are you sure you want to archive {{$detail->firstName}} {{ $detail->lastName }}'s photo?</h5>
                              <p class="text-center">*If this post violates our community guidelines, proceed with archiving this photo.</p>

                          </div>
                          <div class="modal-footer">
                            <div class="container text-center">
                              <form class="" action="{{ url('/admin/archiveImage') }}" method="post">
                                  {{ csrf_field() }}
                                <input style="hidden" type="hidden" name="imageID" id="imageID" value="{{$detail->imageID}}" readonly>
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


      @foreach ($details as $detail)
          <!-- View job Post details -->
            <div id="junk{{$detail->imageID}}" class="modal fade" style="padding-top: 130px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">

                              <h5>Are you sure you want to disregard this photo report?</h5>
                              <p class="text-center">*If the report is unrelated or irrelevant to the photo or if the photo does not violate the community guidelines, proceed with adding this report to junk.</p>

                          </div>
                          <div class="modal-footer">
                            <div class="container text-center">
                              <form class="" action="{{ url('') }}" method="post">
                                 {{ csrf_field() }}
                                <input style="hidden" type="hidden" name="projectID" id="projectID" value="{{$detail->projectID}}" readonly>
                                <button type="submit" class="btn btn-danger btn-round">Junk</button>
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