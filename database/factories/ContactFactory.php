<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Contact::class, function (Faker $faker) {
    return [
        'customer_id'   => $faker->numberBetween(1, 150),
        'mobile'        => $faker->phoneNumber,
        'home'          => $faker->phoneNumber,
        'description'   => $faker->text(32),
        'active'        => $faker->boolean
    ];
});
