<section id="wsus__category_slider">
    <div class="container">
        <div class="wsus__category_slider_area">
            <div class="row category_slider">
                @foreach($categories as $category)
                <div class="col-xl-2">
                    <a href="{{route('user.listing.list_cat',$category->slug)}}" class="wsus__category_single_slider">
                        <span>
                            <img src="{{asset($category->icon_image)}}" alt="category" class="img-fluid w-100">
                        </span>
                        <p>{{$category->name}}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>