

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
                                    <h2>Create Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card-body">
                            <form method="post" action="<?php echo e(route('user.agent-listing.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                                <input type="hidden" name="oldImg" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ThumbNail Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview-2" class="image-preview">
                                                <label for="image-upload" id="image-label-2">Choose File</label>
                                                <input type="file" name="thumb_img" id="image-upload-2" />
                                                <input type="hidden" name="oldImg" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">title</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="title">
                                        <?php if($errors->has('title')): ?>
                                        <p class="text-danger text-small">$errors->get('name')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">Category</label><br>
                                        <select class="form-control" aria-label="Default select example" name="category">
                                            <option selected>Open this select menu</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('category')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">Location</label><br>
                                        <select class="form-control" aria-label="Default select example" name="location">
                                            <option selected>Open this select menu</option>
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('location')): ?>
                                        <p class="text-danger text-small">$errors->get('loaction')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">address</label>
                                        <textarea class="form-control" id="inputEmail4" name="address"></textarea>
                                        <?php if($errors->has('address')): ?>
                                        <p class="text-danger text-small">$errors->get('name')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">Phone</label><br>
                                        <input type="text" class="form-control" name="phone">
                                        <?php if($errors->has('phone')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">email</label><br>
                                        <input type="email" class="form-control" name="email">
                                        <?php if($errors->has('email')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputPassword4" class="form-label">website</label><br>
                                        <input type="text" class="form-control" name="website">
                                        <?php if($errors->has('website')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">facebook link</label><br>
                                        <input type="text" class="form-control" name="fb">
                                        <?php if($errors->has('fb')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">X-Link</label><br>
                                        <input type="text" class="form-control" name="x">
                                        <?php if($errors->has('x')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">Linkden Link</label><br>
                                        <input type="text" class="form-control" name="linkden">
                                        <?php if($errors->has('linkden')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="listing" value="0">
                                    <div class="col-md-6 my-3">
                                        <label for="inputPassword4" class="form-label">whatsapp</label><br>
                                        <input type="text" class="form-control" name="whatsapp">
                                        <?php if($errors->has('whatsapp')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputPassword4" class="form-label">Amenities</label><br>
                                        <?php $i = 0; ?>
                                        <?php $__currentLoopData = $amentities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amentity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check form-check-inline">
                                            <div class="btn btn-warning my-1" id=<?php echo 'check-id' . $i; ?>>
                                                <?php if($maxAmentity!=-1): ?>
                                                <input class="form-check-input mx-1" id=<?php echo 'ipcheck' . $i; ?> onchange="checkAmen(<?php echo $i ?>,<?php echo $maxAmentity ?>)" type="checkbox" id=<?php echo 'inlineCheckbox' . $i; ?> name="amentity[]" value="<?php echo e($amentity->id); ?>">
                                                <?php else: ?>
                                                <input class="form-check-input mx-1" id=<?php echo 'ipcheck' . $i; ?>  type="checkbox" id=<?php echo 'inlineCheckbox' . $i; ?> name="amentity[]" value="<?php echo e($amentity->id); ?>">
                                                <?php endif; ?>
                                                <label class=<?php echo 'form-check-label' . $i; ?> id=<?php echo 'check' . $i; ?> for=<?php echo 'inlineCheckbox' . $i; ?>><i class="<?php echo e($amentity->icon); ?>" style="color:black;"></i><?php echo e($amentity->name); ?></label>
                                            </div>
                                        </div>
                                        <?php $i++ ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <input type="hidden" value=<?php echo $i - 1 ?> name="no_amentity">
                                        <?php if($errors->has('amentity[]')): ?>
                                        <p class="text-danger text-small">amentity is required</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputPassword4" class="form-label">Description</label><br>
                                        <textarea id="summernote" name="description"></textarea>
                                        <?php if($errors->has('description')): ?>
                                        <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-12 my-3">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Attachment</label>
                                            <input class="form-control" type="file" id="formFileMultiple" name="file" multiple>
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">google map</label>
                                            <input class="form-control" type="text" id="" name="google_map">
                                        </div>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">seo_title</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="seo_title">
                                        <?php if($errors->has('seo_title')): ?>
                                        <p class="text-danger text-small">$errors->get('name')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">seo_description</label>
                                        <input type="text" class="form-control" id="inputEmail4" name="seo_description">
                                        <?php if($errors->has('seo_description')): ?>
                                        <p class="text-danger text-small">$errors->get('name')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label for="inputPassword4" class="form-label">Status</label><br>
                                        <select class="form-control " aria-label="Default select example" name="status">
                                            <option selected>Open this select menu</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <?php if($errors->has('status')): ?>
                                        <p class="text-danger text-small">$errors->get('status')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label for="inputPassword4" class="form-label">is_featured</label><br>
                                        <select class="form-control " aria-label="Default select example" name="is_featured">
                                            <option>Open this select menu</option>
                                            <?php if($maxFeatured===true): ?>
                                            <option value="1">Active</option>
                                            <?php endif; ?>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <?php if($maxFeatured===false): ?>
                                        <code>maximum featured done already cannot do further!</code>
                                        <?php endif; ?>
                                        <?php if($errors->has('is_featured')): ?>
                                        <p class="text-danger text-small">$errors->get('status')</p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 my-2">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <!-- <button type="submit" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
                                    </div>
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
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-2", // Default: .image-upload
        preview_box: "#image-preview-2", // Default: .image-preview
        label_field: "#image-label-2", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>
<script>
    function checkAmen(i, maxAmentity) {
        if ($('#ipcheck' + i).prop("checked") === true) {
            noOfAmentity += 1;
        } else if ($('#ipcheck' + i).prop("checked") === false) {
            noOfAmentity -= 1;
        }
        if (noOfAmentity > maxAmentity) {
            noOfAmentity -= 1;
            alert('max amentity hv already been added ');
            let checkbox = document.querySelector('#ipcheck' + i);
            checkbox.checked = false;
        }
    }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/listing/create.blade.php ENDPATH**/ ?>