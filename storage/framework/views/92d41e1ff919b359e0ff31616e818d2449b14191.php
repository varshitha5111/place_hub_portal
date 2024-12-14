

<?php $__env->startSection('contents'); ?>

<?php /**
 * 
 * @var object $orders
 */
?>

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
                            <div class="row">
                                <div class="clear-fix">
                                    <div class="float-start">
                                        <p class="fs-4 fw-bold">Invoice</p>
                                    </div>
                                    <div class="float-end">
                                        <h1 class="fs-4 fw-bold">Order Id: <?php echo e($orders->id); ?></h1>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="clear-fix">
                                    <div class="float-start">
                                        <h4 class="fs-6 fw-semibold">Paid By</h4>
                                        <p><?php echo e($orders->user->name); ?></p>
                                        <p><?php echo e($orders->user->email); ?></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="clear-fix">
                                    <div class="float-start">
                                        <h4 class="fw-semibold">Payment Method</h4>
                                        <p><?php echo e($orders->payment_mode); ?></p>
                                        <p>transaction id: <?php echo e($orders->transaction_id); ?></p>
                                    </div>
                                    <div class="float-end">
                                        <h4 class="fw-semibold">Order Date</h4>
                                        <p><?php echo e($orders->created_at); ?></p>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <p><button class="btn  btn-primary"></button><span class="fw-semibold">Order Summary</span></p>
                                <div class="my-1 table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Package</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Paid In</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo e($orders->id); ?></th>
                                                <td><?php echo e($orders->package->name); ?></td>
                                                <td><?php echo e($orders->paid_amount); ?></td>
                                                <td><?php echo e($orders->paid_currency); ?></td>
                                                <td><?php echo e($orders->base_amount); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-12">
                                    <br><div class="clear-fix">
                                        <div class="mx-2 float-start">
                                            <p class="fw-bolder" >Payment Status :</p>
                                        </div>
                                        <div class="float-end">
                                            <button class="mt-1 btn btn-sm btn-<?php echo $orders->payment_status === 'success' ? 'success' : ($orders->payment_status === 'pending' ? 'warning' : 'danger'); ?>"><?php echo e($orders->payment_status); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>


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
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/orders/viewDetails.blade.php ENDPATH**/ ?>