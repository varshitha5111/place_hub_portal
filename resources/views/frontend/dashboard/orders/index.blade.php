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
                                    <h3>Order Details</h3>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card-body">
                            {{$dataTable->table()}}
                        </div>
                    </div>
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