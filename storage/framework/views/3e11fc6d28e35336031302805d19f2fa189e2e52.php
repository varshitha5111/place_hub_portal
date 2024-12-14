

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?php echo e(route('admin.orders.index')); ?>"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Orders</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Hero</div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Order Details
                </div>
                <div>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                </div>
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
                    </div>
                    <div class="row">
                        <p><button class="btn btn-<?php echo $orders->payment_status==='success'?'success':($orders->payment_status==='pending'?'warning':'danger');?>"></button><span>Change Payment Status</span></p>
                        <div class="my-1 col-sm-4">
                            <form method="post" action="<?php echo e(route('admin.orders.edit',$orders->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <select class="form-control" aria-label="Default select example" name="status">
                                    <option value="success" <?php echo $orders->payment_status==='success'?'selected':'';?>>Success</option>
                                    <option value="Failed" <?php echo $orders->payment_status==='failed'?'selected':'';?>>Failed</option>
                                    <option value="Pending" <?php echo $orders->payment_status==='pending'?'selected':'';?>>Pending</option>
                                </select>
                                <button class="my-1 btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-2", // Default: .image-upload
        preview_box: "#image-preview-2", // Default: .image-preview
        label_field: "#image-label-2", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/orders/viewDetails.blade.php ENDPATH**/ ?>