<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    protected $table = 'faq_category';
    protected $fillable = ['category'];

    public function faq()
    {
      return $this->hasMany('App\Models\Faq');
    }
    public function faqVisible()
    {
      return $this->hasMany('App\Models\Faq')->where('is_visible', 'show');
    }
}
