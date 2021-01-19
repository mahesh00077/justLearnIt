<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class TicketReplies extends Model
{
    //
    protected $table = 'ticket_replies';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'text', 'ticket_id', 'date', 'created_at', 'updated_at'
    ];
}