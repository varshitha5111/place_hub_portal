@extends('frontend.layout.master')

@section('contents')
<?php /**
 * 
 * @var object $chat
 
 */
?>


<section id="dashboard">
    <div class="container">
        <div class="row">
            @include('frontend.dashboard.sidebar')
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
                                                    @foreach ($recievers as $reciever)
                                                    <div class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill"
                                                        data-bs-target="#v-pills-home" role="tab" onclick="updateConversation(<?php echo htmlspecialchars(json_encode($reciever)) ?>,<?php echo htmlspecialchars(json_encode($reciever)) ?>)" aria-controls="v-pills-home" aria-selected="true">

                                                        <div class="tf__single_massage d-flex">
                                                            <div class="tf__single_massage_img">
                                                                <img src="{{asset($reciever->listings->thumbnail_image)}}" alt="person" class="img-fluid w-100">
                                                            </div>
                                                            <div class="tf__single_massage_text">
                                                                <h4>{{$reciever->listings->title}}</h4>
                                                                <p>{{$reciever->recieverProfile->name}}</p>
                                                                <span class="tf__massage_time">30 min</span>
                                                                <span class="badge text-bg-success">4</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
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
                                                            @if($chats)
                                                            <div class="img">
                                                                <img src="{{$chats[0]->listings->thumbnail_image}}" alt="person" class="img-fluid w-100">
                                                            </div>
                                                            <div class="text">
                                                                <h4>{{$chats[0]->listings->title}}</h4>
                                                                <p>active</p>
                                                                <a href="#">Clear Chat</a>
                                                            </div>
                                                        </div>

                                                        <div class="tf__single_chat_body">
                                                            @foreach($chats as $chat)
                                                            @if($chat->recieverProfile->id===auth()->user()->id)
                                                            <div class="tf__chating">
                                                                <div class="tf__chating_img">
                                                                    <img src="{{asset($chat->listings->thumbnail_image)}}" alt="person" class="img-fluid w-100">
                                                                </div>
                                                                <div class="tf__chating_text">

                                                                    <p>{{$chat->msg}}</p>
                                                                    <span><?php echo date('j F y ,g:i a', strtotime($chat->created_at)) ?></span>
                                                                </div>
                                                            </div>
                                                            @else
                                                            <div class="tf__chating tf_chat_right">
                                                                <div class="tf__chating_text">
                                                                    <p>{{$chat->msg}}</p>
                                                                    <span><?php echo date('j F y ,g:i a', strtotime($chat->created_at)) ?></span>
                                                                </div>
                                                                <div class="tf__chating_img">
                                                                    <img src="{{asset($chat->recieverProfile->avatar)}}" alt="person" class="img-fluid w-100">
                                                                </div>
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                        </div>
                                                        <form class="tf__single_chat_bottom" method="post" action="{{route('user.message.send')}}" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="reciever_id" value="{{$chats[0]->listings->user_id}}">
                                                            <input type="hidden" name="list_id" value="{{$chats[0]->listings->id}}">
                                                            <input type="text" placeholder="Type a message..." name="msg">
                                                            <button type="submit" class="tf__massage_btn"><i class="fas fa-paper-plane"></i></button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @else
                                        <div class="container">
                                            <div class="text-center">
                                                send and message any listing admin
                                            </div>
                                        </div>
                                        @endif
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

@endsection

@push('scripts')

<script>
    function updateConversation(reciever) {

        reciever_profile = reciever['reciever_profile'];
        listings = reciever['listings'];
        window.location.href = "{{ route('user.message.conversation', ['reciever_id' => ':receiverProfileId', 'list_id' => ':listingId']) }}"
            .replace(':receiverProfileId', reciever_profile['id'])
            .replace(':listingId', listings['id']);

    }
</script>

@endpush