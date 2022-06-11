<?php

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
          [
            'name' => 'Indofood',
            'logo' => 'Indofood.svg'
          ],
          [
            'name' => 'Samsung',
            'logo' => 'samsung.svg'
          ],
          [
            'name' => 'Kai',
            'logo' => 'kai.svg'
          ],
          [
            'name' => 'Mayora',
            'logo' => 'mayora.svg'
          ],
          [
            'name' => 'Unilaver',
            'logo' => 'unilaver.svg'
          ]
        ]);
    }
}
