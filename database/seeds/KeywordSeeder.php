<?php

use App\Models\Keyword;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Keyword::insert([
      [
        'meta_page_id' => 1,
        'keyword' => 'Lorem 1',
      ],
      [
        'meta_page_id' => 2,
        'keyword' => 'Lorem 2',
      ],
      [
        'meta_page_id' => 3,
        'keyword' => 'Lorem 3',
      ],
      [
        'meta_page_id' => 4,
        'keyword' => 'Lorem 4',
      ],
      [
        'meta_page_id' => 5,
        'keyword' => 'Lorem 5',
      ],
      [
        'meta_page_id' => 6,
        'keyword' => 'Lorem 6',
      ],
      [
        'meta_page_id' => 1,
        'keyword' => 'Lorem 7',
      ],
      [
        'meta_page_id' => 2,
        'keyword' => 'Lorem 8',
      ],
      [
        'meta_page_id' => 3,
        'keyword' => 'Lorem 9',
      ],
      [
        'meta_page_id' => 4,
        'keyword' => 'Lorem 10',
      ],
      [
        'meta_page_id' => 5,
        'keyword' => 'Lorem 11',
      ],
      [
        'meta_page_id' => 6,
        'keyword' => 'Lorem 12',
      ],
      [
        'meta_page_id' => 7,
        'keyword' => 'Lorem 13'
      ],
    ]);
  }
}
