<?php

use Illuminate\Database\Seeder;

class ProductDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($product = 1; $product <= 12; $product++) {
        DB::table('product_document')->insert([
          [
            'product_id' => $product,
            'document' => 'README.md',
            'name' => 'TDS CONTAINER DRI® II LINE OF CARGO DESICCANTS 2'
          ],
          [
            'product_id' => $product,
            'document' => 'seeder.txt',
            'name' => 'Brochure CONTAINER DRI® II'
          ],
          [
            'product_id' => $product,
            'document' => 'Website Dickson Synergy.pdf',
            'name' => 'FLYER HOW TO PROTECT SHIPMENTS FROM MOISTURE'
          ],
        ]);
      }
    }
}
