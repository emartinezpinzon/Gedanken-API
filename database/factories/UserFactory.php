<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    
    return [
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'avatar' => $faker->imageUrl(300, 300, 'people'),
        'bio' => $faker->realText(random_int(20, 160)),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
	return [
        'title' => $faker->realText(random_int(10, 30)),
        'content' => $faker->realText(random_int(20, 160)),
        'image' => $faker->imageUrl(600, 338),
        
	];
});