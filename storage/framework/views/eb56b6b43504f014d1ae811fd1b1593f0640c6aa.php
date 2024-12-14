

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Schedule</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Hero</div>
        </div>
    </div>
    <!-- <div class="toast-container position-fixed top-0 right-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Edit schedule
                </div>
                <div>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('admin.listing.schedule.change',[$schedule->list_id,$schedule->id])); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">Day</label>
                                <select class="form-control " aria-label="Default select example" name="days" disabled>
                                    <option selected value="0">Choose a Day</option>
                                    <?php $__currentLoopData = config('list-schedule.day'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d); ?>" <?php echo $d===$schedule->day?'selected':''; ?>><?php echo e($d); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('days')): ?>
                                <p class="text-danger text-small">$errors->get('name')</p>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="appt">Select a Start time:</label>
                                    <input type="time" id="appt" name="start" value="<?php echo e($schedule->start); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="appt">Select a End time:</label>
                                    <input type="time" id="appt" name="end" value="<?php echo e($schedule->end); ?>">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">status</label>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected value="0">Choose</option>
                                    <option value="0" <?php echo $schedule->status===0?'selected':''; ?>>Inactive</option>
                                    <option value="1" <?php echo $schedule->status===1?'selected':''; ?>>Active</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                <p class="text-danger text-small">$errors->get('status')</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/listing/listing-schedule/edit.blade.php ENDPATH**/ ?>