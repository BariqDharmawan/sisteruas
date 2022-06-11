<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    protected $table = 'product_document';
    protected $fillable = ['product_id', 'document', 'name'];

    public function product()
    {
      return $this->belongsTo('App\Models\Product')->withDefault();
    }
}
