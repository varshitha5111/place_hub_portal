<section id="wsus__location">
    <div class="wsus__location_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our location </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wsus__location_filter">
                        <button class="active" data-filter="*">All City</button>
                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button data-filter=".<?php echo e($location->name); ?>"><?php echo e($location->name); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row grid">
                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $location->listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-sm-6 col-lg-4 <?php echo e($location->name); ?>">
                    <div class="wsus__featured_single">
                        <div class="wsus__featured_single_img">
                            <img src="<?php echo e(asset($l->image)); ?>" alt="images" class="img-fluid w-100">
                            <a href="#" class="love"><i class="fas fa-heart"></i></a>
                            <a href="#" class="small_text"><?php echo e($l->Category->name); ?></a>
                        </div>
                        <a name="lm" class="map" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="<?php echo e(route('user.user.listing.listing_cat_model',$l->id)); ?>" onclick="model_fun(<?php echo htmlspecialchars(json_encode($l)) ?>)"><i class="fas fa-info"></i></a>
                        <div class="wsus__featured_single_text">
                            <p class="list_rating">
                                <?php $i = 0; ?>
                                <?php while($i<round($l->reviews_avg_rating,1)): ?>
                                    <i class="fas fa-star"></i>
                                    <?php $i++; ?>
                                    <?php endwhile; ?>
                            </p>
                            <a href="<?php echo e(route('user.listing.list_view',$l->slug)); ?>"><?php echo e(truncate($l->title,10)); ?></a>
                            <p class="address"><?php echo e($l->location->name); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- list modal -->

            </div>
            <section id="wsus__map_popup">
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                            <div class="modal-body" id="modal-body">
                                <div id="modal-body-inside">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</section><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/home/sections/location.blade.php ENDPATH**/ ?>