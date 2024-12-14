<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
    <form method="post" action="{{route('admin.setting.create')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Name</label>
            <input type="text" class="form-control" id="inputEmail4" name="name" value="{{$settings['name']}}">
            @if($errors->has('name'))
            <p class="text-danger text-small">$errors->get('name')</p>
            @endif
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Email</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$settings['email']}}">
            @if($errors->has('email'))
            <p class="text-danger text-small">$errors->get('name')</p>
            @endif
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Phone</label>
            <input type="text" class="form-control" id="inputEmail4" name="phone" value="{{$settings['phone']}}">
            @if($errors->has('phone'))
            <p class="text-danger text-small">$errors->get('name')</p>
            @endif
        </div>
        <div class="col-md-6 my-3">
            <label for="inputPassword4" class="form-label">Default Country</label><br>
            <select class="form-control" id="country" aria-label="Default select example" name="country" onchange="setCurrency(<?php echo htmlspecialchars(json_encode(config('country.country-currency'))); ?>)" select2>
                <option selected>Open this select menu</option>
                @foreach(config('country.country-currency') as $key=>$value)
                <option value="{{$value}}" <?php echo $settings['country'] === $value ? 'selected' : '' ?>>{{$value}}({{$key}})</option>
                @endforeach
            </select>
            @if($errors->has('country'))
            <p class="text-danger text-small">$errors->get('show_at_home')</p>
            @endif
        </div>
        <div class="col-md-12 my-3">
            <label for="inputEmail4" class="form-label">Site Currency</label>
            <input type="text" class="form-control" id="currency" name="currency" readonly="true" value="{{$settings['currency']}}" />
        </div>
        <div class="col-md-6 my-3">
            <label for="inputEmail4" class="form-label">Site Icon</label>
            <input type="text" class="form-control" id="inputEmail4" name="icon" value="{{$settings['icon']}}">
            @if($errors->has('icon'))
            <p class="text-danger text-small">$errors->get('name')</p>
            @endif
        </div>
        <div class="col-md-6 my-3">
            <label for="inputEmail4" class="form-label">Site Currency Postion</label>
            <select class="form-control" aria-label="Default select example" name="position">
                <option>Open this select menu</option>
                <option value="left" <?php echo $settings['position'] === "left" ? 'selected' : '' ?>>Left</option>
                <option value="right" <?php echo $settings['position'] === "right" ? 'selected' : '' ?>>Right</option>
            </select>
            @if($errors->has('position'))
            <p class="text-danger text-small">$errors->get('name')</p>
            @endif
        </div>
        <div class="col-md-6 my-3">
            <input type="submit" class="btn btn-primary" name="btn" value="update">

        </div>
    </form>
</div>