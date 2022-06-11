<?php

use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_image')->insert([
          [
            'product_id' => 1,
            'is_slider' => true,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 1,
            'is_slider' => false,
            'image' => 'product2_content.webp'
          ],
          [
            'product_id' => 1,
            'is_slider' => false,
            'image' => 'product3_content.webp'
          ],
          [
            'product_id' => 2,
            'is_slider' => true,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 2,
            'is_slider' => false,
            'image' => 'product2_content.webp'
          ],
          [
            'product_id' => 2,
            'is_slider' => false,
            'image' => 'product3_content.webp'
          ],
          [
            'product_id' => 3,
            'is_slider' => true,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 3,
            'is_slider' => false,
            'image' => 'product2_content.webp',
          ],
          [
            'product_id' => 3,
            'is_slider' => false,
            'image' => 'product3_content.webp',
          ],
          [
            'product_id' => 4,
            'is_slider' => true,
            'image' => 'product3_content.webp',
          ],
          [
            'product_id' => 4,
            'is_slider' => false,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 4,
            'is_slider' => false,
            'image' => 'product2_content.webp',
          ],
          [
            'product_id' => 5,
            'is_slider' => true,
            'image' => 'product2_content.webp',
          ],
          [
            'product_id' => 5,
            'is_slider' => false,
            'image' => 'product3_content.webp',
          ],
          [
            'product_id' => 5,
            'is_slider' => false,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 6,
            'is_slider' => true,
            'image' => 'product1_content.webp',
          ],
          [
            'product_id' => 6,
            'is_slider' => false,
            'image' => 'product3_content.webp',
          ],
          [
            'product_id' => 6,
            'is_slider' => false,
            'image' => 'product2_content.webp',
          ]
        ]);
    }
}
