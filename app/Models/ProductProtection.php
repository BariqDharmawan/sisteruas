<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProtection extends Model
{
    protected $table = 'product_protection';
    protected $fillable = ['product_id', 'icon', 'text', 'description'];

    public function product()
    {
      return $this->belongsTo('App\Models\Product')->withDefault();
    }
}
