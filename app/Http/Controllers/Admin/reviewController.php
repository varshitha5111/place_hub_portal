<?php

namespace App\Http\Controllers\admin;

use App\DataTables\reviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function index(reviewDataTable $dataTable)
    {
        return $dataTable->render('admin.review.index');
    }

    public function update(Request $r, $rev_id)
    {
        $r->validate([
            'status' => 'required'
        ]);
        $rev = new review();
        $rev = $rev->where(['id' => $rev_id, 'is_approved' => 1])->first();
        $rev->is_approved = $r->status;
        $rev->save();
        return redirect()->back();
    }
}
