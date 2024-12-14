<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\allList;
use App\Models\hero;
use App\Models\Category;
use App\Models\listingSchedule;
use App\Models\location;
use App\Models\order;
use App\Models\package;
use App\Models\review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class HeroController extends Controller
{
    public function index()
    {
        $hero = hero::first();
        $categories = Category::where('status', 1)->get();
        $packages = package::where(['status' => 1, 'show_at_home' => 1])->get();
        $featuredCategories = Category::withCount(
            ['listings' => function ($query) {
                $query->where(['is_verified' => 1, 'status' => 1, 'is_approved' => 1]);
            }]
        )
            ->where(['show_at_home' => 1, 'status' => 1])->take(6)->get();

        $locations = location::with(
            [
                'listings' => function ($query) {
                    $query->withAvg('reviews','rating')
                        ->where(['is_verified' => 1, 'status' => 1, 'is_approved' => 1]);
                }
            ]
        )->where(['show_at_home' => 1, 'status' => 1])->get();

        // dd($locations);
        $featuredListings = allList::withAvg('reviews','rating')->where(['is_verified' => 1, 'status' => 1, 'is_approved' => 1, 'is_featured' => 1])->get();
        return view('frontend.home.sections.index', compact('hero', 'categories', 'packages', 'featuredCategories', 'locations', 'featuredListings'));
    }

    public function listing_category($slug)
    {
        $listing = new allList();
        $listing = DB::table('all_lists')
            ->join('categories', 'all_lists.category_id', '=', 'categories.id')
            ->join('locations', 'all_lists.location_id', '=', 'locations.id')
            ->where(['categories.slug' => $slug, 'all_lists.status' => 1, 'all_lists.is_approved' => 1, 'all_lists.is_verified' => 1])
            ->select('all_lists.*', 'categories.id as cat_id', 'categories.name as cat_title', 'locations.name as loc_name', 'locations.id as loc_id')
            ->get();
        
        // dd($listing);
        return view('frontend.pages.listing_cat', compact('listing'));
    }

    public function show($slug)
    {
        $listing = new allList();
        $listing = $listing->withAvg(['reviews' => function ($query) {
            $query->where('is_approved', 1);
        }], 'rating')
            ->where(['slug' => $slug, 'is_verified' => 1, 'is_approved' => 1])->first();
        // dd($listing);
        $listing->views += 1;
        $listing->save();
        $category = $listing->category_id;
        $similarListings = new allList();
        $similarListings = $similarListings->where('category_id', $category)->where('id', '!=', $listing->id)->get();

        $reviews = new review();
        $reviews = $reviews->with('users')->where('list_id', $listing->id)->paginate(1);
        return view('frontend.pages.listing-details', compact('listing', 'similarListings', 'reviews'));
    }

    public function showPackages()
    {
        $packages = package::where(['status' => 1, 'show_at_home' => 1])->get();
        foreach (config('settings') as $setting)
            return view('frontend.pages.packages', compact('packages', 'setting'));
    }

    public function checkout($pack_id)
    {
        $orders = new order();
        $paidOrNot = false;
        $image = 'upload/pay-pal.jpeg';
        $orders = $orders->select('*')->where('package_id', $pack_id)->where('user_id', auth()->user()->id)->first();
        if ($orders) {
            $paid = true;
        } else {
            $paid = false;
        }
        // var_dump($paid);
        $pack = package::where(['status' => 1, 'show_at_home' => 1, 'id' => $pack_id])->first();
        foreach (config('settings') as $setting)
            return view('frontend.pages.checkout', compact('setting', 'pack', 'paid', 'image'));
    }
}
