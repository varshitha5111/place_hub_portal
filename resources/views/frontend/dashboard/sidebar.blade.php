<div class="col-lg-3">
    <div class="dashboard_sidebar">
        <span class="close_icon"><i class="far fa-times"></i></span>
        <a href="dsahboard.html" class="dash_logo"><img src="images/user_large_img.jpg" alt="logo" class="img-fluid"></a>
        <ul class="dashboard_link">
            <li><a class="active" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
            <li><a href="{{route('user.agent-listing.index')}}"><i class="fas fa-list-ul"></i> My Listing</a></li>
            <li><a href="dsahboard_create_listing.html"><i class="fal fa-plus-circle"></i> Create Listing</a></li>
            <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
            <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
            <li><a href="{{route('user.update')}}"><i class="far fa-user"></i> My Profile</a></li>
            <li><a href="{{route('user.orders.index')}}"><i class="fal fa-notes-medical"></i> Orders</a></li>
            <li><a href="dsahboard_package.html"><i class="fal fa-gift-card"></i> Package</a></li>
            <li><a href="{{route('user.message.index')}}"><i class="far fa-comments-alt"></i> Message</a></li>
            <form method="post" action="{{route('logout')}}" enctype="multipart/form-data">
                @csrf
                <li id="logout"><button type="submit" class="btn mx-2"><i class="far fa-sign-out-alt"></i> Logo</button></li>
            </form>
        </ul>
    </div>
</div>