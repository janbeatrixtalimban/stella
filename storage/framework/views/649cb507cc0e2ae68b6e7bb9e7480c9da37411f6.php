<!DOCTYPE html>
<html>
<head>
    <title>Modelling Portfolio</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <style type="text/css">
    .gallery
    {
        display: inline-block center;
        margin-top: 0px;
    }
    .close-icon{
    	border-radius: 50%;
        position: absolute;
        right: 5px;
        top: -10px;
        padding: 5px 8px;
    }
    .form-image-upload{
        background: #e8e8e8 none repeat scroll 0 0;
        padding: 15px;
    }

    .thumbnail {
        position: relative;
        width: 250px;
        height: 250px;
        overflow: hidden;
    }

    .thumbnail img {
        position: absolute;
        left: 50%;
        top: 50%;
        height: 100%;
        width: auto;
        -webkit-transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
    }

    .thumbnail img.portrait {
        width: 100%;
        height: auto;
    }

    .btn-maroon {
        background-color: #a01919;
        color: #FFFFFF;
    }

    .btn-round {
        border-width: 1px;
        border-radius: 30px;
        padding-right: 23px;
        padding-left: 23px;
    }

    .btn-info {
        background-color: #2CA8FF;
        color: #FFFFFF;
    }

    </style>
</head>
<body>


    <div class="row">
        <div class='list-group gallery' >
                <?php if($images->count()): ?>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    

                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="display:<?php echo e($image->display); ?>">
                        <a class="thumbnail fancybox" rel="ligthbox" href="/uploads/<?php echo e($image->image); ?>">
                        <div class="thumbnail">    
                        <img class="img-responsive portrait" alt="" src="/uploads/<?php echo e($image->image); ?>" alt="Image"/>
                        </div>
                        </a>
                        <button data-toggle="modal" data-target="#archive<?php echo e($image->imageID); ?>" type="submit" name="button" class="btn btn-maroon btn-round">Archive</button>
                                
                    </div> <!-- col-6 / end -->
                   

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->


     <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!-- Apply to job confirmation Modal -->
            <div id="archive<?php echo e($image->imageID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4>Are you sure your want to archive this photo?</h4>
                          </div>
                          <div class="modal-footer">
                                <form class="" action="/model/archive" method="post">
                                <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="imageID" id="imageID" value="<?php echo e($image->imageID); ?>" readonly>
                                    <button type="submit" name="button" class="btn btn-maroon btn-round">Archive</button>
                                    <button type="button" class="btn btn-info btn-round" data-dismiss="modal" style="float:right;">Close</button>
                                </form>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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