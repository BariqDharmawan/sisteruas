<?php

use App\Models\BenefitSection;
use Illuminate\Database\Seeder;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BenefitSection::insert([
            [
                'icon' => 'benefit1.svg',
                'title' => 'Protected from moisture',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis dui suspendisse eu ut nisl.'
            ],
            [
                'icon' => 'benefit2.svg',
                'title' => 'Maintain long shelf lives',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis dui suspendisse eu ut nisl.'
            ],
            [
                'icon' => 'benefit3.svg',
                'title' => 'Control Quality',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis dui suspendisse eu ut nisl.'
            ],
            [
                'icon' => 'benefit4.svg',
                'title' => 'International Certified',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis dui suspendisse eu ut nisl.'
            ]
        ]);
    }
}
