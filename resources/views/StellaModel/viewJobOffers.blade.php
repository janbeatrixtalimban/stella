@extends('layouts.modelapp')

<title>@yield('pageTitle') View Job Offers </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/modelfeed ') }}" rel="tooltip" title="Go to Homepage" data-placement="bottom">
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
                            <a class="nav-link" href="{{ url('/modelfeed') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                <p>Home</p>
                            </a>
                        </li>
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
                                <span class="d-lg-none d-md-block">   View Job Offers</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/modelprofile') }}" style="color:black;">
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/viewjoboffers') }}" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscription') }}" style="color:black;">Subscription</a> 
                                <a class="dropdown-item" href="{{ url('/model/forgotPassword') }}" style="color:black;">Settings</a>
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
                <div class="col-sm-2"><!--space-->
                </div>
  
  <div class="col-sm-8">

    <!-- Card for job offer contents -->
      @foreach($details->reverse() as $detail)

            @if($detail->hirestatus != '2')
              <div id="joboffer" class="card text-center">
                <div class="card-body" style="color:#1b1b1b;">
                  <div class="row">
                    <div class="col-sm-7">
                      <h3 class="card-title text-center">{{ $detail->prjTitle }}</h3>
                        <p>{{ $detail->jobDescription }}</p>

                      <!-- View more details button -->
                          <button data-toggle="modal" data-target="#details{{$detail->projectID}}" name="button" class="btn btn-info btn-round" rel="tooltip" title="View Details"><i class="now-ui-icons design_bullet-list-67"></i></button>

                      <!-- Accept Offer button -->
                      @if($detail->hirestatus == '0')
                          <button data-toggle="modal" data-target="#confirm{{$detail->projectID}}" name="button" class="btn btn-success btn-round" rel="tooltip" title="Accept Offer"><i class="now-ui-icons ui-1_check"></i></button>
                      @elseif($detail->hirestatus == '1')
                          <button data-toggle="modal" data-target="#confirm{{$detail->projectID}}" name="button" class="btn btn-success btn-round" rel="tooltip" title="You have already accepted this offer and talent fee." disabled><i class="now-ui-icons ui-1_check"></i></button>
                      @else
                      @endif

                      <!-- Reject Offer button -->
                      @if($detail->hirestatus == '0')
                          <button data-toggle="modal" data-target="#reject{{$detail->projectID}}" name="button" class="btn btn-maroon btn-round" rel="tooltip" title="Reject Offer"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                      @elseif($detail->hirestatus == '2')
                          <button data-toggle="modal" data-target="#reject{{$detail->projectID}}" name="button" class="btn btn-maroon btn-round" rel="tooltip" title="Reject Offer" disabled><i class="now-ui-icons ui-1_simple-remove"></i></button>
                      @else
                      @endif
                    </div><!--closing for col-sm-7-->

                          @if($detail->hirestatus == '0')
                          <div class="col-sm-4" style="padding-top:20px;">
                              <h5 class="card-title">Not satisfied with the talent fee?</h5>
                                  <h6 class="card-title">Make an offer</h6>

                                      @if($detail->haggleStatus == '1')  
                                          <button data-toggle="modal" data-target="#haggle{{$detail->projectID}}" name="button" class="btn btn-success btn-round" rel="tooltip" title="Your haggle offer was accepted!" disabled>Haggle</button>
                                      @elseif($detail->haggleStatus == '2')  
                                          <button data-toggle="modal" data-target="#haggle{{$detail->projectID}}" name="button" class="btn btn-maroon btn-round" rel="tooltip" title="Your haggle offer was rejected!" disabled>Haggle</button>
                                      @else
                                          <button data-toggle="modal" data-target="#haggle{{$detail->projectID}}" name="button" class="btn btn-info btn-round">Haggle</button>
                                      @endif

                            </div><!-- closing for col-sm-4 -->
                          @else
                          <div class="col-sm-4" style="padding-top:30px;">
                              <h5 class="text-center">Job has been accepted</h5>
                              <img src="<?php echo asset('img/check.png')?>" width="60">
                          </div>
                          @endif

                  </div><!-- closing for row tag -->
                </div><!--card body closing -->
                <div class="card-footer text-muted mb-2 text-center">
                    {{ $detail->created_at->diffForHumans() }}
                </div>
      
            </div><!-- card closing tag -->
            
            @else
            @endif

      @endforeach
                    
      </div><!-- col-sm-8 closing tag -->
      

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


  
<!-- View Details Modal -->
    @foreach ($details as $detail)
          
        <div id="details{{$detail->projectID}}" class="modal fade" style="padding-top: 100px;" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <h4><img src="/uploads/avatars/{{ $detail->avatar }}" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">    {{ $detail->prjTitle }} </h4>
                              <p>by {{ $detail->firstName }} {{ $detail->lastName }}</p><br>

                              <p><b>Details:</b></p>
                                <ul>
                                    <li>
                                      <h0>Email: <b>{{ $detail->emailAddress }}</b></h0>
                                    </li>
                                    <li>
                                      <h0>Company: <b>{{$detail->name}}</b></b></h0>
                                    </li>
                                    <li>
                                      <h0>Role: <b>{{ $detail->role }}</b></h0>
                                    </li>
                                @if($detail->haggleStatus == '101')
                                    <li>
                                      <h0>Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '0')
                                    <li>
                                      <h0>Original Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                    <li>
                                      <h0>Haggle Offer: <a style="color:#a01919;"><b>P{{ $detail->haggleAmount }}.00</b></a></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '1')
                                    <li>
                                      <h0>Agreed Talent Fee (FINAL): <b>P{{ $detail->haggleAmount }}.00</b></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '2')
                                    <li>
                                      <h0>Original Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                @else
                                @endif
                                    <li>
                                      <h0>Where: <b>{{ $detail->address }}, {{ $detail->location }}</b></h0>
                                    </li>
                                </ul>

                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Close</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
    @endforeach
