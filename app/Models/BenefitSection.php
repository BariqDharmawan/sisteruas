<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitSection extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'benefit_section';
    protected $fillable = ['icon', 'title', 'description'];
}
