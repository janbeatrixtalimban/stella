<!DOCTYPE html>
<html>
<head>
    <title>Modelling Portfolio</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox-->
    <link href="<?php echo asset('css/imagegalleryview.css')?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

</head>
<body>

    <div class="row">
        <div class='list-group gallery' >
                @if($images->count())
                    @foreach($images as $image)
                    

                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="display:{{$image->display}}">
                        <a class="thumbnail fancybox" rel="ligthbox" href="{{asset('/uploads/'.$image->image)}}">
                        <div class="thumbnail">    
                        <img class="img-responsive portrait" alt="" src="{{asset('/uploads/'.$image->image)}}" alt="Image"/>
                        </div>
                        </a>
                        <!-- ARCHIVE BUTTON 
                        <form class="" action="/model/archive" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="imageID" id="imageID" value="{{$image->imageID}}" readonly>
                                  <button type="submit" name="button" class="btn btn-maroon btn-round">Archive</button>
                        </form>--> 
                                
                    </div> <!-- col-6 / end -->
                   

                    @endforeach
                @endif
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->

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