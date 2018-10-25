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
  <!-- bootstrap and stylesheets -->
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-kit.css')?>" rel="stylesheet" />
</head>


@yield('content')

<footer class="footer">
      <div class="container">
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Developed by Angela, Bea, and Justine
        </div>
      </div>
    </footer>
  </div>

<!-- Javascript -->
    <script src="<?php echo asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://www.google.com/recaptcha/api.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('public/js/bootstrap.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-switch.js')?>"></script>
    <script src="<?php echo asset('js/plugins/nouislider.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-datepicker.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')?>"></script>
    <script src="<?php echo asset('js/now-ui-kit.js?v=1.2.0')?>" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">

        var model = '<fieldset><h4>Model:</h4>' + '<label>Role:</label>' + 

        '<div class="input-group input-lg"><div class="input-group-prepend"><span class="input-group-text"></span></div><select size="0.4" class="form-control" name="role" id="role" required><option value="" selected disabled>Select role of model..</option><option value="Fashion Model">Fashion(Editorial) model</option><option value="Runway Model">Runway model</option><option value="Commercial Model">Commercial model</option><option value="Plus Size Model">Plus size model</option><option value="Petite Model">Petite model</option><option value="Swimsuit Model">Swimsuit Model</option><option value="Lingerie Model">Lingerie Model</option><option value="Glamour Model">Glamour Model</option><option value="Fitness Model">Fitness Model</option><option value="Fitting Model">Fitting Model</option><option value="Parts Model">Parts Model</option><option value="Promotional Model">Promitional Model</option><option value="Mature Model">Mature Model</option></select></div>' +

        '<label>Talent Fee:</label>' +
        '<div class="input-group input-lg"><div class="input-group-prepend"><span class="input-group-text"></span></div><input type="text" class="form-control" name="talentFee" id="talentFee" placeholder="Talent Fee in PHP" value=""></div>' +

        '<label>Height:</label>' +

        '<div class="input-group input-lg"><div class="input-group-prepend"><span class="input-group-text"></span></div><input type="text" class="form-control" name="height" id="height" placeholder="Height requirement" value=""></div>' +

        '<label>Body Built:</label>' +

        '<div class="input-group input-lg"><div class="input-group-prepend"><span class="input-group-text"></span></div><select size="0.4" class="form-control" name="bodyBuilt" id="bodyBuilt" required><option value="" selected disabled>Select Body Built</option><option value="Petite">Petite</option><option value="Slim">Slim</option><option value="Athletic">Athletic</option><option value="Plus Size">Plus Size</option></select></div><br>' +
        
        '</fieldset';

        $('#modelNumber').on('change', function(e) {
          var numSelected = Number($(this).val());
          appendControls(numSelected);
        });

        function appendControls(num) {
          $('#modelcontainer').empty();
          for (var i=0; i<num; i++) {
            $('#modelcontainer').append(model);
          } 
        }

    </script>

</body>
</html>