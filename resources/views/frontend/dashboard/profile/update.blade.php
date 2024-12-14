@extends('frontend.layout.master')

@section('contents')
<section id="dashboard">
    <div class="container">
        <div class="row">
            @include('frontend.dashboard.sidebar')
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing">

                        <h4>basic information</h4>
                        <form method="post" action="{{route('user.edit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-8 col-md-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="my_listing_single">
                                                <label>Name</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="Name" name="name" value="{{auth()->user()->name}}">
                                                    @if($errors->has('name'))
                                                    <p class="text-danger text-small">Name is required</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="my_listing_single">
                                                <label>phone</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="1234" name="phone" value="{{auth()->user()->phone}}">
                                                    @if($errors->has('phone'))
                                                    <p class="text-danger text-small">Phone Number is required</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="my_listing_single">
                                                <label>email</label>
                                                <div class="input_area">
                                                    <input type="Email" placeholder="Email" name="email" value="{{auth()->user()->email}}">
                                                    @if($errors->has('email'))
                                                    <p class="text-danger text-small">Email is required</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="my_listing_single">
                                                <label>Address</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="address" name="address" value="{{auth()->user()->address}}">
                                                    @if($errors->has('address'))
                                                    <p class="text-danger text-small">Address is required</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="my_listing_single">
                                                <label>About Me</label>
                                                <div class="input_area">
                                                    <textarea cols="3" rows="3" name="about" placeholder="Your Text">{{auth()->user()->about}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-5">
                                    <div class="profile_pic_upload">
                                        <img src="{{auth()->user()->avatar}}" alt="img" class="imf-fluid w-100">
                                        <input type="file" name="avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8 col-md-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6">

                                            <div class="my_listing_single">
                                                <label>Website Link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="website" name="website" value="{{auth()->user()->website}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">

                                            <div class="my_listing_single">
                                                <label>FaceBook Link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="facebook" name="fb" value="{{auth()->user()->fb}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">

                                            <div class="my_listing_single">
                                                <label>insta Link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="website" name="insta" value="{{auth()->user()->insta}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 col-md-6">
                                            <div class="my_listing_single">
                                                <label>Linkden Link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="linkden" name="linkden" value="{{auth()->user()->linkden}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="my_listing_single">
                                                <label>X Link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="x link" name="twitter" value="{{auth()->user()->twitter}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="my_listing_single">
                                                <label>whatsaap link</label>
                                                <div class="input_area">
                                                    <input type="text" placeholder="whatsapp link" name="whatsapp" value="{{auth()->user()->whatsapp}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-5">
                                    <div class="profile_pic_upload">
                                        <img src="{{auth()->user()->banner}}" alt="img" class="imf-fluid w-100">
                                        <input type="file" name="banner">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="read_btn">upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="my_listing list_mar">
                        <h4>change password</h4>
                        <form method="post" action="{{route('user.update.password')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-4 col-md-6">
                                    <div class="my_listing_single">
                                        <label>current password</label>
                                        <div class="input_area">
                                            <input type="password" placeholder="Current Password" name="oldPass">
                                            @if(Session::has('wrng_oldPass'))
                                            <p class="text-danger text-small">{{Session::get('wrng_oldPass')}}</p>
                                            @endif
                                            @if($errors->has('oldPass'))
                                            <p class="text-danger text-small">Password is required</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="my_listing_single">
                                        <label>new password</label>
                                        <div class="input_area">
                                            <input type="password" placeholder="New Password" name="newPass">
                                            @if($errors->has('newPass'))
                                            <p class="text-danger text-small">required</p>
                                            @endif
                                            @if(Session::has('wrng_confirm'))
                                            <p class="text-danger text-small">{{Session::get('wrng_confirm')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="my_listing_single">
                                        <label>confirm password</label>
                                        <div class="input_area">
                                            <input type="password" placeholder="Confirm Password" name="confirmPass">
                                            @if($errors->has('confirmPass'))
                                            <p class="text-danger text-small">Confirm Password is required</p>
                                            @endif
                                            @if(Session::has('wrng_confirm'))
                                            <p class="text-danger text-small">{{Session::get('wrng_confirm')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="read_btn">upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection