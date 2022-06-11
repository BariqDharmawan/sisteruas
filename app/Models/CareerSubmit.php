<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerSubmit extends Model
{
    protected $table = 'career_submit';
    protected $fillable = ['career_id', 'fullname', 'email', 'phone', 'address', 'summary', 'resume'];

    public function career() {
      return $this->belongsTo('App\Models\Career');
    }
}
