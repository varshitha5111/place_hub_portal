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
                                    <h3>Listing Details</h3>
                                </div>
                                @if($createAccess==true)
                                <div class="float-end">
                                    <a href="{{route('user.agent-listing.create')}}" class="btn btn-danger btn-sm rounded">Create</a>
                                </div>
                                @else
                                <!-- Button trigger modal -->
                                <div class="float-end">
                                    <button type="button" class="btn btn-danger btn-primary" data-bs-toggle="modal" data-bs-target="#accessDenied">
                                        Create
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="accessDenied" tabindex="-1" aria-labelledby="accessDeniedLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="accessDeniedLabel">Message</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h3><code>You Have Created Maximum Listing!!</code></h3>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
<script>
    function createAccessMessage() {
        console.log("hii");
    }
</script>

@endpush