<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'social_media';
    protected $fillable = ['icon', 'social_media', 'username'];
}
