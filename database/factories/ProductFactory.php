<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
       'name' =>$this->faker->name(),
       'category_id' => 1,
       'price' => $this->faker->price(),
       'description' =>$this->faker->paragraph()
    ];
});
