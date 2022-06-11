<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'company_profile';
    protected $fillable = ['name', 'title', 'description', 'copyright'];
}
