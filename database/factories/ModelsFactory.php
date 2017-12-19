<?php

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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Employer::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('ru_RU');
    $middleNames = ['Сергеевич', 'Иванович', 'Петрович'];
    return [
        'first_name' => $faker->firstName('male'),
        'last_name' => $faker->lastName,
        'middle_name' => $middleNames[rand(0,2)],
        'gender' => 'm',
        'salary' => rand(100, 50000)
    ];
});