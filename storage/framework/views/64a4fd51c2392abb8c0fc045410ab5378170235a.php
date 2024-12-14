<section id="wsus__category_slider">
    <div class="container">
        <div class="wsus__category_slider_area">
            <div class="row category_slider">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-2">
                    <a href="<?php echo e(route('user.listing.list_cat',$category->slug)); ?>" class="wsus__category_single_slider">
                        <span>
                            <img src="<?php echo e(asset($category->icon_image)); ?>" alt="category" class="img-fluid w-100">
                        </span>
                        <p><?php echo e($category->name); ?></p>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/home/sections/category.blade.php ENDPATH**/ ?>