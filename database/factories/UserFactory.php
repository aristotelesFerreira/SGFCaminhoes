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
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Vehicle::class, function (Faker $faker) {
    static $password;
    return [
        'uuid' => $faker->uuid,
        'mark' => $faker->firstName,
        'model' => $faker->firstName,
        'type' => array_random(['vuc', 'toco', 'truck', 'cavalo mecanico', 'cavalo mecanico trucado', 'bitruck']),
        'km_current' => $faker->randomNumber(),
        'year' => rand(1111,9999),
        'plate' => $faker->randomNumber(),
        'chassis_number' => $faker->randomNumber(),
        'purchase_price' => rand(11111,99999),
        'sale_value' => rand(11111,99999),
        'purchase_date' => array_random(['1997-01-10']),
        'observation' => $faker->streetAddress
    ];
});
