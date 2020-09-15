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

    $gender = $faker->randomElement($array = array('Female', 'Male'));
    $photo = $faker->image('public/imgs', 140, 140, 'people');
    
    if($gender == 'Female') {
        $name = $faker->firstNameFemale();
    } else {
        $name = $faker->firstNameMale();
    }
    
    return [
        'gender'            => $gender,
        'fullname'          => $name.' '.$faker->lastName(),
        'email'             => $faker->unique()->safeEmail,
        'phone'             => $faker->numberBetween($min= 310100000, $max= 320200000),
        'birthdate'         => $faker->dateTimeBetween($starDate = '-60 years', $endDate = '-21 years'),
        'address'           => $faker->streetAddress(),
        'photo'             => substr($photo, 7),
        'email_verified_at' => now(),
        'password'          => bcrypt('editor'),
        'remember_token'    => Str::random(2),
    ];
});
