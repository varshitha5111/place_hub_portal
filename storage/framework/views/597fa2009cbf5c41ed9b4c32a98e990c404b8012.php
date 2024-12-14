

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
                                    <h2>Create Video Gallery Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>


                        <div>
                            <?php if(Session::has('error')): ?>
                            <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
                            <?php endif; ?>
                        </div>

                        <form method="post" action="<?php echo e(route('user.listing-video-gallery.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <label class="form-contol">Video Gallery</label>
                            
                            <div id="video-part">
                                <input type="text" class="form-control my-1" name="video">
                            </div>
                            <input type="hidden" value="<?php echo e(request()->list_id); ?>" name="list_id">
                            <?php if($errors->has('video')): ?>
                            <p class="text-danger">required and input must be a url</p>
                            <?php endif; ?>

                            <?php if($noOfVideo>=count($videoGallery) && $noOfVideo!=-1): ?>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Upload
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <h3><code>Maximum Video Uploaded</code></h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php else: ?>
                            <button type="submit" name="upload" value="upload" class="my-1 btn btn-danger">upload</button>
                            <?php endif; ?>

                        </form>
                        <br><br>




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
                                    <td><img src="<?php echo e(getYtThumbnail($video->video)); ?>" width="50"></td>
                                    <td><a target="_blank" href="<?php echo e($video->video); ?>" class="btn btn-link"><?php echo e(truncate($video->video,50)); ?></a></td>
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
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/listing/video-gallery/index.blade.php ENDPATH**/ ?>