<div class="tab-pane fade show active" id="profile4" role="tabpanel" aria-labelledby="home-tab4">
    <form method="post" action="<?php echo e(route('admin.setting.create')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo e($settings['name']); ?>">
            <?php if($errors->has('name')): ?>
            <p class="text-danger text-small">$errors->get('name')</p>
            <?php endif; ?>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="<?php echo e($settings['email']); ?>">
            <?php if($errors->has('email')): ?>
            <p class="text-danger text-small">$errors->get('name')</p>
            <?php endif; ?>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Phone</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone" value="<?php echo e($settings['phone']); ?>">
            <?php if($errors->has('phone')): ?>
            <p class="text-danger text-small">$errors->get('name')</p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 my-3">
            <label for="inputPassword4" class="form-label">Default Country</label><br>
            <select class="form-control" id="country" aria-label="Default select example" name="country" onchange="setCurrency(<?php echo htmlspecialchars(json_encode(config('country.country-currency'))); ?>)" select2>
                <option selected>Open this select menu</option>
                <?php $__currentLoopData = config('country.country-currency'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value); ?>" <?php echo $settings['country'] === $value ? 'selected' : '' ?>><?php echo e($value); ?>(<?php echo e($key); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('country')): ?>
            <p class="text-danger text-small">$errors->get('show_at_home')</p>
            <?php endif; ?>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Currency</label>
            <input type="text" class="form-control" id="currency" name="currency" readonly="true" value="<?php echo e($settings['currency']); ?>" />
        </div>
       
        <div class="col-md-6 my-3">
            <label for="inputEmail4" class="form-label">Site Currency Postion</label>
            <select class="form-control" aria-label="Default select example" name="position">
                <option>Open this select menu</option>
                <option value="left" <?php echo $settings['position'] === "left" ? 'selected' : '' ?>>Left</option>
                <option value="right" <?php echo $settings['position'] === "right" ? 'selected' : '' ?>>Right</option>
            </select>
            <?php if($errors->has('position')): ?>
            <p class="text-danger text-small">$errors->get('name')</p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 my-3">
            <input type="submit" class="btn btn-primary" name="btn" value="update">

        </div>
    </form>
</div><?php /**PATH C:\laravel_projects\listing\resources\views/admin/setting/pusher-setting.blade.php ENDPATH**/ ?>