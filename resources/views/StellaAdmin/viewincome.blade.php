@extends('layouts.adminapp')

<title>@yield('pageTitle') Stella Admin </title>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Income from Models vs. Employers"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
			{ y: '<?php echo $totalmod ?>', name: "Models", exploded: true },
			{ y: '<?php echo $totalemp ?>', name: "Employers" },
		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
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
                <a href="{{ url('/admin/income') }}">
                   <i class="now-ui-icons business_money-coins"></i>
                   <p>Income Report</p>
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
            <a class="navbar-brand" href="#pablo">Income Report</a>
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
                        <span class="d-lg-none d-md-block">Income Report</span>
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
      <div class="content" >
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="tablecontents">
                    <div class="card-header">
                        <h5 class="title">Income report</h5>
                    </div>

                    <div class="card-body">

                        @if (count($trans) > 0)
                            <div class="panel panel-default">

                                <div class="panel-body table-responsive">
                                    <table id="viewincome" class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead>
                                            
                                            <th>User ID</th>
                                            <th>Amount</th>
                                            <th>E-mail address</th>
                                            
                                            <th>Date of Payment</th>
                                            
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            @foreach ($trans as $trans)
                                                <tr>
                                                
                                                    <td class="table-text">
                                                        <div>{{ $trans->userID }}</div>
                                                    </td>
                                                    
                                                    <td class="table-text">
                                                        <div>{{ $trans->amount }}</div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div>{{ $trans->email }}</div>
                                                    </td>
                                                    <td>{{$trans->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                    
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- NEW PANEL -->
        
      <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Summary <button class="btn btn-sm btn-info btn-round" id="print" onclick="printContent('tablecontents');">Print</button></h5>
                    </div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<br>
                    <div class="card-body">

                        
                            <div class="panel panel-default">

                                <div class="panel-body table-responsive">
                                    <table class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead>
                                            
                                            <th>VARIANT</th>
                                            <th>INCOME</th>
                                            
                                            
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            
                                                <tr>
                                                
                                                    <td class="table-text">
                                                        <div>TOTAL SALES</div>
                                                    </td>
                                                    
                                                    <td class="table-text">
                                                        <div>{{$total}}.00 pesos</div>
                                                    </td>
                                                    
                                                </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                    
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


@endsection