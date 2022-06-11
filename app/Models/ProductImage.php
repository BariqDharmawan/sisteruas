<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image';
    protected $fillable = ['product_id', 'image', 'is_slider'];
    public function product() {
      return $this->belongsTo('App\Models\Product')->withDefault();
    }
}
