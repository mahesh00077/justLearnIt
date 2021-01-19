<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ScheduleClass extends Model
{
    protected $table = 'schedule_class';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id', 'schedule_id', 'status', 'created_at', 'updated_at'
    ];
}