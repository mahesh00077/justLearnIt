<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RegisteredCourseInfo extends Model
{
    //
    protected $table = 'registered_course_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uid', 'course_id', 'schedule_id', 'status', 'created_at', 'updated_at'
    ];
}