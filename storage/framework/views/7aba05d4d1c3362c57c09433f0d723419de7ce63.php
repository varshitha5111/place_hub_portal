

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Video Gallery</h1>
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
                    Create Video Gallery :
                </div>
                <div>
                    <?php if(Session::has('error')): ?>
                    <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('admin.listing-video-gallery.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-contol">Video Gallery</label>
                                <input type="text" class="form-control" name="video">
                                <input type="hidden" value="<?php echo e(request()->list_id); ?>" name="list_id">
                                <?php if($errors->has('video')): ?>
                                <p class="text-danger">required and input must be a url</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <input type="submit" name="upload" value="upload" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div><br><br>

            </div>
        </div>
        <div class=" col-12 my-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Video_Image</th>
                        <th scope="col">Video_url</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $videoGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="my-2">
                        <th scope="row"><?php echo e($video->id); ?></th>
                        <td><img src="<?php echo e(getYtThumbnail($video->video)); ?>" width="80"></td>
                        <td><a target="_blank" href="<?php echo e($video->video); ?>" class="btn btn-link"><?php echo e($video->video); ?></a></td>
                        <td>
                            <button type="submit" class="btn btn-danger" value="delete">delete</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/listing/video-gallery/index.blade.php ENDPATH**/ ?>