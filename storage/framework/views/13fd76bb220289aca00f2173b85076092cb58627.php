<title><?php echo $__env->yieldContent('pageTitle'); ?> Stella Admin </title>


<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">

    <?php if(count($audit) > 0): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading m-3 text-center">
                            <h3>Audit Log</h3>
                        </div>

                        <div class="panel-body table-responsive">
                            <table class="table table-hover table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                    
                                    <th>User ID</th>
                                    <th>Log Type</th>
                                    <th>Date Registered</th>
                                    
                                    <th></th>
                                    <th></th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    <?php $__currentLoopData = $audit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           
                                            <td class="table-text">
                                                <div><?php echo e($audit->userID); ?></div>
                                            </td>
                                            
                                            <td class="table-text">
                                                <div><?php echo e($audit->logType); ?></div>
                                            </td>
                                            <td class="table-text">
                                                <div><?php echo e($audit->created_at); ?></div>
                                            </td>
                                            
                                            
                                           
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
            
               <?php endif; ?>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.registerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>