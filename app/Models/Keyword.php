<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'keyword';
    protected $fillable = ['keyword', 'meta_page_id'];

    public function metaPage()
    {
        return $this->belongsTo('App\Models\MetaPage')->withDefault();
    }
}
