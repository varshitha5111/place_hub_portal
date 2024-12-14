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
                                    <h2>Update Listing</h2>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card-body">
                            <form method="post" action="{{route('user.listing.schedule.change',[$schedule->list_id,$schedule->id])}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 my-3">
                                        <label for="inputEmail4" class="form-label">Day</label>
                                        <select class="form-control " aria-label="Default select example" name="days" disabled>
                                            <option selected value="0">Choose a Day</option>
                                            @foreach(config('list-schedule.day') as $d)
                                            <option value="{{$d}}" <?php echo $d === $schedule->day ? 'selected' : ''; ?>>{{$d}}</option>
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
                                            <option value="0" <?php echo $schedule->status === 0 ? 'selected' : ''; ?>>Inactive</option>
                                            <option value="1" <?php echo $schedule->status === 1 ? 'selected' : ''; ?>>Active</option>
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