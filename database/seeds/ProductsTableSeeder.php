<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      //Seed products table with 6 entries
      factory('App\Product', 6)->create();

      //Get array of ids
      $productsIds      = DB::table('products')->pluck('id')->all();

      foreach ((range(1, 10)) as $index)
      {
        foreach ($productsIds as $productId){
          DB::table('reviews')->insert(
              [
                  'product_id' => $productId,
                  'reviewer_name' => $faker->name($gender = null),
                  'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                  'content' => $faker->text(),
              ]
          );
        }
      }


    }
}
