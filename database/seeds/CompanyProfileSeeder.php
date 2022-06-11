<?php

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyProfile::create([
            'name' => 'Dickson Synergy',
            'title' => 'Best Solution Protect your Product Cargo',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum, libero interdum cursus sollicitudin,
                            ligula nisl hendrerit libero, a ullamcorper nulla risus efficitur turpis.',
            'copyright' => 'Copyright Dickson synergy inc. All rights reserved.'
        ]);
    }
}
