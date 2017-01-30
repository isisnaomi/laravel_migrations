<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Seed tags table with 5 entries
      factory('App\Tag', 5)->create();

      //Get array of ids
      $productsIds      = DB::table('products')->pluck('id')->all();
      $tagsIds     = DB::table('tags')->pluck('id')->all();


      foreach ((range(1, 2)) as $index)
      {
        foreach ($productsIds as $productId){
          DB::table('product_tag')->insert(
              [
                  'product_id' => $productId,
                  'tag_id' => $tagsIds[array_rand($tagsIds)]
              ]
          );
        }
      }
    }
}
