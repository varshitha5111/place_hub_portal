<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Traits\uploadImage;
use App\DataTables\amentityDataTable;
use App\Http\Requests\Admin\AmentityStoreRequest;
use App\Http\Requests\Admin\AmentityUpdateRequest;
use App\Models\amentity;

class AmentityController extends Controller
{
    use uploadImage;
    public function index(amentityDataTable $dataTable)
    {
        return $dataTable->render('admin.amentites.index');
    }

    public function create()
    {
        return view('admin.amentites.create');
    }

    public function store(AmentityStoreRequest $r)
    {
        $amentities = new amentity();
        $c = DB::table('amentities')
            ->selectRaw('count(id) as no ')
            ->where('name', $r->name)
            ->first();
        // echo $c->no;
        if ($c->no === 0) {
            $this->saveChanges($amentities, $r);
            $amentities->slug = Str::slug($r->name, '-');
            $amentities->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'The amentity name already exists');
        }
    }

    public function edit($slug)
    {
        $amentities = new amentity();
        $amentities = $amentities->where('slug', $slug)->first();
        return view('admin.amentites.edit', compact('amentities'));
    }

    public function change($slug, AmentityUpdateRequest $r)
    {
        $amentities = new amentity();
        $amentities = $amentities->where('slug', $slug)->first();
        $c = $this->checkTitleAlreadyPresent($amentities, $r);
        if ($c->no === 0) {

            $this->saveChanges($amentities, $r);
            $amentities->save();
            return redirect()->route('admin.amentity');
        } else {
            return redirect()->back()->with('error', 'The amentities already exists');
        }
    }

    public function saveChanges($amentities, $r)
    {
        $amentities->name = $r->name;
        if (!$r->icon && $r->oldIcon) {
            $amentities->icon = $r->oldIcon;
        } else if ($r->icon) {
            $amentities->icon = $r->icon;
        } else if (!$r->oldIcon) {
            $amentities->icon = $r->icon;
        }
        $amentities->status = $r->status;
    }

    public function checkTitleAlreadyPresent($amentities, $r)
    {
        $c = DB::table('amentities')
            ->selectRaw('count(id) as no ')
            ->whereNot('id', $amentities->id)
            ->where('name', $r->name)
            ->first();
        return $c;
    }
}
