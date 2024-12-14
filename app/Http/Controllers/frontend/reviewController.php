<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function store(Request $r)
    {
        $r->validate([
            'rating' => ['required'],
            'comment' => ['required'],
        ]);
        $preReview = review::where(['list_id' => $r->list_id, 'user_id' => auth()->user()->id])->first();
        if ($preReview) {
            return redirect()->back()->with('revError', 'Review is already done!');
        } else {
            $rev = new review();
            $rev->rating = $r->rating;
            $rev->review = $r->comment;
            $rev->user_id = auth()->user()->id;
            $rev->list_id = $r->list_id;
            $rev->save();
            return redirect()->back();
        }
    }
    
}
