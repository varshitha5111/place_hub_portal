<?php

namespace App\Http\Controllers\admin;

use App\Events\message;
use App\Http\Controllers\Controller;
use App\Models\chat;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index()
    {
        $senders = chat::with(['senderProfile', 'listings'])
            ->select(['sender_id', 'list_id'])
            ->where('reciever_id', auth()->user()->id)
            ->where('sender_id', '!=', auth()->user()->id)
            ->groupBy('sender_id', 'list_id')
            ->get();
        $chats = [];
        return view('admin.message.index', compact('senders', 'chats'));
    }

    public function send_msg($reciever_id,$sender_id,$list_id,$msg)
    {
        $msg = new chat();
        $msg->reciever_id = $reciever_id;
        $msg->sender_id = $sender_id;
        $msg->msg = $msg;
        $msg->list_id = $list_id;
        $msg->save();
        echo "hiii";
        broadcast(new message($msg->reciever_id,$msg->sender_id,$msg->msg));
        return redirect()->back()->with('sentSuccess', 'sent successfully');
    }

    public function conversation($sender_id, $list_id)
    {


        $senders = chat::with(['senderProfile', 'listings'])
            ->select(['sender_id', 'list_id'])
            ->where('reciever_id', auth()->user()->id)
            ->where('sender_id', '!=', auth()->user()->id)
            ->groupBy('sender_id', 'list_id')
            ->get();
        $chats = chat::with(['senderProfile'])
            ->whereIn('reciever_id', [auth()->user()->id, $sender_id])
            ->whereIn('sender_id', [auth()->user()->id, $sender_id])
            ->where('list_id', $list_id)
            ->orderBy('created_at')->get();


        return response()->json($chats);
    }
}
