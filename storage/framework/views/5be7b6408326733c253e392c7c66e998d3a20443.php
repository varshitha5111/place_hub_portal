

<?php $__env->startSection('contents'); ?>

<section class="section">
    <div class="section-header">
        <h1>Chat Box</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Chat Box</div>
        </div>
    </div>

    <div class="section-body">


        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Who's Online?</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            <?php $__currentLoopData = $senders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- <li class="media" style="cursor: pointer;" onclick=" updateConversation(<// echo htmlspecialchars(json_encode($sender)) )"> -->
                            <li class="media" style="cursor: pointer;" id="senderProfile" data-current-user-id="<?php echo e(auth()->user()->id); ?>" data-sender-profile-id="<?php echo e($sender->senderProfile->id); ?>" data-list-id="<?php echo e($sender->listings->id); ?>">
                                <img alt="image" class="mr-3 rounded-circle" width="50" src="<?php echo e(asset($sender->senderProfile->avatar)); ?>">
                                <div class="media-body">
                                    <input type="hidden" id="senderProfileId">
                                    <input type="hidden" id="listId">
                                    <div class="mt-0 mb-1 font-weight-bold"><?php echo e($sender->senderProfile->name); ?> ( <?php echo e($sender->listings->title); ?> )</div>
                                    <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- conversation -->
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card chat-box" id="mychat_box">
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script>
    function updateConversation(sender) {


        console.log("hii");
        sender_profile = sender['sender_profile'];
        listings = sender['listings'];
        console.log(sender_profile);
        window.location.href = "<?php echo e(route('admin.message.conversation', ['sender_id' => ':senderProfileId', 'list_id' => ':listingId'])); ?>"
            .replace(':senderProfileId', sender_profile['id'])
            .replace(':listingId', listings['id']);

    }

    function scrollToBottom() {
        var chatbox = $('#mychat_box');
        chatbox.scrollTop(chatbox[0].scrollHeight);
    }
</script>

<script>
    function loadConversation(sender_id, list_id, finalurl, current_user_id) {
        console.log(sender_id);
        console.log(list_id);
        console.log(finalurl);

        var baseurl = "<?php echo e(asset('')); ?>";
        $.ajax({
            url: finalurl,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var header = '<div class="card-header">' +
                    '<h4>Chat with ' + response[0].sender_profile.name + '</h4>' +
                    '</div>' +
                    '<div class="card-body chat-content"> <div class="tf__single_chat_body">';

                var card_part = '';
                $.each(response, function(index, message) {
                    var formattedDate = new Date(message.sender_profile.created_at).toLocaleString(); // Format date in JavaScript
                    if (message.sender_profile.id != current_user_id) {
                        card_part +=
                            '<div class="d-flex justify-content-start">' +
                            '<div class="tf__chating">' +
                            '<div class="d-inline-flex p-4">' +
                            '<div class="tf__chating_img">' +
                            '<img src="' + baseurl + message.sender_profile.avatar + '" alt="person" class="mr-3 rounded-circle" width="50">' +
                            '</div>' +
                            '<div class="tf__chating_text">' +
                            '<p class="alert alert-primary">' + message.msg + '</p>' +
                            '<span>' + formattedDate + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    } else {
                        card_part += '<div class="d-flex justify-content-end">' +
                            '<div class="tf__chating">' +
                            '<div class="d-inline-flex p-4">' +
                            '<div class="tf__chating_img">' +
                            '<img src="' + baseurl + message.sender_profile.avatar + '" alt="person" class="mr-3 rounded-circle" width="50">' +
                            '</div>' +
                            '<div class="tf__chating_text">' +
                            '<p class="alert alert-primary">' + message.msg + '</p>' +
                            '<span>' + formattedDate + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }
                });
                card_part +=

                    '<form id="chat-form" data-sender-chat-form-id="' + current_user_id + '" data-reciever-chat-form-id="' + response[0].sender_profile.id + '" data-list-id="' + list_id + '">' +
                    '<div class="row">' +
                    '<div class="col-9">' +
                    '<input type="text" class="form-control" id="msg" placeholder="Type a message" name="msg" >' +
                    '<input type="hidden" name="reciever_id" value="' + response[0].sender_profile.id + '">' +
                    '<input type="hidden" name="sender_chat_form_id" value="' + current_user_id + '">' +
                    '<input type="hidden" name="list_chat_form_id" value="' + list_id + '">' +
                    '</div>' +
                    '<div class="col-3">' +
                    '<button class="btn btn-primary">' +
                    '<i class="far fa-paper-plane"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</form>' + '</div></div>';
                // Update the chatbox with the header and chat content
                $('#mychat_box').html(header + card_part);
                scrollToBottom();
            },
            error: function(xhr) {
                console.log('error', xhr.responseText);
            }
        });
    }

    $(document).on('click', '#senderProfile', function(e) {
        e.preventDefault();

        var sender_id = $(this).data('sender-profile-id');
        var list_id = $(this).data('list-id');
        var current_user_id = $(this).data('current-user-id');

        var finalurl = "<?php echo e(route('admin.message.conversation', ['sender_id' => ':sender_id', 'list_id' => ':list_id'])); ?>"
            .replace(':sender_id', sender_id)
            .replace(':list_id', list_id);

        loadConversation(sender_id, list_id, finalurl, current_user_id);
    });
</script>

<script>
    $(document).on('submit', '#chat-form', function(e) {
        e.preventDefault();
        console.log("helloo");
        current_user_id = $(this).data('sender-chat-form-id');
        sender_id = $(this).data('reciever-chat-form-id');
        list_id = $(this).data('list-id');
        msg = $('#msg').val()
        finalurl = '<?php echo e(route("admin.message.send",["reciever_id"=>":reciever_id","sender_id"=>":sender_id","list_id"=>":list_id","msg"=>":msg"])); ?>'
            .replace(":reciever_id", sender_id)
            .replace(":sender_id", current_user_id)
            .replace(":list_id", list_id)
            .replace(":msg", msg);
        console.log(this);
        console.log(current_user_id, sender_id, list_id, msg);
        $.ajax({
            url: finalurl,
            type: 'GET',
            dataType: 'text',
            success: function(response) {
                console.log(response);
            },
            error: function(xhr) {
                console.log("error" + xhr.responseText);
            }
        });

    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel_projects\listing\resources\views/admin/message/index.blade.php ENDPATH**/ ?>