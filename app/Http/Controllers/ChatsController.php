<?php

namespace App\Http\Controllers;

use App\Events\MessageDeleted;
use App\Events\Typing;
use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    public function index(){
        return view('chat');
    }

    public function fetchMessages(){
        return Message::with('user')->get();
    }

    public function sendMessage(Request $r){
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $r->message
        ]);
        broadcast(new MessageSent($user,$message))->toOthers();
        return ['status' => 'Message Sent '];


    }

    public function deleteMessage($id){
        $user = Auth::user();
        $message = Message::where('id',$id)->first();
        $message->message = "message deleted";
        $message->delete_status = 1;
        $message->delete_status = 1;
        $delete = $message->update();
        if($delete):
            broadcast(new MessageDeleted($user, $message))->toOthers();
            return ['status' => 'Message deleted'];
        endif;
    }

    public function typing(Request $r){
        $user = Auth::user();
        broadcast(new Typing($user, $r->status))->toOthers();
    }

}
