

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Hero</h1>
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
                    Edit Category
                </div>
                <div>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('admin.category.edit.submit',$category->slug)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="icon" id="image-upload" />
                                        <input type="hidden" name="oldImg" value="<?php echo e($category->icon_image); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Background Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-2" class="image-preview">
                                        <label for="image-upload" id="image-label-2">Choose File</label>
                                        <input type="file" name="bg_img" id="image-upload-2" />
                                        <input type="hidden" name="oldImg" value="<?php echo e($category->bg_image); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo e($category->name); ?>">
                                <?php if($errors->has('name')): ?>
                                <p class="text-danger text-small">$errors->get('name')</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Show At Home</label><br>
                                <select class="form-control" aria-label="Default select example" name="show_at_home">
                                    <option value="1" <?php echo e($category->show_at_home===1?'selected':''); ?>>Yes</option>
                                    <option value="0" <?php echo e($category->show_at_home===0?'selected':''); ?>>No</option>
                                </select>
                                <?php if($errors->has('show_at_home')): ?>
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Show At Frontend</label><br>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option value="1" <?php echo e($category->status===1?'selected':''); ?>>Active</option>
                                    <option value="0" <?php echo e($category->status===1?'selected':''); ?>>Inactive</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                <p class="text-danger text-small">$errors->get('status')</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <!-- <button type="submit" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
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
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>