<?php

use Faker\Generator as Faker;


$factory->define(App\Models\Sale::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1, 150),
        'product_id' => $faker->numberBetween(1, 150),
        'amount' => $faker->numberBetween(1, 10),
        'price' => $faker->randomFloat(2, 0, 100),
        'status' => $faker->numberBetween(1, 5),
    ];
});
