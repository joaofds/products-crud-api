<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Address::class, function (Faker $faker) {
    return [
            'customer_id'   => $faker->numberBetween(1, 150),
            'street'        => $faker->streetName,
            'number'        => $faker->randomDigit,
            'zipcode'       => $faker->postcode,
            'city'          => $faker->city,
            'state'         => $faker->state,
            'country'       => $faker->country,
            'description'   => $faker->text(64),
            'active'        => $faker->boolean
    ];
});
