<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Product::class, function (Faker\Generator $faker) {
  $sellers = App\Seller::pluck('id')->all();

  return [
      'seller_id' => $faker->randomElement($sellers),
      'name' => $faker->word,
      'price' => $faker->randomFloat(2, 1, 1000),
      'description' => $faker->text(),
  ];
});

$factory->define(\App\Seller::class, function (Faker\Generator $faker) {
  $addresses = App\Address::pluck('id')->all();
  return [
      'name' => $faker->word,
      'last_name' => $faker->word,
      'address_id' => $faker->randomElement($addresses),
  ];
});

$factory->define(\App\Review::class, function (Faker\Generator $faker) {
  $products = App\Product::pluck('id')->all();
  return [
      'product_id' => $faker->randomElement($products),
      'reviewer_name' => $faker->name($gender = null),
      'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
      'content' => $faker->text(),
  ];
});

$factory->define(\App\Tag::class, function (Faker\Generator $faker) {
  return [
      'name' => $faker->word,
  ];
});

$factory->define(\App\Address::class, function (Faker\Generator $faker) {
  return [
      'address' => $faker->address,
      'city' => $faker->city,
      'state' => $faker->state,
      'country' => $faker->country,
      'zip_code' => $faker->postcode,
  ];
});