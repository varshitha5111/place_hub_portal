<section id="wsus__categoryes">
        <div class="wsus__categorye_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 m-auto">
                        <div class="wsus__heading_area">
                            <h2>Our Categories</h2>
                            <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                                estut clita dolorem ei est mazim fuisset scribentur.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $featuredCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-sm-6">
                        <a href="<?php echo e(route('user.listing.list_cat',$fcat->slug)); ?>" class="wsus__category_single">
                            <div class="wsus__category_img">
                                <img src="<?php echo e(asset($fcat->bg_image)); ?>" alt="img" class="img-fluid w-100">
                            </div>
                            <div class="wsus__category_text">
                                <div class="wsus__category_text_center">
                                    <i class="fab fa-atlassian"></i>
                                    <p><?php echo e($fcat->name); ?></p>
                                    <span class="green"><?php echo e($fcat->listings_count); ?> Listings</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/home/sections/our_category.blade.php ENDPATH**/ ?>