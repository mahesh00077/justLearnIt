<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table = 'course';
    protected $primaryKey = 'course_id';
    protected $fillable = [
        'course_name', 'overview', 'duration', 'price', 'added_by', 'status', 'created_at', 'updated_at'
    ];
}