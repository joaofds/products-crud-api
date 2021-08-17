<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name'  => $faker->word,
        'price' => $faker->randomFloat(2, 0, 100)
    ];
});
