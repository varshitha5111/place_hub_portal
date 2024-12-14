<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\listingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Models\allList;
use App\Models\listingSchedule;
use Illuminate\Http\Request;

class listingScheduleController extends Controller
{
    public function index(listingScheduleDataTable $dataTable, $list_id)
    {
        $dataTable->with('list_id',$list_id);
        $listing=allList::find($list_id);
        return $dataTable->render('admin.listing.listing-schedule.index', compact('list_id','listing'));
    }

    public function create($list_id)
    {
        $listSchedule = new listingSchedule();
        $days=$listSchedule->select('day')->where('list_id',$list_id)->get();
        return view('admin.listing.listing-schedule.create', compact('list_id','days'));
    }

    public function store(Request $r, $list_id)
    {
        $listSchedule = new listingSchedule();
        $listSchedule->list_id = $list_id;
        $listSchedule->day = $r->days;
        $listSchedule->start = $r->start;
        $listSchedule->end = $r->end;
        $listSchedule->status = $r->status;
        $listSchedule->save();
        return redirect()->route('admin.listing.schedule.home', ['list_id' => $list_id]);
    }

    public function edit($list_id,$id)
    {
        $schedule = new listingSchedule();
        $schedule = $schedule->select('*')->where('list_id', $list_id)->where('id',$id)->first();
        // var_dump($schedule->start);
        return view('admin.listing.listing-schedule.edit', compact('schedule'));
    }

    public function change(Request $r,$list_id,$id)
    {
        $listSchedule = new listingSchedule();
        $listSchedule=$listSchedule->select('*')->where('list_id',$list_id)->where('id',$id)->first();
        $listSchedule->list_id = $list_id;
        
        $listSchedule->start = $r->start;
        $listSchedule->end = $r->end;
        $listSchedule->status = $r->status;
        $listSchedule->save();
        return redirect()->route('admin.listing.schedule.home', ['list_id' => $list_id]);
    }
}
