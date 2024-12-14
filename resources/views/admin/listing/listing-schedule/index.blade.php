@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.listing')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>All Listing</h1>
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
                <div class="clear-fix">
                    <div class="float-start">
                        <div class="card-header">
                            <h3 style="font-weight: bold;">Image-gallery-of-list:{{$listing->title}}</h3>
                        </div>
                    </div>
                    <div class="float-end">
                        <div class="card-header">
                            <a href="{{route('admin.listing.schedule.create',$list_id)}}" class="btn btn-primary">
                                + create
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    $('#myForm').on('submit', function(ev) {
        console.log("hello");
        $('#del_cat').modal('show');


        var data = $(this).serializeObject();
        json_data = JSON.stringify(data);
        $("#results").text(json_data);
        $(".modal-body").text(json_data);

        // $("#results").text(data);

        ev.preventDefault();
    });
</script>

@endpush