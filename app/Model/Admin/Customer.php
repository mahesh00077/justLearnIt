<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $primaryKey = 'cust_id';
    protected $fillable = [
        'name', 'email', 'mobile_no', 'state', 'city', 'status', 'created_at', 'updated_at'
    ];
}