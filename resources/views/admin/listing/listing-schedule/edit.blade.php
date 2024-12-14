@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Schedule</h1>
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
                    Edit schedule
                </div>
                <div>
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.listing.schedule.change',[$schedule->list_id,$schedule->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">Day</label>
                                <select class="form-control " aria-label="Default select example" name="days" disabled>
                                    <option selected value="0">Choose a Day</option>
                                    @foreach(config('list-schedule.day') as $d)
                                    <option value="{{$d}}" <?php echo $d===$schedule->day?'selected':''; ?>>{{$d}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('days'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="appt">Select a Start time:</label>
                                    <input type="time" id="appt" name="start" value="{{$schedule->start}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="appt">Select a End time:</label>
                                    <input type="time" id="appt" name="end" value="{{$schedule->end}}">
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">status</label>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected value="0">Choose</option>
                                    <option value="0" <?php echo $schedule->status===0?'selected':''; ?>>Inactive</option>
                                    <option value="1" <?php echo $schedule->status===1?'selected':''; ?>>Active</option>
                                </select>
                                @if($errors->has('status'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
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