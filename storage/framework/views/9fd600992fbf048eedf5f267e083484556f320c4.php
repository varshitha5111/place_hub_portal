

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
                                    <h2>Create Image Gallery Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div>
                            <?php if(Session::has('error')): ?>
                            <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.listing-image-gallery.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <label class="form-contol">Image Gallery</label>
                                <div id="file-part">
                                    <input type="file" class="form-control" id="no_of_files" name="img[]" onchange="checkImg(<?php echo $noOfImg ?>)" multiple>
                                </div>
                                <input type="hidden" value="<?php echo e(request()->list_id); ?>" name="list_id">
                                <br>
                                <button type="submit" name="upload" value="upload" class="btn btn-danger btn-sm">upload</button>
                            </form>
                        </div><br><br>
                        <div class=" col-12 my-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $imageGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="my-2">
                                        <th scope="row"><?php echo e($img->id); ?></th>
                                        <td><img src="<?php echo e(asset($img->image)); ?>" style="width:80px !important;"></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger" value="delete">delete</button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
    function checkImg($maxImg) {
        let fileIp = document.getElementById('no_of_files');
        let htmltag = document.getElementById('file-part');
        let selectedFiles = fileIp.files;
        if ($maxImg < selectedFiles.length) {
            alert('maximum images uploaded');
            htmltag.innerHTML = '<input type="file" class="form-control" id="no_of_files" name="img[]" onchange="checkImg('+$maxImg+')" multiple>'
        }

    }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/listing/image-gallery/index.blade.php ENDPATH**/ ?>