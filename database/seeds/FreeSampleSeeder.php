<?php

use App\Models\FreesampleSection;
use Illuminate\Database\Seeder;

class FreeSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FreesampleSection::insert([
            'heading' => 'Free Sample',
            'subheading' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim nibh erat non massa.',
            'cover' => 'get_free_sample.webp'
        ]);
    }
}
