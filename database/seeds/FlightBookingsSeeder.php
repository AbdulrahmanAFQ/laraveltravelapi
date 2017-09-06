<?php

use Illuminate\Database\Seeder;

class FlightBookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airlines = collect(factory(\App\Airline::class, 10)->create());

        $airlines->each(function ($airline) {
            factory(\App\Flight::class, rand(5, 20))->create(['airline_id' => $airline->id]);
        });

//        $airlinesIds = \App\Airline::pluck('id');

        $bookings = collect(factory(\App\Book::class, 100)->create());

        $bookings->each(function ($booking) {
            factory(
                \App\Passenger::class,
                $booking->total_adults + $booking->total_children
            )->create([
                'book_id' => $booking->id
            ]);
        });
    }
}
