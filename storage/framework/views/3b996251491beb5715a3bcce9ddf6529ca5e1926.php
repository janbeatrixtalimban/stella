<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $__env->yieldContent('pageTitle'); ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-dashboard.css?v=1.1.0')?>" rel="stylesheet" />
</head>

<?php echo $__env->yieldContent('content'); ?>

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