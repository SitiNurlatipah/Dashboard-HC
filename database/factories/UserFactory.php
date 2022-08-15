<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserModel;
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

$factory->define(App\UserModel::class, function (Faker $faker) {
    return [
        'txtEmployeeName' => Str::random(10),
        'txtEmail' => $faker->unique()->safeEmail,
        'txtPassword' => Str::random(10), // password
        'txtUsername'=>Str::random(10),
        'txtNik'=>Str::random(10),
        'txtType'=>Str::random(10),
        'txtStatus'=>Str::random(10),
        'txtJobTitle'=>Str::random(10),
        'txtDepartment'=>Str::random(10),
        'dtmStartDate'=>$faker->date,
        'dtmEndDate'=>$faker->date,
        'txtGender'=>Str::random(10),
    ];
});
