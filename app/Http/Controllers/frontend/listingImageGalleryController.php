<?php

namespace App\Http\Controllers\Frontend;

use App\Models\listingImageGallery;
use App\Http\Controllers\Controller;
use App\Models\allList;
use App\Rules\maximumImages;
use App\Traits\uploadImage;
use Illuminate\Http\Request;

class listingImageGalleryController extends Controller
{
    use uploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_id = request()->list_id;
        $listing=new allList();
        $listing=$listing->select('*')->where('id',$list_id)->first();
        if(!$listing ||$listing->user_id!=auth()->user()->id){
            return abort(403);
        }
        $imageGallery = new listingImageGallery();
        $imageGalleryList = $imageGallery->select('*')->where('list_id', $list_id)->first();
        $imageGallery = $imageGallery->select('*')->where('list_id', $list_id)->get();
        $noOfImg=new maximumImages();
        $noOfImg=$noOfImg->passes();
        return view('frontend.dashboard.listing.image-gallery.index', compact('imageGallery', 'imageGalleryList','noOfImg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required'
        ]);
        $paths = ($this->uploadMultipleImg($request, 'img'));
        foreach ($paths as $image_path) {
            $imageGallery = new listingImageGallery();
            $imageGallery->list_id = $request->list_id;
            $imageGallery->image = $image_path;
            $imageGallery->save();
        }
        return redirect()->route('user.listing-image-gallery.index', ['list_id' => $request->list_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
