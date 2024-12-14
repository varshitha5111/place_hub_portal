

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Update Profile</div>
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
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('admin.update.profile')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Avatar</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-avatar" class="image-preview">
                                        <label for="image-upload-avatar" id="image-label-avatar">Choose File</label>
                                        <input type="file" name="avatar" id="image-upload-avatar" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-banner" class="image-preview">
                                        <label for="image-upload-banner" id="image-label-banner">Choose File</label>
                                        <input type="file" name="banner" id="image-upload-banner" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo e(auth()->user()->name); ?>">
                                <?php if($errors->has('name')): ?>
                                <p class="text-danger text-small">Name is required</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputPassword4" name="email" value="<?php echo e(auth()->user()->email); ?>">
                                <?php if($errors->has('email')): ?>
                                <p class="text-danger text-small">Email is required</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputPassword4" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="inputPassword4" name="phone" value="<?php echo e(auth()->user()->phone); ?>">
                                <?php if($errors->has('phone')): ?>
                                <p class="text-danger text-small">Phone Number is required</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="<?php echo e(auth()->user()->address); ?>">
                                <?php if($errors->has('address')): ?>
                                <p class="text-danger text-small">Address is required</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 my-2">
                                <label for="exampleFormControlTextarea1" class="form-label">About</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="about"><?php echo e(auth()->user()->about); ?></textarea>
                                <?php if($errors->has('about')): ?>
                                <p class="text-danger text-small">About user is required</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputCity" class="form-label">Website</label>
                                <input type="text" class="form-control" id="inputCity" name="website" value="<?php echo e(auth()->user()->website); ?>">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputCity" class="form-label">WhatsApp</label>
                                <input type="text" class="form-control" id="inputCity" name="whatsapp" value="<?php echo e(auth()->user()->whatsapp); ?>">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputPassword4" class="form-label">Facebook Link</label>
                                <input type="text" class="form-control" id="inputPassword4" name="fb" value="<?php echo e(auth()->user()->fb); ?>">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputPassword4" class="form-label">Twitter Link</label>
                                <input type="text" class="form-control" id="inputPassword4" name="twitter" value="<?php echo e(auth()->user()->twitter); ?>">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputPassword4" class="form-label">Insta Link</label>
                                <input type="text" class="form-control" id="inputPassword4" name="insta" value="<?php echo e(auth()->user()->insta); ?>">
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="inputPassword4" class="form-label">Linkden Link</label>
                                <input type="text" class="form-control" id="inputPassword4" name="linkden" value="<?php echo e(auth()->user()->linkden); ?>">
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Update Password</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('admin.update.password')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-6 my-2">
                            <label for="inputPassword4" class="form-label">Old Password</label>
                            <input type="text" class="form-control" id="inputPassword4" name="oldPass">
                            <?php if(Session::has('wrng_oldPass')): ?>
                            <p class="text-danger text-small"><?php echo e(Session::get('wrng_oldPass')); ?></p>
                            <?php endif; ?>
                            <?php if($errors->has('oldPass')): ?>
                            <p class="text-danger text-small">Password is required</p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="inputPassword4" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="inputPassword4" name="newPass">
                            <?php if($errors->has('newPass')): ?>
                            <p class="text-danger text-small">required</p>
                            <?php endif; ?>
                            <?php if(Session::has('wrng_confirm')): ?>
                            <p class="text-danger text-small"><?php echo e(Session::get('wrng_confirm')); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="inputPassword4" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" id="inputPassword4" name="confirmPass">
                            <?php if($errors->has('confirmPass')): ?>
                            <p class="text-danger text-small">Confirm Password is required</p>
                            <?php endif; ?>
                            <?php if(Session::has('wrng_confirm')): ?>
                            <p class="text-danger text-small"><?php echo e(Session::get('wrng_confirm')); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 my-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <!-- <button type="submit" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
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
        input_field: "#image-upload-avatar", // Default: .image-upload
        preview_box: "#image-preview-avatar", // Default: .image-preview
        label_field: "#image-label-avatar", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-banner", // Default: .image-upload
        preview_box: "#image-preview-banner", // Default: .image-preview
        label_field: "#image-label-banner", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/profile/update.blade.php ENDPATH**/ ?>