<!-- End of Modal -->



<!-- Confirm Accept Offer Modal -->
    @foreach ($details as $detail)
      
      <div id="confirm{{$detail->projectID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                          @if($detail->haggleStatus == '101')
                            <h4 class="modal-title">Are you sure you want to accept the job offer <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a> from <b>{{ $detail->firstName }} {{ $detail->lastName }}</a></b> for <b>P{{$detail->talentFee}}.00</b>?</h4><br>
                          @elseif ($detail->haggleStatus == '0')
                            <h4 class="modal-title">Accepting this job is not allowed at the moment, as you have a pending haggle offer of <b>P{{$detail->haggleAmount}}.00</b> with the employer.</h4><br>
                          @elseif ($detail->haggleStatus == '1')
                            <h4 class="modal-title">Congrats! <b>{{ $detail->firstName }} {{ $detail->lastName }} </b> from {{ $detail->name }} has accepted your haggle offer of <b>P{{$detail->haggleAmount}}.00</b> for the project <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a> </h4><br>
                          @elseif ($detail->haggleStatus == '2')
                            <h4 class="modal-title">We regret to inform you that your haggle offer of P{{$detail->haggleAmount}}.00 was rejected by <b>{{ $detail->firstName }} {{ $detail->lastName }}</b> from {{ $detail->name }} for the project <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a></h4><br>
                            <p class="text-center"> You may still <b>accept</b> the job offer for the original talent fee of <b>P{{$detail->talentFee}}.00</b></p>
                          @else
                          @endif
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <form class="text-center" action="/model/accept" method="post">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    @if($detail->haggleStatus == '101')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    @elseif ($detail->haggleStatus == '0')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Dismiss</button>
                                    @elseif ($detail->haggleStatus == '1')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    @elseif ($detail->haggleStatus == '2')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    @else
                                    @endif

                                    @if($detail->haggleStatus == '101')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @elseif ($detail->haggleStatus == '0')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round" hidden>No</button>
                                    @elseif ($detail->haggleStatus == '1')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Dismiss</button>
                                    @elseif ($detail->haggleStatus == '2')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @else
                                    @endif
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
    @endforeach
<!-- End of Modal -->



