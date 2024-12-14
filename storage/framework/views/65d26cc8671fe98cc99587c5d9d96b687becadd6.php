

<?php $__env->startSection('contents'); ?>
<!--==========================
        BANNER PART START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        BANNER PART END
    ===========================-->


<!--==========================
        CATEGORY SLIDER START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        CATEGORY SLIDER END
    ===========================-->


<!--==========================
        FEATURES PART START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        FEATURES PART END
    ===========================-->


<!--==========================
        COUNTER PART START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.counter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        COUNTER PART END
    ===========================-->


<!--==========================
        OUR CATEGORY START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.our_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        OUR CATEGORY END
    ===========================-->


<!--==========================
        OUR LOCATION START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        OUR LOCATION END
    ===========================-->


<!--==========================
        FEATURED LISTING START 
    ===========================-->
<?php echo $__env->make('frontend.home.sections.feature_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        FEATURED LISTING END
    ===========================-->


<!--==========================
        OUR PACKAGE START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.package', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        OUR PACKAGE END
    ===========================-->


<!--============================
        TESTIMONIAL PART START
    ==============================-->
<?php echo $__env->make('frontend.home.sections.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--============================
        TESTIMONIAL PART END
    ==============================-->


<!--==========================
        BLOG PART START
    ===========================-->
<?php echo $__env->make('frontend.home.sections.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--==========================
        BLOG PART END
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
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/home/sections/index.blade.php ENDPATH**/ ?>