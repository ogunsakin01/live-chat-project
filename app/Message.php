<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /*
     *  Fields that are mass assignable
     *
     *
     *  @var array
     * */
    protected $fillable = [
      'message', 'recipient_id', 'user_id', 'deliver_status', 'read_status', 'delete_status'
    ];


    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
