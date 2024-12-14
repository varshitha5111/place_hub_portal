<?php

namespace App\Http\Controllers\frontend;

use App\Events\message;
use App\Http\Controllers\Controller;
use App\Models\allList;
use App\Models\chat;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index()
    {
        $recievers = chat::with(['recieverProfile', 'listings'])
            ->select(['reciever_id', 'list_id'])
            ->where('sender_id', auth()->user()->id)
            ->where('reciever_id', '!=', auth()->user()->id)
            ->groupBy('reciever_id', 'list_id')
            ->get();
        $chats = [];
        return view('frontend.dashboard.message.index', compact('recievers', 'chats'));
    }

    public function send_msg(Request $r)
    {
        $msg = new chat();
        $msg->reciever_id = $r->reciever_id;
        $msg->sender_id = auth()->user()->id;
        $msg->msg = $r->msg;
        $msg->list_id = $r->list_id;
        $msg->save();
        broadcast(new message($msg->reciever_id, $msg->sender_id, $msg->msg));
        return redirect()->back()->with('sentSuccess', 'sent successfully');
    }

    public function conversation($reciever_id, $list_id)
    {

        $sender_id = auth()->user()->id;
        $recievers = chat::with(['recieverProfile', 'listings'])
            ->select(['reciever_id', 'list_id'])
            ->where('sender_id', auth()->user()->id)
            ->where('reciever_id', '!=', auth()->user()->id)
            ->groupBy('reciever_id', 'list_id')
            ->get();
        $chats = chat::with(['recieverProfile', 'listings'])
            ->whereIn('sender_id', [auth()->user()->id, $reciever_id])
            ->whereIn('reciever_id', [auth()->user()->id, $reciever_id])
            ->where('list_id', $list_id)
            ->orderBy('created_at')->get();

        return view('frontend.dashboard.message.index', compact('recievers', 'chats'));
    }
}
