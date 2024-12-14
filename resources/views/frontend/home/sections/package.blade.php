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
                            <h4>{{$pack->name}}</h4>
                            <h5>Rs{{$pack->price}} <span>/ {{$pack->number_of_days}}</span></h5>
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

                            <a href="{{route('user.listing.packages.checkout',$pack->id)}}">Check out</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>