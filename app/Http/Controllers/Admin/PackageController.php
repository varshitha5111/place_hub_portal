<?php

namespace App\Http\Controllers\admin;

use App\DataTables\packageDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\packageStoreRequest;
use App\Models\package;
use Exception;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(packageDataTable $dataTable)
    {
        return $dataTable->render('admin.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(packageStoreRequest $r)
    {
        $package = new package();
        $package->type = $r->type;
        $package->name = $r->name;
        $package->no_of_listing = $r->no_of_list;
        $package->no_of_photos = $r->no_of_photo;
        $package->no_of_amentities = $r->no_of_amenity;
        $package->no_of_video = $r->no_of_video;
        $package->price = $r->price;
        $package->no_of_featured_listing = $r->no_featured_list;
        $package->show_at_home = $r->show_at_home;
        $package->status = $r->status;
        $package->number_of_days = $r->no_of_days;
        $package->save();
        return redirect()->route('admin.package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        package::findOrFail($id)->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pack_id)
    {
        $packs = new package();
        $packs = $packs->select('*')->where('id', $pack_id)->first();
        return view('admin.packages.edit', compact('packs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(packageStoreRequest $r, $pack_id)
    {
        $package = new package();
        $package = $package->select('*')->where('id', $pack_id)->first();
        $package->type = $r->type;
        $package->name = $r->name;
        $package->no_of_listing = $r->no_of_list;
        $package->no_of_photos = $r->no_of_photo;
        $package->no_of_amentities = $r->no_of_amenity;
        $package->no_of_video = $r->no_of_video;
        $package->price = $r->price;
        $package->no_of_featured_listing = $r->no_featured_list;
        $package->show_at_home = $r->show_at_home;
        $package->status = $r->status;
        $package->number_of_days = $r->no_of_days;
        $package->save();
        return redirect()->route('admin.package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        package::findOrFail($id)->delete();
        echo "hello";
        // return redirect()->back();
    }

}
