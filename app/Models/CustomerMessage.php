<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerMessage extends Model
{
    protected $table = 'customer_message';
    protected $fillable = ['name', 'country', 'email', 'company_name', 'message'];
}
