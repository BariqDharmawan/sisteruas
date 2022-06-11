<?php

use App\Models\ImageAsset;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageAsset::insert([
            'header_home' => 'header-home.webp',
            'img_contact' => 'contact-us2.webp',
            'logo_footer' => 'logo-secondary.svg',
            'logo_menu' => 'logo-primary.svg',
            'favicon' => 'favicon-96x96.webp',
            'header_career' => 'header-career.webp',
            'benefit_career' => 'benefit-career.webp',
            'team_career1' => 'team-career1.webp',
            'team_career2' => 'team-career2.webp'
        ]);
    }
}
