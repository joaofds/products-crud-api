<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'contact_id' => $faker->numberBetween(1, 150),
        'address_id' => $faker->numberBetween(1, 150),
        'active' => $faker->boolean,
    ];
});
