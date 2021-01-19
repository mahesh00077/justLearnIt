<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = 'users';
    protected $primaryKey = 'uid';
    protected $fillable = [
        'username', 'name', 'email', 'mobile_no', 'email_verified_at', 'password', 'added_by', 'role', 'remember_token', 'status', 'created_at', 'updated_at'
    ];
}