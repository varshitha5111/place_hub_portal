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
                    <form method="post" action="{{route('admin.package.update',$packs->id)}}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Package Type</label><br>
                                <select class="form-control" id="type" aria-label="Default select example" name="type" onchange="setPriceFree()">
                                    <option selected>Open this select menu</option>
                                    <option value="free" <?php echo $packs->type==='free'?'selected':''; ?>>Free</option>
                                    <option value="paid" <?php echo $packs->type==='paid'?'selected':''; ?>>Paid</option>
                                </select>
                                @if($errors->has('type'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Name Of Pack</label>
                                <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$packs->name}}">
                                @if($errors->has('no_of_pack'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number Of Days</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_days" value="{{$packs->number_of_days}}">
                                @if($errors->has('no_of_days'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number of Listings</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_list" value="{{$packs->no_of_listing}}">
                                @if($errors->has('no_of_list'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number of photos</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_photo" value="{{$packs->no_of_photos}}">
                                @if($errors->has('no_of_photo'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Number Of amenity</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_amenity" value="{{$packs->no_of_amentities}}">
                                @if($errors->has('no_of_amenity'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Name Of Videos</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_of_video" value="{{$packs->no_of_video}}">
                                @if($errors->has('no_of_video'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">Price Of Package</label>
                                <div id="price">
                                    <input type="text" class="form-control" id="inputEmail4" name="price" value="{{$packs->price}}" <?php echo $packs->type==='free'?'disabled':''; ?>>
                                </div>
                                @if($errors->has('price'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputEmail4" class="form-label">No Of Featured Listing</label>
                                <input type="text" class="form-control" id="inputEmail4" name="no_featured_list" value="{{$packs->no_of_featured_listing}}">
                                @if($errors->has('no_featured_list'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Show At Home</label><br>
                                <select class="form-control" aria-label="Default select example" name="show_at_home">
                                    <option selected>Open this select menu</option>
                                    <option value="0" <?php echo $packs->show_at_home===0?'selected':''?>>Inactive</option>
                                    <option value="1" <?php echo $packs->show_at_home===1?'selected':''?>>Active</option>
                                </select>
                                @if($errors->has('show_at_home'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Status</label><br>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php echo $packs->status===1?'selected':''?>>Active</option>
                                    <option value="0" <?php echo $packs->status===0?'selected':''?>>Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">Upadte</button>
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
        if (type == "free") {
            let priceHtml = document.getElementById('price');
            priceHtml.innerHTML = '<input type="text" id="price" class="form-control" id="inputEmail4" name="price" value="0" disabled>'
        } else {
            let priceHtml = document.getElementById('price');
            priceHtml.innerHTML = '<input type="text" id="price" class="form-control" id="inputEmail4" name="price" >'
        }
    }
</script>

@endpush