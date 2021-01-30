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
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'image' =>$faker->imageUrl($width = 640, $height = 480),
        'statu' =>$faker->boolean,

    ];
});


$factory->define(App\sliders::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'image' =>$faker->imageUrl($width = 640, $height = 480),
        'statu' =>$faker->boolean,

    ];
});


$factory->define(App\partners::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'model' => $faker->name,
        'image' =>$faker->imageUrl($width = 640, $height = 480),
        'logo' =>$faker->imageUrl($width = 253, $height = 86),

    ];
});


$factory->define(App\location::class, function (Faker $faker) {
    return [
        'location_name_ar' => $faker->name,
        'desc_ar' => $faker->text,
        'phone'=>$faker->phoneNumber,
        'location_type'=>$faker->name,
        'lat'=>$faker->latitude($min = -90, $max = 90) ,
        'lng'=>$faker->longitude($min = -180, $max = 180),
        'icon'=>$faker->imageUrl($width = 253, $height = 86),
        'email' =>$faker->email,

    ];
});



$factory->define(App\City::class, function (Faker $faker) {
    return [
        'city_name' =>$faker->city,
        'desc' => $faker->name,
        'value' => $faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),
        'country_id' =>$faker->biasedNumberBetween($min = 1, $max = 10, $function = 'sqrt'),


    ];
});


$factory->define(App\country::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->country,
        'desc_ar' => $faker->text,
        'value' =>$faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),


    ];
});




$factory->define(App\service_point::class, function (Faker $faker) {
    return [
        'name_point' => $faker->name,
        'branch_name' => $faker->city,
        'poin_id'=>$faker->biasedNumberBetween($min = 11, $max = 100),
        'desc_ar'=>$faker->name,
        'phone'=>$faker->phoneNumber,
        'fax'=>$faker->phoneNumber,
        'city_id'=>$faker->biasedNumberBetween($min = 1, $max = 10),


    ];
});

$factory->define(App\ Job::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'requirements' => $faker->text,
        'location'=>$faker-> city,
        'image'=>$faker->imageUrl($width = 253, $height = 86),

    ];
});
