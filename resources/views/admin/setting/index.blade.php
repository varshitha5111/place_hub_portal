@extends('admin.layout.master')

@section('contents')

<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Setting</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Update Profile</div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>2 Column</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">General setting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        @include('admin.setting.general-setting')
                        @include('admin.setting.pusher-setting')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function setCurrency(country)
    {
        let v=document.getElementById('country').value;
        let $key=Object.keys(country).find(key=>country[key]===v);
        document.getElementById('currency').value=$key;
    }
</script>
@endpush
    
