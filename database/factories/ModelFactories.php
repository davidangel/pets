<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

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


$factory->define(App\Pet::class, function (Faker $faker) {
   return [
       'name' => $faker->firstName,
       'avatar' => $faker->image(public_path().'/storage/uploads/avatars',512,512, 'animals', false),
       'favorite_place' => $faker->longitude . ',' . $faker->latitude,
       'date_of_birth' => $faker->dateTimeThisDecade
   ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => $faker->image(public_path().'/storage/uploads/avatars',512,512, 'people', false),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
