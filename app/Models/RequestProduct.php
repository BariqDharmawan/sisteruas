<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    protected $table = 'request_product';
    protected $fillable = [
      'product_id',
      'status',
      'requester_name',
      'requester_email',
      'requester_address',
      'requester_company',
      'requester_message'
    ];

    public function product() {
      return $this->belongsTo('App\Models\Product')->withDefault();
    }
}
