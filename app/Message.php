<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'message', 'recipient_id', 'user_id', 'deliver_status', 'read_status', 'delete_status'
    ];
}
