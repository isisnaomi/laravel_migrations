<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(AddressesTableSeeder::class);
      $this->call(SellersTableSeeder::class);
      $this->call(ProductsTableSeeder::class);
      $this->call(TagsTableSeeder::class);
      //$this->call(ReviewsTableSeeder::class);

    }
}
