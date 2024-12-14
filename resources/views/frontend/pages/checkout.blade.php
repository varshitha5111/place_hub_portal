@extends('frontend.layout.master')

@section('contents')
<section id="wsus__custom_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="wsus__payment_area">
                    <div class="row">
                        <div class="col-lg-3 col-6 col-sm-4">
                            @if ($paid == true)
                            <img src="{{asset($image)}}" alt="payment method" class="img-fluid w-100" style="border: 3px solid black;">
                            @else
                            <a class="wsus__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                <img src="{{asset($image)}}" alt="payment method" class="img-fluid w-100" style="border: 3px solid black;" s>
                            </a>;
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-7">
                <div class="member_price">
                    <form method="post" action="{{route('user.order.payment',$pack->id)}}" enctype="multipart/form-data">
                        @csrf
                        <h4>{{$pack->name}} </h4>
                        @if($setting->currency)
                        @if($setting->position==='left')
                        <h5>{{$setting->currency}}{{$pack->price}} <span>/ {{$pack->number_of_days}}</span></h5>
                        @else
                        <h5>{{$pack->price}} {{$setting->currency}}<span>/ {{$pack->number_of_days}}</span></h5>
                        @endif
                        @endif
                        @if($pack->no_of_listing!=-1)
                        <p>{{$pack->no_of_listing}} Listing available</p>
                        @else
                        <p>Ultimate Listing available</p>
                        @endif

                        @if($pack->no_of_photos!=-1)
                        <p>{{$pack->no_of_listing}} Photos available</p>
                        @else
                        <p>Ultimate Photos available</p>
                        @endif

                        @if($pack->no_of_video!=-1)
                        <p>{{$pack->no_of_video}} Videos available</p>
                        @else
                        <p>Ultimate Videos available</p>
                        @endif

                        @if($pack->no_of_amentities!=-1)
                        <p>{{$pack->no_of_amentities}} Listing available</p>
                        @else
                        <p>Ultimate amentity available</p>
                        @endif

                        @if($pack->no_of_featured_listing!=-1)
                        <p>{{$pack->no_of_featured_listing}} featured Listing available</p>
                        @else
                        <p>Ultimate featured Listing available</p>
                        @endif
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
                        <form method="post" action="{{route('user.order.payment',$pack->id)}}" enctype="multipart/form-data">
                            @csrf
                            @if($pack->price==0)
                            <input type="text" name="transaction_id" placeholder="enter the Transaction Id" value="default" readonly="true">
                            @else
                            <input type="text" name="transaction_id" placeholder="enter the Transaction Id">
                            @endif
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
@endsection