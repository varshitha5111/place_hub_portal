@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <h1>Update Hero</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Hero</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Create Category
                </div>
                <div>
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">icon image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="icon" id="image-upload" />
                                        <input type="hidden" name="icon" value>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">background image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-2" class="image-preview">
                                        <label for="image-upload" id="image-label-2">Choose File</label>
                                        <input type="file" name="bg_img" id="image-upload-2" />
                                        <input type="hidden" name="bg_img" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="">
                                @if($errors->has('name'))
                                <p class="text-danger text-small">Title of the category required</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Show At Home</label><br>
                                <select class="form-control " aria-label="Default select example" name="show_at_home">
                                    <option selected value="0">Open this select menu</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @if($errors->has('show_at_home'))
                                <p class="text-danger text-small">required</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">status</label><br>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected value="0">Open this select menu</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                <p class="text-danger text-small">required</p>
                                @endif
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')

<script>
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
    $.uploadPreview({
        input_field: "#image-upload-2", // Default: .image-upload
        preview_box: "#image-preview-2", // Default: .image-preview
        label_field: "#image-label-2", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>

@endpush