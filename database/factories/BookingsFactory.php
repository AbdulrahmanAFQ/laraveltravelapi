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
$factory->define(App\Passenger::class,
    function (Faker\Generator $faker) {

        return [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'book_id' => function () {
                return factory(App\Book::class)->create()->id;
            }
        ];
    });

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Book::class, function (Faker\Generator $faker) {

        return [
            'type'           => $type = $faker->randomElement(['One Way', 'Tow Ways']),
            'depart_date'    => $faker->dateTimeBetween('now', '+3 days'),
            'depart_time'    => $faker->time(),
            'return_date'    => $type == 'Tow Ways' ? $faker->dateTimeBetween('+5 days', '+30 days') : null,
            'return_time'    => $type == 'Tow Ways' ? $faker->time() : null,
            'dep_city'       => $faker->city,
            'des_city'       => $faker->city,
            'class'          => $faker->randomElement(['Economy', 'Business', 'First class']),
            'total_adults'   => rand(1, 3),
            'total_children' => rand(0, 5),
        ];
    });