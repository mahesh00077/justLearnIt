<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //
    protected $table = 'syllabus_contents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'course_id', 'title', 'content', 'status', 'added_by', 'created_at', 'updated_at'
    ];
}