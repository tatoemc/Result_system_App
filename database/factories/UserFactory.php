<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Faker\Provider\Base;

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
        'universit_id' => $faker->numberBetween($min = 10, $max = 10000).$faker->numberBetween($min = 10, $max = 10000),
        'user_type' => 'stu',
        'gender' => $faker->randomElement(['mail', 'fmail']),
        'dept_id' => 2,
        'grade_id' => 1,
        'semester_id' => 1,
        'email' => $faker->unique()->safeEmail,
        //'images' => $faker->image(storage_path('public/images/1572511505.jpg'), 50, 50),
        'email_verified_at' => now(),
        'password' => '$2y$10$4z1W27WZrd3GOPuD5smGe.vED7/piDY3vCflCO4xo6eQizGppCGe6', // newday77
        'remember_token' => Str::random(10),
    ];
});
