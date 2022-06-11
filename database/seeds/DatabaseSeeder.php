<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          ProductSeeder::class,
          CareerSeeder::class,
          FrontTextSeeder::class,
          UserSeeder::class,
          CompanyProfileSeeder::class,
          CompanyContactSeeder::class,
          SocialMediaSeeder::class,
          KeywordSeeder::class,
          MetaPageSeeder::class,
          ImageSeeder::class,
          ProductImageSeeder::class,
          ProductDocumentSeeder::class,
          FaqSeeder::class,
          FaqCategorySeeder::class,
          ClientSeeder::class,
          BenefitSeeder::class,
          FreeSampleSeeder::class,
          RequestProductSeeder::class,
          ResumeSeeder::class,
          CareerSubmitSeeder::class,
          CustomerMessageSeeder::class,
          ProductProtection::class
        ]);
    }
}
