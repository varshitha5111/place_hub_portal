<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/fontawesome/css/all.min.css')); ?>"> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->

    <!-- CSS Libraries -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/weather-icon/css/weather-icons.min.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/modules/summernote/summernote-bs4.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/modules/jquery-selectric/selectric.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/bootstrap-iconpicker.min.css')); ?>"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/summernote.min.css')); ?>"> -->
    <!-- Template CSS -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/components.css')); ?>"> -->


    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body class="">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <?php echo $__env->make('frontend.layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->yieldContent('contents'); ?>

            <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</body>
<!-- General JS Scripts -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

<!-- <script src="<?php echo e(asset('admin/assets/modules/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/modules/popper.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/modules/tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/modules/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/stisla.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script> -->

<!-- JS Libraies -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/chart.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/summernote/summernote-bs4.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/summernote/summernote.min.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')); ?>"></script> -->

<!-- Page Specific JS File -->
<!-- <script src="<?php echo e(asset('admin/assets/js/page/index-0.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script> -->
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<!-- Template JS File -->
<!-- <script src="<?php echo e(asset('admin/assets/js/scripts.js')); ?>"></script> -->
<!-- <script src="<?php echo e(asset('admin/assets/js/custom.js')); ?>"></script> -->

<!-- <script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
  
  const toastTrigger = document.getElementById('liveToastBtn')
  const toastLiveExample = document.getElementById('liveToast')

  if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
      toastBootstrap.show()
    })
  }
</script> -->


<?php echo $__env->yieldPushContent('scripts'); ?>


</html><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dumy.blade.php ENDPATH**/ ?>