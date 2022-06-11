<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['title', 'cover', 'subtitle', 'short_desc', 'video', 'content', 'slug'];

    public function productImage()
    {
      return $this->hasMany('App\Models\ProductImage');
    }
    public function productSlider()
    {
      return $this->hasOne('App\Models\ProductImage')->where('is_slider', true)->withDefault();
    }
    public function ProductDocument()
    {
      return $this->hasMany('App\Models\ProductDocument');
    }
    public function ProductProtection()
    {
      return $this->hasMany('App\Models\ProductProtection');
    }
}
