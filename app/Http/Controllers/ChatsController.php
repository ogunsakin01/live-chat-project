<?php

namespace App\Http\Controllers;

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


        $broadcast = broadcast(new MessageSent($user,$message))->toOthers();
        if (!$broadcast):
            return ['status' => 'Message Sent but not broadcasted'];
        endif;
        return ['status' => 'Message Sent and broadcasted'];


    }
}
