

<?php $__env->startSection('contents'); ?>
<?php /**
 * 
 * @var object $chat
 
 */
?>


<section id="dashboard">
    <div class="container">
        <div class="row">
            <?php echo $__env->make('frontend.dashboard.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing">
                        <div class="card-body">
                            <div class="dashboard_content">
                                <div class="dashboard_message_area">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="tf__message_list">
                                                <div class="nav flex-column nav-pills tf__massager_option" id="v-pills-tab" role="tablist"
                                                    aria-orientation="vertical">
                                                    <?php $__currentLoopData = $recievers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reciever): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-home" role="tab" onclick="updateConversation(<?php echo htmlspecialchars(json_encode($reciever)) ?>,<?php echo htmlspecialchars(json_encode($reciever)) ?>)" aria-controls="v-pills-home" aria-selected="true">

                                                        <div class="tf__single_massage d-flex">
                                                            <div class="tf__single_massage_img">
                                                                <img src="<?php echo e(asset($reciever->listings->thumbnail_image)); ?>" alt="person" class="img-fluid w-100">
                                                            </div>
                                                            <div class="tf__single_massage_text">
                                                                <h4><?php echo e($reciever->listings->title); ?></h4>
                                                                <p><?php echo e($reciever->recieverProfile->name); ?></p>
                                                                <span class="tf__massage_time">30 min</span>
                                                                <span class="badge text-bg-success">4</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- chats of the user  -->
                                        <div class="col-xl-8">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                                    aria-labelledby="v-pills-home-tab" tabindex="0">
                                                    <div class="tf___single_chat">
                                                        <div class="tf__single_chat_top" id="heading-conversation">
                                                            <?php if($chats): ?>
                                                            <div class="img">
                                                                <img src="<?php echo e($chats[0]->listings->thumbnail_image); ?>" alt="person" class="img-fluid w-100">
                                                            </div>
                                                            <div class="text">
                                                                <h4><?php echo e($chats[0]->listings->title); ?></h4>
                                                                <p>active</p>
                                                                <a href="#">Clear Chat</a>
                                                            </div>
                                                        </div>

                                                        <div class="tf__single_chat_body">
                                                            <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($chat->recieverProfile->id===auth()->user()->id): ?>
                                                            <div class="tf__chating">
                                                                <div class="tf__chating_img">
                                                                    <img src="<?php echo e(asset($chat->listings->thumbnail_image)); ?>" alt="person" class="img-fluid w-100">
                                                                </div>
                                                                <div class="tf__chating_text">

                                                                    <p><?php echo e($chat->msg); ?></p>
                                                                    <span><?php echo date('j F y ,g:i a', strtotime($chat->created_at)) ?></span>
                                                                </div>
                                                            </div>
                                                            <?php else: ?>
                                                            <div class="tf__chating tf_chat_right">
                                                                <div class="tf__chating_text">
                                                                    <p><?php echo e($chat->msg); ?></p>
                                                                    <span><?php echo date('j F y ,g:i a', strtotime($chat->created_at)) ?></span>
                                                                </div>
                                                                <div class="tf__chating_img">
                                                                    <img src="<?php echo e(asset($chat->recieverProfile->avatar)); ?>" alt="person" class="img-fluid w-100">
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                        <form class="tf__single_chat_bottom" method="post" action="<?php echo e(route('user.message.send')); ?>" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="reciever_id" value="<?php echo e($chats[0]->listings->user_id); ?>">
                                                            <input type="hidden" name="list_id" value="<?php echo e($chats[0]->listings->id); ?>">
                                                            <input type="text" placeholder="Type a message..." name="msg">
                                                            <button type="submit" class="tf__massage_btn"><i class="fas fa-paper-plane"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php else: ?>
                                        <div class="container">
                                            <div class="text-center">
                                                send and message any listing admin
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
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
    function updateConversation(reciever) {

        reciever_profile = reciever['reciever_profile'];
        listings = reciever['listings'];
        window.location.href = "<?php echo e(route('user.message.conversation', ['reciever_id' => ':receiverProfileId', 'list_id' => ':listingId'])); ?>"
            .replace(':receiverProfileId', reciever_profile['id'])
            .replace(':listingId', listings['id']);

    }
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/frontend/dashboard/message/index.blade.php ENDPATH**/ ?>