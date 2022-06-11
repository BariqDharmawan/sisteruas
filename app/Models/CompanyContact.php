<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    protected $table = 'company_contact';
    protected $fillable = ['email', 'telphone', 'address', 'location', 'whatsapp'];
}
