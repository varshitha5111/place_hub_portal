<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\uploadImage;
use App\Models\listingImageGallery;
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
        $list_id=request()->list_id;
        $imageGallery=new listingImageGallery();
        $imageGalleryList=$imageGallery->select('*')->where('list_id',$list_id)->first();
        $imageGallery=$imageGallery->select('*')->where('list_id',$list_id)->get();
        return view('admin.listing.image-gallery.index',compact('imageGallery','imageGalleryList'));
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
        $paths=($this->uploadMultipleImg($request,'img'));
        foreach($paths as $image_path)
        {
            $imageGallery=new listingImageGallery();
            $imageGallery->list_id=$request->list_id;
            $imageGallery->image=$image_path;
            $imageGallery->save();
        }
        return redirect()->route('admin.listing-image-gallery.index',['list_id'=>$request->list_id]);
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

    public function imageProcess($listing, $r)
    {
        $image = $listing->image;
        $thumb_image = $listing->bg_image;
        $file = $listing->file;

        if ($r->image) {
            $imagePath = $this->uploadImg(
                $r,
                'image',
                $image ? $image : null
            );
            if ($imagePath) {
                $listing->image = $imagePath;
            }
        }
        if ($r->thumb_img) {
            $thumb_imagePath = $this->uploadImg(
                $r,
                'thumb_img',
                $thumb_image ? $thumb_image : null
            );
            if ($thumb_imagePath) {
                $listing->thumbnail_image = $thumb_imagePath;
            }
        }
        if ($r->file) {
            $filePath = $this->uploadImg(
                $r,
                'file',
                $file ? $file : null
            );
            if ($filePath) {
                $listing->file = $filePath;
            }
        }
    }
}
