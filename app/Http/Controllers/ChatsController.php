<?php

namespace App\Http\Controllers;

use App\Events\MessageDeleted;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        $messages = Message::with('user')
            ->get();
        return response()->json([
            'status' => 1,
            'message' => 'messages fetched',
            'data' => $messages
        ],200);
    }

    public function sendMessage(Request $r)
    {
        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $r->message
        ]);
        broadcast(new MessageSent($user, $message))->toOthers();
        return response()->json([
            'status' => 1,
            'message' => 'Message Sent',
            'data' => $message
        ],200);
    }

    public function deleteMessage($id)
    {
        $user = Auth::user();
        $message = Message::where('id', $id)->first();
        $message->message = "message deleted";
        $message->delete_status = 1;
        $message->delete_status = 1;
        $delete = $message->update();
        if ($delete):
            broadcast(new MessageDeleted($user, $message))->toOthers();
            return response()->json([
                'status' => 1,
                'messages' => 'Message deleted',
                'data' => $delete
            ],200);
        endif;
    }


}
