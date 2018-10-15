@extends('layouts.modelapp')

<title>@yield('pageTitle') Welcome {{ Auth::user()->firstName}}! </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/modelfeed ') }}" rel="tooltip" title="Browse now" data-placement="bottom">
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
                  <div class="col-sm-6" style="padding-top:10px;">
                      <form class="form-inline" action="/search" method="get">
                            {{ csrf_field() }}
                            <div class="input-group no-border input-sm">
                                    <input name="search" type="search" id="search" class="form-control form-control-search" placeholder="Search..." itemprop="query-input">
                            </div>
                                <button type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_zoom-bold"></i></button>
                      </form>
                  </div>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                                <span class="d-lg-none d-md-block">   Homepage</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Homepage</a>
                                <a class="dropdown-item" href="{{ url('/modelprofile') }}" style="color:black;">
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/viewjoboffers') }}" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscription') }}" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="{{ url('/#') }}" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" style="color:black;">Logout</a>
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
                <div class="col-sm-6">

                      @foreach ($projects as $project)
                      @if($project->hidden > 0) 
                        <div id="jobpost" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                            <h4 class="card-title">{{ $project->prjTitle }}</h4>
                            <p class="card-text">{{ $project->jobDescription }}</p>
                            {{-- <a data-toggle="modal"   href="#confirmapply" class="btn btn-info btn-round">Apply</a> --}}
                            <form class="" action="/model/apply" method="post">
                              {{ csrf_field() }}
                              <a data-toggle="modal" data-target="#{{$project->projectID}}" style="color:white;"class="btn btn-maroon btn-round">View more details</a>
                              <input style="hidden" type="hidden" name="projectID" id="projectID" value="{{$project->projectID}}" readonly>
                              <button type="submit" name="button" class="btn btn-info btn-round" >Apply</button>
                            </form>
                          </div>
                          <div class="card-footer text-muted mb-2">
                            {{ $project->created_at }}
                          </div>
                        </div>
                        @else      
                    @endif
                      @endforeach

                    
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">


                  <!-- Ads Card and carousel -->
                       <!-- Ads Card and carousel -->
                       <div class="card" style="width:100%;">
                        <div class="card-body" style="color:#1b1b1b; width:100%;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" class="text-center carousel slide" data-ride="carousel" style="width:100%;">
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

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->



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
                          <h0>Posted {{ $project->created_at }} by<h0>
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
                              <h0>Number of Models: <b>{{$project->modelNo}}</b></h0>
                          </li>
                          <li>
                              <h0>Model Type: <b>{{$project->role}}</b></h0>
                          </li>
                          <li>
                              <h0>Minimum Height Requirement: <b>{{$project->height}}cm</b></h0>
                          </li>
                          <li>
                              <h0>Body Built: <b>{{$project->bodyBuilt}}</b></h0>
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



          <!-- Apply to job confirmation Modal -->
                <div id="confirmapply" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog confirmapplymodal" role="document">

                  <!-- Modal content-->
                  <form method="POST" action="/model/apply">
                    {{ csrf_field() }}
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to apply?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                             
                              <button type="submit" class="btn btn-success btn-round" data-dismiss="modal" >Yes</button>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
              <!-- End of Modal -->

            </div>
    </div>

    {!! $projects->links() !!}
      

@endsection
</div>
