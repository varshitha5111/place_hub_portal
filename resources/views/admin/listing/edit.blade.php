@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Listing</h1>
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
                    update list
                </div>
                <div>
                    @if(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                    @endif
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.listing.edit_submit',$listing->slug)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                        <input type="hidden" name="oldImg" value="{{$listing->image}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ThumbNail Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="image-preview-2" class="image-preview">
                                        <label for="image-upload" id="image-label-2">Choose File</label>
                                        <input type="file" name="thumb_img" id="image-upload-2" />
                                        <input type="hidden" name="oldImg" value="{{$listing->thumbnail_image}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">title</label>
                                <input type="text" class="form-control" id="inputEmail4" name="title" value="{{$listing->title}}">
                                @if($errors->has('title'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Category</label><br>
                                <select class="form-control" aria-label="Default select example" name="category">
                                    <option selected>Open this select menu</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" <?php
                                                                        echo $listing->category_id === $category->id ? 'selected' : '' ?>>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Location</label><br>
                                <select class="form-control" aria-label="Default select example" name="location">
                                    <option selected>Open this select menu</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}" <?php echo $listing->location_id === $location->id ? 'selected' : '' ?>>{{$location->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('location'))
                                <p class="text-danger text-small">$errors->get('loaction')</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">address</label>
                                <textarea class="form-control" id="inputEmail4" name="address">{{$listing->address}}</textarea>
                                @if($errors->has('address'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Phone</label><br>
                                <input type="text" class="form-control" name="phone" value="{{$listing->phone}}">
                                @if($errors->has('phone'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">email</label><br>
                                <input type="email" class="form-control" name="email" value="{{$listing->email}}">
                                @if($errors->has('email'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">website</label><br>
                                <input type="text" class="form-control" name="website" value="{{$listing->website}}">
                                @if($errors->has('website'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">facebook link</label><br>
                                <input type="text" class="form-control" name="fb" value="{{$listing->fb}}">
                                @if($errors->has('fb'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">X-Link</label><br>
                                <input type="text" class="form-control" name="x" value="{{$listing->x_link}}">
                                @if($errors->has('x'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">Linkden Link</label><br>
                                <input type="text" class="form-control" name="linkden" value="{{$listing->linkden}}">
                                @if($errors->has('linkden'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-6 my-3">
                                <label for="inputPassword4" class="form-label">whatsapp</label><br>
                                <input type="text" class="form-control" name="whatsapp" value="{{$listing->whatsapp}}">
                                @if($errors->has('whatsapp'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Amenities</label><br>
                                @foreach($amentities as $amentity)
                                <div class="form-check form-check-inline">
                                    <div class="btn btn-warning my-1">
                                        <input class="form-check-input mx-1" type="checkbox" id=<?php echo 'inlineCheckbox' . $i; ?> name="amentity[]" value="{{$amentity->id}}" <?php echo ($amentity_list->contains('amentity_id',$amentity->id))?'checked':''?>>
                                        <label class=<?php echo 'form-check-label' . $i; ?> for=<?php echo 'inlineCheckbox' . $i; ?>><i class="{{$amentity->icon}}" style="color:black;"></i>{{$amentity->name}}</label>
                                    </div>
                                </div>
                                <?php $i++ ?>
                                @endforeach
                                <input type="hidden" value=<?php echo $i - 1 ?> name="no_amentity">
                                @if($errors->has('amentity[]'))
                                <p class="text-danger text-small">amentity is required</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Description</label><br>
                                <textarea class="summernote" name="description">{{$listing->description}}</textarea>
                                @if($errors->has('description'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Attachment</label>
                                    <input class="form-control" type="file" id="formFileMultiple" name="file" value="{{$listing->file}}" multiple>
                                </div>
                            </div>
                            @if($errors->has('file'))
                            <p class="text-danger text-small">$errors->get('show_at_home')</p>
                            @endif
                            <div class="col-md-12 my-3">
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">google map</label>
                                    <input class="form-control" type="text" id="" name="google_map" value="{{$listing->google_map_embed_code}}">
                                </div>
                            </div>
                            @if($errors->has('google_map'))
                            <p class="text-danger text-small">$errors->get('show_at_home')</p>
                            @endif
                            <div class="col-md-12 my-3">
                                <label for="inputEmail4" class="form-label">seo_title</label>
                                <input type="text" class="form-control" id="inputEmail4" name="seo_title" value="{{$listing->seo_title}}">
                                @if($errors->has('seo_title'))
                                <p class="text-danger text-small">$errors->get('name')</p>
                                @endif
                            </div>
                            <div class="col-md-12 my-3">
                                <label for="inputPassword4" class="form-label">Seo Description</label><br>
                                <textarea class="summernote" name="seo_description">{{$listing->seo_description}}</textarea>
                                @if($errors->has('seo_description'))
                                <p class="text-danger text-small">$errors->get('show_at_home')</p>
                                @endif
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="inputPassword4" class="form-label">Status</label><br>
                                <select class="form-control " aria-label="Default select example" name="status">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php echo $listing->status === 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo $listing->status === 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="inputPassword4" class="form-label">is_verified</label><br>
                                <select class="form-control " aria-label="Default select example" name="is_verified">
                                    <option selected>Open this select menu</option>
                                    <option value="1" <?php echo $listing->is_verified === 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo $listing->is_verified === 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                                @if($errors->has('is_verified'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-md-4 my-3">
                                <label for="inputPassword4" class="form-label">is_featured</label><br>
                                <select class="form-control " aria-label="Default select example" name="is_featured">
                                    <option>Open this select menu</option>
                                    <option value="1" <?php echo $listing->is_featured === 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo $listing->is_featured === 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                                @if($errors->has('is_featured'))
                                <p class="text-danger text-small">$errors->get('status')</p>
                                @endif
                            </div>
                            <div class="col-12 my-2">
                                <button type="submit" class="btn btn-primary">edit</button>
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