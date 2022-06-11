<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageAsset extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'image_asset';
    protected $fillable = [
        'header_home',
        'img_contact',
        'logo_footer',
        'logo_menu',
        'favicon',
        'header_career',
        'benefit_career',
        'team_career1',
        'team_career2'
    ];
}
