<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\listingVideoGallery;
use Illuminate\Http\Request;

class listingVideoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_id=request()->list_id;
        $videoGallery=new listingVideoGallery();
        $videoGalleryList=$videoGallery->where('list_id',$list_id)->first();
        $videoGallery=$videoGallery->select('*')->where('list_id',$list_id)->get();
        return view('admin.listing.video-gallery.index',compact('videoGallery','videoGalleryList'));
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
            'video'=>['required','url']
        ]);

        $videoGallery=new listingVideoGallery();
        $videoGallery->list_id=$request->list_id;
        $videoGallery->video=$request->video;
        $videoGallery->save();

        return redirect()->route('admin.listing-video-gallery.index',['list_id'=>$request->list_id]);

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
