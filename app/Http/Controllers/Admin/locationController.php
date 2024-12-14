<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\locationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\locationStoreRequest;
use App\Http\Requests\Admin\locationUpdateRequest;
use App\Http\Requests\categoryUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\location;
use App\Traits\uploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class locationController extends Controller
{
    use uploadImage;
    public function index(locationDataTable $dataTable)
    {
        return $dataTable->render('admin.location.index');
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(locationStoreRequest $r)
    {
        $location = new location();
        $this->saveChanges($location, $r);
        $location->slug = password_hash($r->name, PASSWORD_DEFAULT);
        $location->save();
        return redirect()->route('admin.location');
    }

    public function edit($slug)
    {
        $location = new location();
        $location = $location->where('slug', $slug)->first();
        return view('admin.location.edit', compact('location'));
    }

    public function change($slug, locationUpdateRequest $r)
    {
        $location = new location();
        $location = $location->where('slug', $slug)->first();
        $this->saveChanges($location, $r);
        $location->save();
        return redirect()->route('admin.location');
    }

    public function saveChanges($location, $r)
    {
        $location->name = $r->name;
        $location->show_at_home = $r->show_at_home;
        $location->status = $r->status;
    }

}