<!-- Reject Offer Modal -->
    @foreach ($details as $detail)
      
      <div id="reject{{$detail->projectID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                          @if($detail->haggleStatus == '101')
                            <h4 class="modal-title">Are you sure you want to reject the offer <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a> from <b>{{ $detail->firstName }} {{ $detail->lastName }}</b> for <b>P{{$detail->talentFee}}.00</b>?</h4><br>
                          @elseif ($detail->haggleStatus == '0')
                            <h4 class="modal-title">You still have a pending haggle of <b>P{{$detail->haggleAmount}}.00</b> with the employer. Are you sure you want to reject this offer?</h4><br> 
                            <p class="text-center" style="color:#a01919;">This cannot be undone.</p>
                          @elseif ($detail->haggleStatus == '1')
                            <h4 class="modal-title"><b>{{ $detail->firstName }} {{ $detail->lastName }} </b> from {{ $detail->name }} has accepted your haggle offer of <b>P{{$detail->haggleAmount}}.00</b> for the project <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a>. Are you sure you want to reject this? </h4><br>
                          @elseif ($detail->haggleStatus == '2')
                            <h4 class="modal-title">We regret to inform you that your haggle offer of P{{$detail->haggleAmount}}.00 was rejected by <b>{{ $detail->firstName }} {{ $detail->lastName }}</b> from {{ $detail->name }} for the project <a style="color:#a01919;"><b>{{$detail->prjTitle}}</b></a></h4><br>
                            <p class="text-center"> You may <b>reject</b> this offer if you disagree with the original talent fee of <b>P{{$detail->talentFee}}.00</b></p>
                          @else
                          @endif
                    <form class="text-center" action="/model/reject" method="post">
                            {{ csrf_field() }}
                          <textarea class="form-control" style="height:150px" id="rejectReason" name="rejectReason" placeholder="State your Reason.." required></textarea>
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                                    <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    @if($detail->haggleStatus == '101')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Reject</button>
                                    @elseif ($detail->haggleStatus == '0')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    @elseif ($detail->haggleStatus == '1')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    @elseif ($detail->haggleStatus == '2')
                                      <button type="submit" name="button" class="btn btn-success btn-round">Reject</button>
                                    @else
                                    @endif


                                    @if($detail->haggleStatus == '101')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @elseif ($detail->haggleStatus == '0')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @elseif ($detail->haggleStatus == '1')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @elseif ($detail->haggleStatus == '2')
                                      <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                    @else
                                    @endif
                      </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
    @endforeach
<!-- End of Modal -->



<!-- Confirm Haggle Offer Modal -->
    @foreach ($details as $detail)
      
          <div id="haggle{{$detail->projectID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            @if($detail->haggleStatus == '101')
                            <h4 class="modal-title">Make an offer:</h4>
                            @elseif($detail->haggleStatus == '0')
                            <h4 class="modal-title">You have already made an offer.</h4>
                            @elseif($detail->haggleStatus == '1')
                            <h4 class="modal-title">Your offer has been accepted!</h4>
                            @else($detail->haggleStatus == '2')
                            <h4 class="modal-title">Your offer was rejected!</h4>
                            @endif
                          </div>
                          <div class="modal-body">
                            <form class="text-center" action="/model/haggle" method="post">
                                {{ csrf_field() }}
                                @if($detail->haggleStatus == '1')
                                <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                      <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                      <input type="text" class="form-control" id="haggleAmount" value="{{$detail->haggleAmount}}" name="haggleAmount" readonly>
                                </div>
                                @elseif($detail->haggleStatus == '0')
                                <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                      <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                      <input type="text" class="form-control" id="haggleAmount" value="{{$detail->haggleAmount}}" name="haggleAmount" readonly>
                                </div>
                                @elseif($detail->haggleStatus == '2')
                                <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                      <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                      <input type="text" class="form-control" id="haggleAmount" value="{{$detail->haggleAmount}}" name="haggleAmount" readonly>
                                </div>
                                @else
                                <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                      <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                      <input type="text" class="form-control" id="haggleAmount" value="" name="haggleAmount" required>
                                </div>
                                @endif
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                                  @if($detail->haggleStatus == '0')
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Send</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Dismiss</button>
                                  @elseif($detail->haggleStatus == '101')
                                    <button type="submit" name="button" class="btn btn-success btn-round">Send</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Cancel</button>
                                  @elseif($detail->haggleStatus == '1')
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Send</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Cancel</button>
                                  @elseif($detail->haggleStatus == '2')
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Send</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">Cancel</button>
                                  @else
                                  @endif
                            </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
    @endforeach 
<!-- End of Modal -->

            </div>
    </div>

@endsection
</div>
