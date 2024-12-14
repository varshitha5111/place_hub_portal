<div class="tab-pane fade show active" id="profile4" role="tabpanel" aria-labelledby="home-tab4">
    <form method="post" action="{{route('admin.setting.pusher.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Pusher App Id</label>
            <input type="text" class="form-control" id="inputEmail4" name="pusher_app_id" value="{{$settings['pusher_app_id']}}" required>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">pusher App Key</label>
            <input type="text" class="form-control" id="inputEmail4" name="pusher_app_key" value="{{$settings['pusher_app_key']}}" required>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Pusher App Secret</label>
            <input type="text" class="form-control" id="inputEmail4" name="pusher_app_secret" value="{{$settings['pusher_app_secret']}}" required>
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Pusher App Cluster</label>
            <input type="text" class="form-control" id="inputEmail4" name="pusher_app_cluster" value="{{$settings['pusher_app_cluster']}}" required>
        </div>

        <div class="col-md-6 my-3">
            <input type="submit" class="btn btn-primary" name="btn" value="update">
        </div>
    </form>
</div>