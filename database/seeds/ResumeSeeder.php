<?php

use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resume')->insert([
          [
            'name' => 'Bariq Dharmawan',
            'email' => 'bariq@dharmawan.com',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ],
          [
            'name' => 'Dharmawan Bariq',
            'email' => 'dharmawan@bariq.com',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ],
          [
            'name' => 'Muhammad Dharmawan',
            'email' => 'muhammad@dharmawan.com',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ]
        ]);
    }
}
