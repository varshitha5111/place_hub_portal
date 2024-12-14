@extends('frontend.layout.master')

@section('contents')


<section id="dashboard">
    <div class="container">
        <div class="row">
            @include('frontend.dashboard.sidebar')
            <div class="col-lg-9">
                <div class="dashboard_content">
                    <div class="my_listing">
                        <div class="card-header">
                            <div class="clear-fix">
                                <div class="float-start">
                                    <h2>Create Video Gallery Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>


                        <div>
                            @if(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('error')}}</p>
                            @endif
                        </div>

                        <form method="post" action="{{route('user.listing-video-gallery.store')}}" enctype="multipart/form-data">
                            @csrf

                            <label class="form-contol">Video Gallery</label>
                            
                            <div id="video-part">
                                <input type="text" class="form-control my-1" name="video">
                            </div>
                            <input type="hidden" value="{{request()->list_id}}" name="list_id">
                            @if($errors->has('video'))
                            <p class="text-danger">required and input must be a url</p>
                            @endif

                            @if($noOfVideo>=count($videoGallery) && $noOfVideo!=-1)
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Upload
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                           <h3><code>Maximum Video Uploaded</code></h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <button type="submit" name="upload" value="upload" class="my-1 btn btn-danger">upload</button>
                            @endif

                        </form>
                        <br><br>




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
                                    <td><img src="{{getYtThumbnail($video->video)}}" width="50"></td>
                                    <td><a target="_blank" href="{{$video->video}}" class="btn btn-link">{{truncate($video->video,50)}}</a></td>
                                    <td>
                                        <button type="submit" class="btn btn-danger" value="delete">delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
