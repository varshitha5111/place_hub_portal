@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Video Gallery</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Hero</div>
        </div>
    </div>
    <!-- <div class="toast-container position-fixed top-0 right-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Create Video Gallery :
                </div>
                <div>
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.listing-video-gallery.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-contol">Video Gallery</label>
                                <input type="text" class="form-control" name="video">
                                <input type="hidden" value="{{request()->list_id}}" name="list_id">
                                @if($errors->has('video'))
                                <p class="text-danger">required and input must be a url</p>
                                @endif
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <input type="submit" name="upload" value="upload" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div><br><br>

            </div>
        </div>
        <div class=" col-12 my-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Video_Image</th>
                        <th scope="col">Video_url</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videoGallery as $video)
                    <tr class="my-2">
                        <th scope="row">{{$video->id}}</th>
                        <td><img src="{{getYtThumbnail($video->video)}}" width="80"></td>
                        <td><a target="_blank" href="{{$video->video}}" class="btn btn-link">{{$video->video}}</a></td>
                        <td>
                            <button type="submit" class="btn btn-danger" value="delete">delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection