<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'class'=>$faker->numberBetween($min = 5, $max =15),
        'phoneNumber'=>$faker->phoneNumber(),
        'imageUrl' => $faker->imageUrl($width = 640, $height = 480, $category = null, $randomize = true, $word = null, $gray = false),
        'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'hobbies'=>Str::random(5).",".Str::random(6),
        
    ];
});
