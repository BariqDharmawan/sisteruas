<?php

use Illuminate\Database\Seeder;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq_category')->insert([
          [
            'category' => 'request'
          ],
          [
            'category' => 'product'
          ],
          [
            'category' => 'sample'
          ],
          [
            'category' => 'claim'
          ],
          [
            'category' => 'payment'
          ],
          [
            'category' => 'other'
          ]
        ]);
    }
}
