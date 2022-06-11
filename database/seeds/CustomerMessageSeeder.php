<?php

use Illuminate\Database\Seeder;

class CustomerMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_message')->insert([
          'name'  => 'Bariq Dharmawan',
          'country'  => 'Indonesia',
          'email'  => 'bariq@dharmawan.com',
          'company_name'  => 'PT Gojek',
          'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
          'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
