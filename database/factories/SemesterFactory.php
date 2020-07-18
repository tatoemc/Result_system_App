<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Semester;
use Faker\Generator as Faker;

$factory->define(Semester::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'code' => $faker->unique()->numberBetween(1, 10),
        'grade_id' => factory(\App\Grade::class)->create(),
    ];
});
