<!DOCTYPE html>
<html>
<head>
    <title>Modelling Portfolio</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo asset('css/imagegalleryview.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>


    <div class="row">
        <div class='list-group gallery' >
                @if($images->count())
                    @foreach($images as $image)
                    

                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="display:{{$image->display}}">
                        <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/{{ $image->image }}">
                        <div class="thumbnail"> 
                        <img class="img-responsive portrait" alt="" src="/uploads/{{ $image->image }}" alt="Image"/>
                        </div>
                        </a>
                        
                        <!-- REPORT BUTTON --> 
                        <button data-toggle="modal" data-target="#report{{$image->imageID}}" type="submit" name="button" class="btn btn-maroon btn-round">Report</button>
                                
                    </div> <!-- col-6 / end -->
                   

                    @endforeach
                @endif
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->

    <!-- Report Photo Modal -->
    @foreach($images as $image)
              <div id="report{{$image->imageID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="font-family:inherit;">Why are you reporting this photo?</h4>
                          </div>
                          <div class="modal-body">
                          <form class="" action="/employer/reportphoto" method="post">
                              {{ csrf_field() }}
                            <input type="hidden" name="imageID" id="imageID" value="{{$image->imageID}}" readonly>
                            <input type="hidden" name="userID" id="userID" value="{{$image->userID}}" readonly>
                              <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                </div>
                                <select size="0.4" class="form-control" name="reason" id="reason" required>
                                    <option value="" selected disabled>Select reason..</option>
                                        <option value="Nudity">Nudity</option>
                                        <option value="Pornography">Pornography</option>
                                        <option value="Promotion of Self Harm">Promotion of Self Harm</option>
                                        <option value="Promotion of Drugs">Promotion of Drugs</option>
                                </select>
                            </div><br>
                          </div>
                          <div class="modal-footer">
                              <div class="col-sm-3">
                              </div>
                              <button type="submit" name="button" class="btn btn-success btn-round">Report</button>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>
                            </div>
                      </div>
                    </div>
                </div>
              </form>
              <!-- End of Modal -->
              @endforeach

</body>


<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });

    $(".delete").on("submit", function(){
        return confirm("Are you sure?");
    });
</script>
</html>