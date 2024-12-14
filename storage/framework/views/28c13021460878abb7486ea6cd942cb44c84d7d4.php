

<?php $__env->startSection('contents'); ?>
<section id="wsus__custom_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="wsus__payment_area">
                    <div class="row">
                        <div class="col-lg-3 col-6 col-sm-4">
                            <?php if($paid == true): ?>
                            <img src="<?php echo e(asset($image)); ?>" alt="payment method" class="img-fluid w-100" style="border: 3px solid black;">
                            <?php else: ?>
                            <a class="wsus__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                <img src="<?php echo e(asset($image)); ?>" alt="payment method" class="img-fluid w-100" style="border: 3px solid black;" s>
                            </a>;
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-7">
                <div class="member_price">
                    <form method="post" action="<?php echo e(route('user.order.payment',$pack->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
                        <?php
                        if ($paid == true) {
                            echo '<button type="button" class="btn" style="background-color: orangered !important; color:white;" disabled>
                                Paid
                              </button>';
                        } else {
                            echo '<a style="color:white;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: orangered !important;">
                                    Check Out
                                 </a>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="wsus__payment_modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wsus__pay_modal_info">
                        <p>Confirm Payment</p>
                        <form method="post" action="<?php echo e(route('user.order.payment',$pack->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php if($pack->price==0): ?>
                            <input type="text" name="transaction_id" placeholder="enter the Transaction Id" value="default" readonly="true">
                            <?php else: ?>
                            <input type="text" name="transaction_id" placeholder="enter the Transaction Id">
                            <?php endif; ?>
                            <div class="wsus__payment_btn_area">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Place Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/pages/checkout.blade.php ENDPATH**/ ?>