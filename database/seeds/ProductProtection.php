<?php

use Illuminate\Database\Seeder;

class ProductProtection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($product = 1; $product <= 12; $product++) {
          DB::table('product_protection')->insert([
            [
              'product_id' => $product,
              'icon' => 'insurrance.svg',
              'text' => 'Safety',
              'description' => "Container Dri® II protects cargo from the damaging effects of moisture during shipping and transport.
                                Its high performance enables more absorption with less desiccant, making it a cost effective and economical solution."
            ],
            [
              'product_id' => $product,
              'icon' => 'verified.svg',
              'text' => 'Ecotain',
              'description' => "Products that offer outstanding sustainability advantages are awarded Clariant’s EcoTain® label.
                                EcoTain® products significantly exceed sustainability market standards, have best-in-class performance and contribute
                                overall to sustainability efforts of the company and our customers."
            ]
          ]);
        }
    }
}
