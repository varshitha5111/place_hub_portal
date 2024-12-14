

<?php $__env->startSection('contents'); ?>

<section id="dashboard">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('frontend.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing">
                        <div class="card-header">
                            <div class="clear-fix">
                                <div class="float-start">
                                    <h3>Order Details</h3>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card-body">
                            <?php echo e($dataTable->table()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>


<script>
    $('#myForm').on('submit', function(ev) {
        console.log("hello");
        $('#del_cat').modal('show');


        var data = $(this).serializeObject();
        json_data = JSON.stringify(data);
        $("#results").text(json_data);
        $(".modal-body").text(json_data);

        // $("#results").text(data);

        ev.preventDefault();
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/orders/index.blade.php ENDPATH**/ ?>