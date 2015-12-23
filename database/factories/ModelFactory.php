<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Course::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
$factory->define(App\Subject::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});
$factory->define(App\CourseSubject::class, function (Faker\Generator $faker) {
    return [
        'start_date' => $faker->dateTimeBetween('+1 month', '+3 month'),
        'end_date' => $faker->dateTimeBetween('+6 month', '+9 month'),
        'is_finished' => rand(0, 1),
    ];
});
