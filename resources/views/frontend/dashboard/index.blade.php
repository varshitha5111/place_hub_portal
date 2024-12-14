@extends('frontend.layout.master')

@section('contents')
<section id="dashboard">
    <div class="container">
        <div class="row">
            @include('frontend.dashboard.sidebar')
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="manage_dasboard">
                        <div class="row">
                            <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                <div class="manage_dashboard_single">
                                    <i class="far fa-star"></i>
                                    <h3>116</h3>
                                    <p>Total Reviews</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                <div class="manage_dashboard_single orange">
                                    <i class="fas fa-list-ul"></i>
                                    <h3>21</h3>
                                    <p>active listing</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                <div class="manage_dashboard_single green">
                                    <i class="far fa-heart"></i>
                                    <h3>35</h3>
                                    <p>wishlist</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                <div class="manage_dashboard_single red">
                                    <i class="fal fa-comment-alt-dots"></i>
                                    <h3>120</h3>
                                    <p>message</p>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="active_package">
                                    
                                    <h4>Active Package</h4>
                                    <div class="table-responsive">
                                        @if($subscriptions)
                                        <table class="table dashboard_table">
                                            <tbody>
                                                <tr>
                                                    <td class="active_left">Package name</td>
                                                    <td class="package_right">{{$subscriptions->packages->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Price</td>
                                                    <td class="package_right">{{$setting->currency}} {{$subscriptions->packages->price}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Purchase Date</td>
                                                    <td class="package_right">{{date('d F Y',strtotime($subscriptions->orders->purchase_date))}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Expired Date</td>
                                                    <td class="package_right">{{date('d F Y',strtotime($subscriptions->orders->purchase_date.' + '.$subscriptions->packages->number_of_days.' days'))}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Package name</td>
                                                    <td class="package_right">{{$subscriptions->packages->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Maximum Listing </td>
                                                    <td class="package_right">{{unlimitedOrNot($subscriptions->packages->no_of_listing)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Maximum Aminities</td>
                                                    <td class="package_right">{{unlimitedOrNot($subscriptions->packages->no_of_amentities)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Maximum Photo</td>
                                                    <td class="package_right">{{unlimitedOrNot($subscriptions->packages->no_of_photos)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Maximum Video</td>
                                                    <td class="package_right">{{unlimitedOrNot($subscriptions->packages->no_of_video)}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="active_left">Featured Listing Available</td>
                                                    <td class="package_right">{{unlimitedOrNot($subscriptions->packages->no_of_featured_listing)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <div class="container text-center">
                                        No Active Package <a class="btn btn-link" href="{{route('user.listing.packages')}}">Click Here</a> To Purchase A Package
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
</section>
@endsection