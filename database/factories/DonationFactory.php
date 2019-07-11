<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Donation::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'donation_amount' => $faker->randomFloat(2, 0, 100),
        'message' => $faker->realText(),
        'created_at' => $faker->dateTimeThisYear(),
    ];
});
