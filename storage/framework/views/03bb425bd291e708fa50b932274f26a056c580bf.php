

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Payment Setting</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Update Profile</div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>2 Column</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Payment_setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            <form method="post" action="<?php echo e(route('admin.payment.setting.create')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Status<?php echo e(config('payment_setting.status')); ?></label>
                                    <select class="form-control" aria-label="Default select example" name="status">
                                        <option value="" disabled>Open this select menu</option>
                                        <option value="1" <?php echo config('payment_setting.status')==="1"?'selected':'';?>>Active</option>
                                        <option value="0" <?php echo config('payment_setting.status')==="0"?'selected':'';?>>Inactive</option>
                                    </select>
                                    <?php if($errors->has('status')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Mode</label>
                                    <select class="form-control" aria-label="Default select example" name="mode">
                                        <option value="" disabled>Open this select menu</option>
                                        <option value="sandBox" <?php echo config('payment_setting.mode')==='sandBox'?'selected':'';?>>SandBox</option>
                                        <option value="live" <?php echo config('payment_setting.mode')==='live'?'selected':'';?>>Live</option>
                                    </select>
                                    <?php if($errors->has('mode')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputPassword4" class="form-label">Payment Country</label><br>
                                    <select class="form-control" id="country" aria-label="Default select example" name="country" onchange="setCurrency(<?php echo htmlspecialchars(json_encode(config('country.country-currency')));?>)" select2>
                                        <option value="" disabled>Open this select menu</option>
                                        <?php $__currentLoopData = config('country.country-currency'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value); ?>" <?php echo config('payment_setting.country')===$value?'selected':'';?>><?php echo e($value); ?>(<?php echo e($key); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('country')): ?>
                                    <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-12 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Currency</label>
                                    <input type="text"  class="form-control" id="currency" name="currency" readonly="true" value="<?php echo e(config('payment_setting.currency')); ?>"/> 
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Currency Rate (per <?php echo e($setting->currency); ?>)</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="rate" value="<?php echo e(config('payment_setting.rate')); ?>">
                                    <?php if($errors->has('icon')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Client Id</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="client_id" value="<?php echo e(config('payment_setting.client_id')); ?>">
                                    <?php if($errors->has('client_id')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment Secret Key</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="secret_key" value="<?php echo e(config('payment_setting.secret_key')); ?>">
                                    <?php if($errors->has('secret_key')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 my-3">
                                    <label for="inputEmail4" class="form-label">Payment App Key</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="app_key" value="<?php echo e(config('payment_setting.app_key')); ?>">
                                    <?php if($errors->has('app_key')): ?>
                                    <p class="text-danger text-small">$errors->get('name')</p>
                                    <?php endif; ?>
                                </div>                                
                                <div class="col-md-6 my-3">
                                    <input type="submit" class="btn btn-primary" name="btn" value="update">
                                </div>
                            </form>
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
    function setCurrency(country)
    {
        let v=document.getElementById('country').value;
        let $key=Object.keys(country).find(key=>country[key]===v);
        document.getElementById('currency').value=$key;
    }
</script>
<?php $__env->stopPush(); ?>
    

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/payment_setting/index.blade.php ENDPATH**/ ?>