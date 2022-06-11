<?php

use Illuminate\Database\Seeder;

class RequestProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($requestProduct = 1; $requestProduct <= 12; $requestProduct ++) {
          DB::table('request_product')->insert([
            'product_id' => $requestProduct,
            'requester_name' => Str::random(10),
            'requester_email' => Str::random(5) . '@email.com',
            'requester_address' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia iure harum, error quibusdam, repellat explicabo.',
            'requester_company' => Str::random(7),
            'created_at' => date("Y-m-d H:i")
          ]);
        }
    }
}
