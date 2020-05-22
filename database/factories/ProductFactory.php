<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(App\product::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->sentence,
        'description'=>$faker->sentence
    ];
});
