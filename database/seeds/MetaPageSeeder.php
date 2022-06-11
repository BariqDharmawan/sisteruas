<?php

use App\Models\MetaPage;
use Illuminate\Database\Seeder;

class MetaPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetaPage::insert([
            [
                'page_name' => 'main_page',
                'title' => 'meta page main',
                'description' => 'Lorem main dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'main.gif'
            ],
            [
                'page_name' => 'career_page',
                'title' => 'meta page career',
                'description' => 'Lorem career dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'career.webp'
            ],
            [
                'page_name' => 'product_page',
                'title' => 'meta page product',
                'description' => 'Lorem product dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'product.gif'
            ],
            [
                'page_name' => 'about_page',
                'title' => 'meta page about',
                'description' => 'Lorem about dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'about-us.jpeg'
            ],
            [
                'page_name' => 'faq_page',
                'title' => 'meta page main',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'faq.webp'
            ],
            [
                'page_name' => 'contact_us_page',
                'title' => 'meta page contact us',
                'description' => 'Lorem contact us dolor sit amet, consectetur adipisicing elit. Vero incidunt nisi neque. Optio ad nobis blanditiis deleniti quisquam animi dolores assumenda a eos, iure, facilis cupiditate error pariatur unde eaque.',
                'thumbnail' => 'contact-us.webp'
            ]
        ]);
    }
}
