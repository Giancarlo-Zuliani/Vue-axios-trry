<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'description' => $faker -> sentence,
        'ingredients' => $faker -> word,
        'photo' => $faker -> word,
        'price' => rand(10,100),
        'available'=> rand(0,1),
    ];
});
