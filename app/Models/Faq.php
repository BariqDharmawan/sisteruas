<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = ['question', 'answer', 'faq_category_id', 'is_visible'];

    public function faqCategory() {
      return $this->belongsTo('App\Models\FaqCategory')->withDefault();
    }
}
