<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaPage extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'meta_page';
    protected $fillable = ['page_name', 'title', 'description', 'thumbnail'];

    public function keywords()
    {
        return $this->hasMany('App\Models\Keyword');
    }
}
