<section id="wsus__featured_listing">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 m-auto">
                <div class="wsus__heading_area">
                    <h2>Our Featured Listing </h2>
                    <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola estut
                        clita dolorem ei est mazim fuisset scribentur.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row listing_slider">
            @foreach($featuredListings as $l)
            <div class="col-xl-3">
                <div class="wsus__featured_single">
                    <div class="wsus__featured_single_img">
                        <img src="{{asset($l->image)}}" alt="images" class="img-fluid w-100">
                        <a href="#" class="love"><i class="fas fa-heart"></i></a>
                        <a href="#" class="small_text"></a>
                    </div>
                    <a name="lm" class="map" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="{{route('user.user.listing.listing_cat_model',$l->id)}}" onclick="model_fun(<?php echo htmlspecialchars(json_encode($l)) ?>)"><i class="fas fa-info"></i></a>
                    <div class="wsus__featured_single_text">
                        <p class="list_rating">
                            <?php $i = 0; ?>
                            @while($i<round($l->reviews_avg_rating,1))
                                <i class="fas fa-star"></i>
                                <?php $i++; ?>
                                @endwhile
                        </p>
                        <a href="{{route('user.listing.list_view',$l->slug)}}">{{truncate($l->title,10)}}</a>
                        <p class="address">{{$l->location->name}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="wsus__map_popup">
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                <div class="modal-body" id="modal-body">
                    <div id="modal-body-inside">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>