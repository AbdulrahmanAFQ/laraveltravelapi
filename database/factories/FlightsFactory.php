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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Airline::class, function (Faker\Generator $faker) {

    return [
        'name'    => $faker->company,
        'city'      => $faker->city,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Flight::class, function (Faker\Generator $faker) {

    return [
        'from_date'    => $faker->dateTimeBetween('- 1 year', 'now'),
        'to_date'      => $faker->dateTimeBetween('now', '+30 months'),
        'flight_time'  => $faker->time(),
        'arrival_time' => $faker->time(),
        'dep_city'     => $faker->city,
        'des_city'     => $faker->city,
        'airline_id'   => function () {
            return factory(App\Airline::class)->create()->id;
        },
        'price'        => $faker->numberBetween(10000, 50000),
    ];
});
