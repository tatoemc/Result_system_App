<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'code' => $faker->numberBetween($min = 1000, $max = 9000),
        'dept_id' => factory(\App\Dept::class)->create(),
        'hours' => $faker->numberBetween($min = 2, $max = 4),
        'semester_id' => factory(\App\Semester::class)->create(),
    ];
});
