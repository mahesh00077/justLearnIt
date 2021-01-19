<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uniq_id', 'user_id', 'title', 'init_msg', 'role', 'date', 'last_reply', 'user_read', 'admin_read', 'resolved', 'priority'
    ];
}