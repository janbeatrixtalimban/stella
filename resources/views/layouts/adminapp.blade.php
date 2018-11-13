<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo asset('img/stella icon logo.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('pageTitle')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo asset('css/datatables.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-dashboard.css?v=1.1.0')?>" rel="stylesheet" />
</head>

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
  <script src="<?php echo asset('js/datatables.min.js')?>" type="text/javascript"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo asset('js/now-ui-dashboard.min.js?v=1.1.0')?>" type="text/javascript"></script>
  <script>
  
    $(document).ready(function() {
      $('#adminAudit').DataTable();
      $('#adminList').DataTable();
      $('#auditLogs').DataTable();
      $('#modelsList').DataTable();
      $('#employersList').DataTable();
      $('#jobReports').DataTable();
      $('#photoReports').DataTable();
      $('#viewincome').DataTable();
    } );

  </script>
  <script type="text/javascript">

      $("select[name='location']:eq(0)").on("change", function() {
          $("select[name='city']:eq(0)").find("optgroup, option").hide().filter("[label='" + this.value + "'], [label='" + this.value + "'] > *").show();
      });

  </script>

</body>

</html>