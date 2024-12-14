@extends('frontend.layout.master')

@section('contents')

<!--==========================
        BREADCRUMB PART START
    ===========================-->
<div id="breadcrumb_part">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>listing</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('frontend.index')}}"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> listing </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==========================
        BREADCRUMB PART END
    ===========================-->


<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our pricing </h2>
                    </div>
                </div>
            </div>
            <div class="procing_area">
                <div class="row">
                    @foreach($packages as $pack)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="member_price">
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

                            <a href="{{route('user.listing.packages.checkout',$pack->id)}}">Check Out</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection