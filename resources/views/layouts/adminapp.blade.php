<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('pageTitle')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-dashboard.css?v=1.1.0')?>" rel="stylesheet" />
</head>


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
          <li class="active ">
            <a href="./dashboard.html">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="now-ui-icons files_paper"></i>
              <p>Audit Log</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons business_badge"></i>
              <p>Admin Panel</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Coupons</p>
            </a>
          </li>
          <li>
              <a href="/admin/addAdmin">
                <i class="now-ui-icons users_single-02"></i>
                <p>Add Admin</p>
              </a>
            </li>
          <li>
            <a href="./tables.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>Users</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons gestures_tap-01"></i>
              <p>Reports</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

@yield('content')

<footer class="footer">
        <div class="container-fluid">
            <div class="copyright" id="copyright">
            &copy;
            <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Developed by Angela, Bea, and Justine
            </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo asset('js/core/jquery.min.js')?>"></script>
  <script src="<?php echo asset('js/core/popper.min.js')?>"></script>
  <script src="<?php echo asset('js/core/bootstrap.min.js')?>"></script>
  <script src="<?php echo asset('js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  <!-- Chart JS -->
  <script src="<?php echo asset('js/plugins/chartjs.min.js')?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo asset('js/plugins/bootsrap-notify.js')?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo asset('js/plugins/now-ui-dashboard.min.js?v=1.1.0')?>" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>