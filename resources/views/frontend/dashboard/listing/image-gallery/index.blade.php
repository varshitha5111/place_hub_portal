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
                                    <h2>Create Image Gallery Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div>
                            @if(Session::has('error'))
                            <p class="alert alert-danger">{{Session::get('error')}}</p>
                            @endif
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('user.listing-image-gallery.store')}}" enctype="multipart/form-data">
                                @csrf

                                <label class="form-contol">Image Gallery</label>
                                @if($noOfImg==-1)
                                <div id="file-part">
                                    <input type="file" class="form-control" id="no_of_files" name="img[]"  multiple>
                                </div>
                                @else
                                <div id="file-part">
                                    <input type="file" class="form-control" id="no_of_files" name="img[]" onchange="checkImg(<?php echo $noOfImg ?>)" multiple>
                                </div>
                                @endif
                                <input type="hidden" value="{{request()->list_id}}" name="list_id">
                                <br>
                                <button type="submit" name="upload" value="upload" class="btn btn-danger btn-sm">upload</button>
                            </form>
                        </div><br><br>
                        <div class=" col-12 my-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Images</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($imageGallery as $img)
                                    <tr class="my-2">
                                        <th scope="row">{{$img->id}}</th>
                                        <td><img src="{{asset($img->image)}}" style="width:80px !important;"></td>
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
    </div>
</section>

@endsection

@push('scripts')
<script>
    function checkImg($maxImg) {
        let fileIp = document.getElementById('no_of_files');
        let htmltag = document.getElementById('file-part');
        let selectedFiles = fileIp.files;
        if ($maxImg < selectedFiles.length) {
            alert('maximum images uploaded');
            htmltag.innerHTML = '<input type="file" class="form-control" id="no_of_files" name="img[]" onchange="checkImg('+$maxImg+')" multiple>'
        }

    }
</script>

@endpush