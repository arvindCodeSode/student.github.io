<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'imageUrl' => $faker->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false),
        'dob' => $faker->date(),
        'hobbies'=>Str::random(5).",".Str::random(6),
    ];
});
