<?php

namespace App\Http\Controllers\frontend;

use App\DataTables\agentListingScheduleDataTable;
use App\Models\listingSchedule;
use App\Models\allList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListingScheduleController extends Controller
{
    public function index(agentListingScheduleDataTable $dataTable, $list_id)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('id', $list_id)->first();
        if (!$listing || $listing->user_id != auth()->user()->id) {
            return abort(403);
        }
        $dataTable->with('list_id', $list_id);
        $listing = allList::find($list_id);
        return $dataTable->render('frontend.dashboard.listing.listing-schedule.index', compact('list_id', 'listing'));
    }

    public function create($list_id)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('id', $list_id)->first();
        if (!$listing || $listing->user_id != auth()->user()->id) {
            return abort(403);
        }
        $listSchedule = new listingSchedule();
        $days = $listSchedule->select('day')->where('list_id', $list_id)->get();
        return view('frontend.dashboard.listing.listing-schedule.create', compact('list_id', 'days'));
    }

    public function store(Request $r, $list_id)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('id', $list_id)->first();
        if (!$listing || $listing->user_id != auth()->user()->id) {
            return abort(403);
        }
        $listSchedule = new listingSchedule();
        $listSchedule->list_id = $list_id;
        $listSchedule->day = $r->days;
        $listSchedule->start = $r->start;
        $listSchedule->end = $r->end;
        $listSchedule->status = $r->status;
        $listSchedule->save();
        return redirect()->route('user.listing.schedule.home', ['list_id' => $list_id]);
    }

    public function edit($list_id, $id)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('id', $list_id)->first();
        if (!$listing || $listing->user_id != auth()->user()->id) {
            return abort(403);
        }
        $schedule = new listingSchedule();
        $schedule = $schedule->select('*')->where('list_id', $list_id)->where('id', $id)->first();
        // var_dump($schedule->start);
        return view('frontend.dashboard.listing.listing-schedule.edit', compact('schedule'));
    }

    public function change(Request $r, $list_id, $id)
    {
        $listing = new allList();
        $listing = $listing->select('*')->where('id', $list_id)->first();
        if (!$listing || $listing->user_id != auth()->user()->id) {
            return abort(403);
        }
        $listSchedule = new listingSchedule();
        $listSchedule = $listSchedule->select('*')->where('list_id', $list_id)->where('id', $id)->first();
        $listSchedule->list_id = $list_id;

        $listSchedule->start = $r->start;
        $listSchedule->end = $r->end;
        $listSchedule->status = $r->status;
        $listSchedule->save();
        return redirect()->route('user.listing.schedule.home', ['list_id' => $list_id]);
    }
}
