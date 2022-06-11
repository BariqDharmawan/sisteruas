<?php

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialMedia::insert([
            [
                'icon' => 'twitter.svg',
                'social_media' => 'twitter',
                'username' => 'dicksonid',

            ],
            [
                'icon' => 'linkedin.svg',
                'social_media' => 'instagram',
                'username' => 'dickson.id'
            ],
            [
                'icon' => 'instagram.svg',
                'social_media' => 'instagram',
                'username' => 'dicksonid'
            ],
            [
                'icon' => 'facebook.svg',
                'social_media' => 'facebook',
                'username' => 'Dickson Indonesia'
            ]
        ]);
    }
}
