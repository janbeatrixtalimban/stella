@extends('layouts.employerapp')

<title>@yield('pageTitle') View Accepted Models </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
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

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerHome') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                            <p>Home</p>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
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
                                <span class="d-lg-none d-md-block">   View Accepted Models</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Hired Models</a>
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
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black; border-right:black;">
                        <h4 class="text-center">&nbsp;&nbsp;View Accepted Models</h4>
                        <br>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewapplicants') }}">View Applicants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewaccepted') }}" style="padding-left:40px;">&nbsp;&#x21AA;&nbsp;View Accepted Models</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewhired') }}">View Hired Models</a>
                            </li><br><br>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1"><!--space-->
                </div><br><br>
              
        
            @if($hello != 0)
                @foreach($models->chunk(2) as $chunk)
		<div class="row">
                    <div class="col-sm-12"> 

			@foreach ($chunk as $model)
                        <div class="column">
                        <h5 style="color:#1b1b1b;">{{ $model->prjTitle }}</h5>
                        <div class="col-md-12 col-sm-12 col-md-12" style="width:100%;">
                            <div id="model" class="card text-center">
                                <div class="card-body" style="color:#1b1b1b;" style="width:100%;">
                                    <h5 class="card-title">{{ $model->firstName }} {{ $model->lastName }}</h5>
                                        <img src="{{asset('/uploads/avatars/'.$model->avatar)}}" alt="" class="img-raised" width="200" height="200"><br>

                        <!-- View attributes/details modal -->
                            <a data-toggle="modal" data-target="#details{{ $model->applicantID }}" style="color:white;" class="btn btn-info btn-round"><i class="now-ui-icons design_bullet-list-67"></i> View Details</a>
                                </div>
                                <div class="card-footer text-muted mb-2">
                                    {{ $model->skill }}
                                </div>
                            </div>
                        </div>   
			</div>           
                    	@endforeach
                    </div>
                </div>
            @endforeach
 @elseif($hello == 0)
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                                <h2 class="text-center" style='color:grey;'> No currently accepted applicants to show</h2>
                            </div>
                    </div>
                </div>                                    
                    @else
                    @endif


            <div class="col-sm-1"><!--space-->
            </div>

            </div>
        </div>
</div>



    <!-- View details Modal -->                        
    @foreach ($models as $model)
          <!-- Apply to job confirmation Modal -->
            <div id="details{{$model->applicantID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
			      <br><img src="{{asset('/uploads/avatars/'.$model->avatar)}}" alt="Thumbnail Image" width="60" height="60" class="rounded-circle img-raised">
                    		<h4>{{ $model->firstName}} {{ $model->lastName}}</h4><br>
                    		<h6><h6><br>
                          </div>
                          <div class="modal-body">
			<p>Details: </p>
			<ul>
                          		<li>
                              		<h0>Project Hired: <b>{{ $model->prjTitle }}<b></h0>
                          		</li>
                          		<li>
                             		<h0>Project Date/s: <b>{{ $model->jobDate }} to {{ $model->jobEnd }}<b></h0>
                         		</li>
                          		<li>
                              		<h0>Talent fee: <b>P{{ $model->talentFee }}.00<b> </h0>
                          		</li>
                          </ul>
                          </div>
                          <div class="modal-footer">
                          <div class="container">
                              <div class="col-sm-2">
                              </div>
                                <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Dismiss</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	</div>
            @endforeach


            </div><!--feed content row closing tag -->
        </div><!-- container fluid closing tag-->


      


@endsection
</div>
