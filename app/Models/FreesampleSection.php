<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreesampleSection extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'freesample_section';
    protected $fillable = ['heading', 'subheading', 'cover'];
}
