<?php

use Illuminate\Database\Seeder;

class CareerSubmitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('career_submit')->insert([
          [
            'career_id' => 1,
            'fullname' => 'Bariq',
            'email' => 'bariq@gmail.com',
            'phone' => '6287776196047',
            'address' => 'Swadaya Gudang Baru, Jagakarsa, Jakarta Selatan',
            'summary' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius blanditiis, voluptate rem quaerat enim magni alias
                          pariatur repellat, repudiandae voluptatibus.',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ],
          [
            'career_id' => 2,
            'fullname' => 'Dharmawan',
            'email' => 'dharmawan@gmail.com',
            'phone' => '6287776196047',
            'address' => 'Swadaya Gudang Baru, Jagakarsa, Jakarta Selatan',
            'summary' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta in, perferendis veniam placeat maxime quod?
                          speriores assumenda voluptatum amet, fugiat.',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ],
          [
            'career_id' => 3,
            'fullname' => 'Muhammad',
            'email' => 'muhammad@gmail.com',
            'phone' => '6287776196047',
            'address' => 'Swadaya Gudang Baru, Jagakarsa, Jakarta Selatan',
            'summary' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt asperiores, eius provident porro autem ma
                          ni at. Necessitatibus minima adipisci dolor.',
            'resume' => 'sample.pdf',
            'created_at' => date('Y-m-d h:m:s')
          ]
        ]);
    }
}
