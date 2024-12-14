<?php

namespace App\Http\Controllers\frontend;

use App\DataTables\agentlListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\listUpdateRequest;
use App\Http\Requests\Frontend\listingStoreRequest;
use App\Models\amentity;
use App\Models\Category;
use App\Models\location;
use App\Models\allList;
use App\Models\AmentityList;
use App\Rules\maximumAementities;
use App\Rules\maximumFeatured;
use App\Rules\maximumListing;
use App\Traits\uploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class agentListingController extends Controller
{
    use uploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(agentlListingDataTable $dataTable)
    {
        $noOfListingPossible = new maximumListing();
        $createAccess=$noOfListingPossible->passes();
        return $dataTable->render('frontend.dashboard.listing.index',compact('createAccess'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::all();
        $amentities =  amentity::all();
        $locations =  location::all();
        $i = 0;
        $noOfamentity=new maximumAementities();
        $maxAmentity=$noOfamentity->passes();
        $noOfFeatured=new maximumFeatured();
        $maxFeatured=$noOfFeatured->passes();
        return view('frontend.dashboard.listing.create', compact('categories', 'locations', 'amentities', 'i','maxAmentity','maxFeatured'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(listingStoreRequest $r)
    {

        $listing = new allList();
        $listing->user_id = auth()->user()->id;
        $this->imageProcess($listing, $r);
        $listing->title = $r->title;
        $listing->category_id = $r->category;
        $listing->location_id = $r->location;
        $listing->address = $r->address;
        $listing->phone = $r->phone;
        $listing->email = $r->email;
        $listing->website = $r->website;
        $listing->fb = $r->fb;
        $listing->x_link = $r->x;
        $listing->linkden = $r->linkden;
        $listing->whatsapp = $r->whatsapp;
        $listing->description = $r->description;
        $listing->google_map_embed_code = $r->google_map;
        $listing->seo_title = $r->seo_title;
        $listing->seo_description = $r->seo_description;
        $listing->status = $r->status;
        $listing->is_verified = 0;
        $listing->is_featured = $r->is_featured;
        $listing->slug = Str::slug($listing->title, '-');
        $listing->save();
        if ($r->amentity)
            foreach ($r->amentity as $a) {
                $amentityList = new AmentityList();
                $amentityList->list_id = $listing->id;
                $amentityList->amentity_id = $a;
                $amentityList->save();
            }
        return redirect()->route('user.agent-listing.index');
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
    public function edit($slug)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('slug', $slug)->first();
        if (!$listing || auth()->user()->id !== $listing->user_id) {
            return abort(403);
        }
        $categories =  Category::all();
        $amentities =  amentity::all();
        $locations =  location::all();
        $i = 0;
        $amentity_list = new AmentityList();
        $amentity_list = $amentity_list->select('*')->where('list_id', '=', $listing->id)->get();
        $noOfamentity=new maximumAementities();
        $maxAmentity=$noOfamentity->passes();
        $noOfFeatured=new maximumFeatured();
        $maxFeatured=$noOfFeatured->passes();
        return view('frontend.dashboard.listing.edit', compact('listing', 'categories', 'locations', 'amentities', 'i', 'amentity_list','maxAmentity','maxFeatured'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(listUpdateRequest $r, $slug)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('slug', $slug)->first();
        $list_id = $listing->id;
        $this->imageProcess($listing, $r);
        $listing->title = $r->title;
        $listing->category_id = $r->category;
        $listing->location_id = $r->location;
        $listing->address = $r->address;
        $listing->phone = $r->phone;
        $listing->email = $r->email;
        $listing->website = $r->website;
        $listing->fb = $r->fb;
        $listing->x_link = $r->x;
        $listing->linkden = $r->linkden;
        $listing->whatsapp = $r->whatsapp;
        $listing->description = $r->description;
        $listing->google_map_embed_code = $r->google_map;
        $listing->seo_title = $r->seo_title;
        $listing->seo_description = $r->seo_description;
        $listing->status = $r->status;
        $listing->is_verified = 0;
        $listing->is_featured = $r->is_featured;
        $listing->slug = Str::slug($listing->title, '-');
        $listing->save();
        // var_dump( $list_id);
        // $amentity_list=new AmentityList();
        AmentityList::where('list_id', $list_id)->delete();
        if ($r->amentity)
            foreach ($r->amentity as $a) {
                $amentityList = new AmentityList();
                $amentityList->list_id = $listing->id;
                $amentityList->amentity_id = $a;
                $amentityList->save();
            }
        return redirect()->route('user.agent-listing.index');
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
