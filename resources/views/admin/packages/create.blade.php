@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
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
                    <form method="post" action="{{route('admin.package.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Package Type</label><br>
                                <select class="form-control" id="type" aria-label="Default select example" name="type" onchange="setPriceFree()">
                                    <option selected>Open this select menu</option>
                                    <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @if($errors->has('type'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Name Of Pack</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name">
                                @if($errors->has('name'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number Of Days</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_days">
                                @if($errors->has('no_of_days'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number of Listings</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_list">
                                @if($errors->has('no_of_list'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number of photos</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_photo">
                                @if($errors->has('no_of_photo'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number Of amenity</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_amenity">
                                @if($errors->has('no_of_amenity'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Name Of Videos</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_video">
                                @if($errors->has('no_of_video'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Price Of Package</label>
                                <div id="priceOfPack">
                                    <input type="text" class="form-control" id="inputEmail4" name="price">
                                </div>
                                @if($errors->has('price'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">No Of Featured Listing</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_featured_list">
                                @if($errors->has('no_featured_list'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Show At Home</label><br>
                                <select class="form-control" aria-label="Default select example" name="show_at_home">
                                    <option selected>Open this select menu</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                @if($errors->has('show_at_home'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Status</label><br>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <!-- <button type="submit" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->
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
    function setPriceFree() {
        let type = document.getElementById('type').value;
        let priceHtml='';
        if (type == "free") {
            priceHtml = document.getElementById('priceOfPack');
            priceHtml.innerHTML = '<input type="text" class="form-control" id="inputEmail4" name="price" value="0" readonly="true">'
        } else {
            priceHtml = document.getElementById('priceOfPack');
            priceHtml.innerHTML = '<input type="text" class="form-control" id="inputEmail4" name="price" >'
        }
        console.log(priceHtml);
    }
</script>

@endpush