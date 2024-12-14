

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


<!--==========================
        LISTING PAGE START
    ===========================-->
<section id="listing_grid" class="grid_view">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <form>
                    <div class="listing_grid_sidbar">
                        <div class="sidebar_line">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                        <div class="sidebar_line_select">
                            <select class="select_2" name="state">
                                <option value="">categorys</option>
                                <option value="">category 1</option>
                                <option value="">category 2</option>
                                <option value="">category 3</option>
                                <option value="">category 4</option>
                                <option value="">category 5</option>
                            </select>
                        </div>
                        <div class="sidebar_line_select">
                            <select class="select_2" name="state">
                                <option value="">location</option>
                                <option value="">location 1</option>
                                <option value="">location 2</option>
                                <option value="">location 3</option>
                                <option value="">location 4</option>
                                <option value="">location 5</option>
                            </select>
                        </div>
                        <div class="wsus__pro_check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate4">
                                <label class="form-check-label" for="flexCheckIndeterminate4">
                                    Heating
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate5">
                                <label class="form-check-label" for="flexCheckIndeterminate5">
                                    Smoking Allow
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate6">
                                <label class="form-check-label" for="flexCheckIndeterminate6">
                                    Icon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate7">
                                <label class="form-check-label" for="flexCheckIndeterminate7">
                                    Parking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                    Air Condition
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate1">
                                <label class="form-check-label" for="flexCheckIndeterminate1">
                                    Internet
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate2">
                                <label class="form-check-label" for="flexCheckIndeterminate2">
                                    Terrace
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate3">
                                <label class="form-check-label" for="flexCheckIndeterminate3">
                                    Wi-Fi
                                </label>
                            </div>
                        </div>
                        <button class="read_btn" type="submit">search</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php $__currentLoopData = $listing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-sm-6">
                        <div class="wsus__featured_single">
                            <div class="wsus__featured_single_img">
                                <img src="<?php echo e(asset($l->image)); ?>" alt="images" class="img-fluid w-100">
                                <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                <a href="#" class="small_text"><?php echo e($l->cat_title); ?></a>
                            </div>
                            <a name="lm" class="map" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="<?php echo e(route('user.user.listing.listing_cat_model',$l->id)); ?>" onclick="model_fun(<?php echo htmlspecialchars(json_encode($l)) ?>)"><i class="fas fa-info"></i></a>
                            <div class="wsus__featured_single_text">
                                <a href="<?php echo e(route('user.listing.list_view',$l->slug)); ?>"><?php echo e(truncate($l->title,10)); ?></a>
                                <p class="address"><?php echo e($l->loc_name); ?></p>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- listmodal -->
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

                    <div class="col-12">
                        <div id="pagination">
                            <nav aria-label="">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">02</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#">05</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--==========================
        LISTING PAGE START
    ===========================-->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
    function model_fun($list) {
        var modal = document.getElementById('modal-body-inside');
        var s = "";
        s = $list['slug'];
        modal.innerHTML = '<div class="row">' +
            '<div class="col-12 col-xl-12 col-md-12">' +
            '<div class="map_popup_content">' +
            '<div class="img">' +
            '<img src="' + $list['image'] + '" alt="images" class="img-fluid w-100">' +
            '</div>' +
            '<div class="map_popup_text">' +
            '<span><i class="far fa-star"></i> Featured</span>' +
            '<span class="red"><i class="far fa-check"></i> verified</span>' +
            '<h5>' + $list['title'] + '</h5>' +
            '<a class="call" href="callto:+69552200325444"><i class="fal fa-phone-alt"></i>' +
            $list['phone'] + '</a>' +
            '<a class="mail" href="mailto:example@gmail.com"><i class="fal fa-envelope"></i>' +
            $list['email'] + '</a>' +
            '<p>' + $list['description'] + '</p>' +
            '</div>' +
            '</div>' +
            '</div>'
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/pages/listing_cat.blade.php ENDPATH**/ ?>