<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedule';
    protected $primaryKey = 'schedule_id';
    protected $fillable = [
        'time_from', 'time_to', 'status', 'added_by', 'created_at', 'updated_at'
    ];
}