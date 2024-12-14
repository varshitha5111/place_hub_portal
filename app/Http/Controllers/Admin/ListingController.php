<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\allListDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\listStoreRequest;
use App\Http\Requests\Admin\listUpdateRequest;
use App\Models\allList;
use App\Models\amentity;
use App\Models\AmentityList;
use App\Models\Category;
use App\Models\location;
use App\Traits\uploadImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    use uploadImage;
    public function index(allListDataTable $dataTable)
    {
        return $dataTable->render('admin.listing.index');
    }

    public function create()
    {
        $categories =  Category::all();
        $amentities =  amentity::all();
        $locations =  location::all();
        $i = 0;
        return view('admin.listing.create', compact('categories', 'amentities', 'locations', 'i'));
    }

    public function store(Request $r)
    {
        // echo "hello";

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
        $listing->is_verified = $r->is_verified;
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
        return redirect()->route('admin.listing');
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

    public function edit($slug)
    {
        $categories =  Category::all();
        $amentities =  amentity::all();
        $locations =  location::all();
        $i = 0;
        $listing = new allList();
        $listing = $listing->select('*')->where('slug', '=', $slug)->first();
        // echo $listing->location_id;
        $amentity_list = new AmentityList();
        $amentity_list = $amentity_list->select('*')->where('list_id', '=', $listing->id)->get();
        return view('admin.listing.edit', compact('listing', 'amentity_list', 'categories', 'amentities', 'locations', 'i'));
    }

    public function change(listUpdateRequest $r,$slug)
    {
        // echo $r->attachment;
        $listing = new allList();
        $listing=$listing->select('*')->where('slug',$slug)->first();
        $list_id=$listing->id;
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
        $listing->is_verified = $r->is_verified;
        $listing->is_featured = $r->is_featured;
        $listing->slug = Str::slug($listing->title, '-');
        $listing->save();
        // var_dump( $list_id);
        // $amentity_list=new AmentityList();
        AmentityList::where('list_id',$list_id)->delete();
        if ($r->amentity)
            foreach ($r->amentity as $a) {
                $amentityList = new AmentityList();
                $amentityList->list_id = $listing->id;
                $amentityList->amentity_id = $a;
                $amentityList->save();
            }
        return redirect()->route('admin.listing');
    }

    public function destroy($id)
    {
        try{
            allList::findOrFail($id)->delete();
        }
        catch(Exception $e){
            logger($e);
        }
        return redirect()->route('admin.listing');
    }
}
