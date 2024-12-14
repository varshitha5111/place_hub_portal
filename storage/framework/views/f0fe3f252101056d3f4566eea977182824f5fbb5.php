

<?php $__env->startSection('contents'); ?>

<!--==========================
        BREADCRUMB PART START
    ===========================-->
<div id="breadcrumb_part">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>listing</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('frontend.index')); ?>"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> listing </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==========================
        BREADCRUMB PART END
    ===========================-->


<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our pricing </h2>
                    </div>
                </div>
            </div>
            <div class="procing_area">
                <div class="row">
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pack): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="member_price">
                            <h4><?php echo e($pack->name); ?> </h4>
                            <?php if($setting->currency): ?>
                            <?php if($setting->position==='left'): ?>
                            <h5><?php echo e($setting->currency); ?><?php echo e($pack->price); ?> <span>/ <?php echo e($pack->number_of_days); ?></span></h5>
                            <?php else: ?>
                            <h5><?php echo e($pack->price); ?> <?php echo e($setting->currency); ?><span>/ <?php echo e($pack->number_of_days); ?></span></h5>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($pack->no_of_listing!=-1): ?>
                            <p><?php echo e($pack->no_of_listing); ?> Listing available</p>
                            <?php else: ?>
                            <p>Ultimate Listing available</p>
                            <?php endif; ?>

                            <?php if($pack->no_of_photos!=-1): ?>
                            <p><?php echo e($pack->no_of_listing); ?> Photos available</p>
                            <?php else: ?>
                            <p>Ultimate Photos available</p>
                            <?php endif; ?>

                            <?php if($pack->no_of_video!=-1): ?>
                            <p><?php echo e($pack->no_of_video); ?> Videos available</p>
                            <?php else: ?>
                            <p>Ultimate Videos available</p>
                            <?php endif; ?>

                            <?php if($pack->no_of_amentities!=-1): ?>
                            <p><?php echo e($pack->no_of_amentities); ?> Listing available</p>
                            <?php else: ?>
                            <p>Ultimate amentity available</p>
                            <?php endif; ?>

                            <?php if($pack->no_of_featured_listing!=-1): ?>
                            <p><?php echo e($pack->no_of_featured_listing); ?> featured Listing available</p>
                            <?php else: ?>
                            <p>Ultimate featured Listing available</p>
                            <?php endif; ?>

                            <a href="<?php echo e(route('user.listing.packages.checkout',$pack->id)); ?>">Check Out</a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/pages/packages.blade.php ENDPATH**/ ?>