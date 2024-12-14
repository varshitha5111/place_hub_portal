

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
                                    <h2>Create Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.listing.schedule.store',$list_id)); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">Day</label>
                                        <select class="form-control " aria-label="Default select example" name="days">
                                            <option selected value="0">Choose a Day</option>
                                            <?php $__currentLoopData = config('list-schedule.day'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            if (!$days->contains('day', $d)) {
                                                echo '<option value="' . $d . '">' . $d . '</option>';
                                            }
                                            ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('days')): ?>
                                        <p class="text-danger text-small">$errors->get('name')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="appt">Select a Start time:</label>
                                            <input type="time" id="appt" name="start">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="appt">Select a End time:</label>
                                            <input type="time" id="appt" name="end">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">status</label>
                                        <select class="form-control " aria-label="Default select example" name="status">
                                            <option selected value="0">Choose</option>
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                        </select>
                                        <?php if($errors->has('status')): ?>
                                        <p class="text-danger text-small">$errors->get('status')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 my-2">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>
                            </form>
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
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/listing/listing-schedule/create.blade.php ENDPATH**/ ?>