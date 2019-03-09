@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats</div>
                    <div class="panel-body">
                        <chat-messages :messages="messages" :typing="typing_message"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form v-on:messagesent="addMessage" @typing="typing" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection