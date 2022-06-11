<?php

use Illuminate\Database\Seeder;

class CompanyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('company_contact')->insert([
        'email' => 'dickson.customer@gmail.com',
        'telphone' => '62 838 7000 5050',
        'whatsapp' => '6283870005050',
        'address' => '1444 West Ave #777',
        'location' => 'Berlin, Germany'
      ]);
    }
}
