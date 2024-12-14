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
                    <h4>{{$listing->title}}</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> listing details </li>
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


<!--==========================
        LISTING DETAILS START
    ===========================-->
<section id="listing_details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="listing_details_text">
                    <div class="listing_det_header">
                        <div class="listing_det_header_img">
                            <img src="{{asset($listing->user->avatar)}}" alt="logo" class="img-fluid w-100">
                        </div>
                        <div class="listing_det_header_text">
                            <h6>{{$listing->title}}</h6>
                            <p class="host_name">Hosted by <a href="agent_public_profile.html">{{$listing->user->name}}</a></p>
                            <p class="rating">
                                <?php $i = 0; ?>
                                @while($i<round($listing->reviews_avg_rating,1))
                                    <i class="fas fa-star"></i>
                                    <?php $i++; ?>
                                    @endwhile
                                    <b>{{round($listing->reviews_avg_rating,1)}}</b>
                                    <span>({{count($reviews)}} review)</span>
                            </p>
                            <ul>
                                <li><a href="#"><i class="fas fa-check"></i> Verified</a></li>
                                <li><a href="#"><i class="fas fa-heart"></i> Add to Favorite</a></li>
                                <li><a href="#"><i class="fas fa-eye"></i> {{$listing->views}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="listing_det_text">
                        <p>{{!!$listing->description!!}}

                            <span>{{!!$listing->seo_description!!}}</span>
                        </p>
                    </div>
                    <!-- Amentities image gallery -->
                    <div class="listing_det_Photo">
                        <div class="row">
                            @foreach ($listing->imageGallery as $images)
                            <div class="col-xl-3 col-sm-6">
                                <a class="venobox" data-gall="gallery01" href="{{asset($images->image)}}">
                                    <img src="{{asset($images->image)}}" alt="gallery1" class="img-fluid w-100">
                                    <div class="photo_overlay">
                                        <i class="fal fa-plus"></i>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Amentities display -->
                    <div class="listing_det_feature">
                        <div class="row">
                            @foreach($listing->amentities as $amentity)
                            <div class="col-xl-4 col-sm-6">
                                <div class="listing_det_feature_single">
                                    <i class="{{$amentity->amentity->icon}}"></i>
                                    <span>{{$amentity->amentity->name}}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="listing_det_video">
                        <div class="row">
                            @foreach($listing->videoGallery as $video)
                            <div class="col-xl-4 col-sm-6">
                                <div class="listing_det_video_img">
                                    <img src="{{getYtThumbnail($video->video)}}" alt="img" class="img-fluid w-100">
                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{$video->video}}">
                                        <i class=" fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="listing_det_location">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.678639283793!2d90.39695083611213!3d23.794774936848686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70c15ea1de1%3A0x97856381e88fb311!2z4Kas4Kao4Ka-4Kao4KeAIOCmruCmoeCnh-CmsiDgpp_gpr7gpongpqgsIOCmouCmvuCmleCmvg!5e0!3m2!1sbn!2sbd!4v1634550875957!5m2!1sbn!2sbd" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div> -->
                    <div class="wsus__listing_review">
                        <h4>reviews {{count($reviews)}}</h4>
                        @foreach ($reviews as $review)
                        <div class="wsus__single_comment">
                            <div class="wsus__single_comment_img">
                                <img src="{{asset($review->users->avatar)}}" alt="comment" class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_comment_text">
                                <h5>{{$review->users->name}}<span>
                                        <?php $i = 0; ?>
                                        @while($i<$review->rating)
                                            <i class="fas fa-star"></i>
                                            <?php $i++; ?>
                                            @endwhile
                                    </span></h5>
                                <span>{{$review->created_at}}</span>
                                <p>{{$review->review}}</p>
                            </div>
                        </div>
                        @endforeach
                        @if($reviews->hasPages())
                        {{$reviews->links()}}
                        @endif

                        @auth
                        @if(Session::has('revError'))
                        <p class="alert alert-danger">{{Session::get('revError')}}</p>
                        @endif
                        @if($listing->user_id!=auth()->user()->id)
                        <form method="post" action="{{route('user.listing.review')}}" enctype="multipart/form-data" class="input_comment">
                            @csrf
                            <h5>add a review</h5>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__select_rating">
                                        <i class="fas fa-star"></i>
                                        <select class="select_2" name="rating" required>
                                            <option value="">select rating</option>
                                            <option value="1"> 1 </option>
                                            <option value="2"> 2 </option>
                                            <option value="3"> 3 </option>
                                            <option value="4"> 4 </option>
                                            <option value="5"> 5 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="blog_single_input">
                                        <input type="hidden" name="list_id" value="{{$listing->id}}">
                                        <textarea cols="3" rows="5" placeholder="Comment" name="comment" required></textarea>
                                        <button type="submit" class="read_btn">submit review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                        @endauth
                        @guest
                        <div class="alert alert-danger ">
                            <p class="fw-bold">Please <a href="{{route('login')}}">Login</a> To Add A Review</p>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="listing_details_sidebar">
                    <div class="row">
                        <div class="col-12">
                            <div class="listing_det_side_address">
                                <a href="callto:+96544444222221100"><i class="fal fa-phone-alt"></i>
                                    {{$listing->phone}}</a>
                                <a href="mailto:example@gmail.com"><i class="fal fa-envelope"></i>
                                    {{$listing->email}}</a>
                                <p><i class="fal fa-map-marker-alt"></i>{{$listing->location->name}}</p>
                                @if($listing->website)
                                <p><i class="fal fa-globe"></i>{{$listing->website}}</p>
                                @endif
                                <ul>
                                    <li><a href="{$listing->fb}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$listing->x_link}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$listing->linkden}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$listing->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @if(count($listing->schedule)>0)
                        <div class="col-12">
                            <div class="listing_det_side_open_hour">
                                <h5>Opening Hours</h5>
                                @foreach($listing->schedule as $schedule)
                                <p>{{$schedule->day}} <span>{{$schedule->start}} - {{$schedule->end}}</span></p>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @auth
                        @if(auth()->user()->id!=$listing->user_id)
                        <div class="col-12">
                            <div class="listing_det_side_contact">
                                <h5>Send Message</h5>
                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Send Message</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{route('user.message.send')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="hidden" name="reciever_id" value="{{$listing->user_id}}">
                                                        <input type="hidden" name="list_id" value="{{$listing->id}}">
                                                        <label for="message-text" class="col-form-label">Message:</label>
                                                        <textarea class="form-control" id="message-text" rows="5" name="msg" required></textarea>
                                                    </div>
                                                    <button type="submit" class="btn">Send</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Send</button>
                                @if(Session::has('sentSuccess'))
                                <div class="my-2 alert alert-success"><a href="{{route('user.message.index')}}" class="btn btn-link">Click Here</a> To Go For Inbox</div>
                                @endif
                            </div>

                        </div>
                        @endif
                        @endauth
                        <div class="col-12">
                            <div class="listing_det_side_list">
                                <h5>Similar Listing</h5>
                                @if($similarListings)
                                @foreach($similarListings as $s_list)
                                <a href="{{route('user.listing.list_view',$s_list->slug)}}" class="sidebar_blog_single">
                                    <div class="sidebar_blog_img">
                                        <img src="{{asset($s_list->image)}}" alt="blog" class="imgofluid w-100">
                                    </div>
                                    <div class="sidebar_blog_text">
                                        <h5>{{$s_list->title}}</h5>
                                        <p> <span>{{$s_list->created_at}}</span></p>
                                    </div>
                                </a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==========================
        LISTING DETAILS END
    ===========================-->
@endsection