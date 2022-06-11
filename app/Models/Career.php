<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'career';
    protected $fillable = [
      'title',
      'location',
      'job_desc',
      'job_detail',
      'type',
      'slug'
    ];

    public function careerSubmit() {
      return $this->hasMany('App\Models\CareerSubmit');
    }
}
