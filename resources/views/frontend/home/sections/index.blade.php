@extends('frontend.layout.master')

@section('contents')
<!--==========================
        BANNER PART START
    ===========================-->
@include('frontend.home.sections.banner')
<!--==========================
        BANNER PART END
    ===========================-->


<!--==========================
        CATEGORY SLIDER START
    ===========================-->
@include('frontend.home.sections.category')
<!--==========================
        CATEGORY SLIDER END
    ===========================-->


<!--==========================
        FEATURES PART START
    ===========================-->
@include('frontend.home.sections.features')
<!--==========================
        FEATURES PART END
    ===========================-->


<!--==========================
        COUNTER PART START
    ===========================-->
@include('frontend.home.sections.counter')
<!--==========================
        COUNTER PART END
    ===========================-->


<!--==========================
        OUR CATEGORY START
    ===========================-->
@include('frontend.home.sections.our_category')
<!--==========================
        OUR CATEGORY END
    ===========================-->


<!--==========================
        OUR LOCATION START
    ===========================-->
@include('frontend.home.sections.location')
<!--==========================
        OUR LOCATION END
    ===========================-->


<!--==========================
        FEATURED LISTING START 
    ===========================-->
@include('frontend.home.sections.feature_listing')
<!--==========================
        FEATURED LISTING END
    ===========================-->


<!--==========================
        OUR PACKAGE START
    ===========================-->
@include('frontend.home.sections.package')
<!--==========================
        OUR PACKAGE END
    ===========================-->


<!--============================
        TESTIMONIAL PART START
    ==============================-->
@include('frontend.home.sections.testimonial')
<!--============================
        TESTIMONIAL PART END
    ==============================-->


<!--==========================
        BLOG PART START
    ===========================-->
@include('frontend.home.sections.blog')
<!--==========================
        BLOG PART END
    ===========================-->


@endsection
@push('scripts')

<script>
    function model_fun($list) {
        var modal = document.getElementById('modal-body-inside');
        var s = "";
        s = $list['slug'];
        modal.innerHTML = '<div class="row">' +
            '<div class="col-12 col-xl-12 col-md-12">' +
            '<div class="map_popup_content">' +
            '<div class="img">' +
            '<img src="' + $list['image'] + '" alt="images" class="img-fluid w-100">' +
            '</div>' +
            '<div class="map_popup_text">' +
            '<span><i class="far fa-star"></i> Featured</span>' +
            '<span class="red"><i class="far fa-check"></i> verified</span>' +
            '<h5>' + $list['title'] + '</h5>' +
            '<a class="call" href="callto:+69552200325444"><i class="fal fa-phone-alt"></i>' +
            $list['phone'] + '</a>' +
            '<a class="mail" href="mailto:example@gmail.com"><i class="fal fa-envelope"></i>' +
            $list['email'] + '</a>' +
            '<p>' + $list['description'] + '</p>' +
            '</div>' +
            '</div>' +
            '</div>'
    }
</script>

@endpush