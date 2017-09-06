<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Airline;
use App\Book;
use App\Passenger;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function postAirline(Request $request)
    {
        $airline = new Airline();
        $airline->name = $request->input('name');
        $airline->city = $request->input('city');
        $airline->save();

        return response()->json(['message' => 'Airline company was created'], 201);
    }

    public function postBookFlight(Request $request)
    {
        // Bring the booking infromation
        $book = new Book();
        $book->type = $request->input('type');
        $book->depart_date = $request->input('depart_date');
        $book->depart_time = $request->input('depart_time');
        $book->return_date = $request->input('return_date');
        $book->return_time = $request->input('return_time');
        $book->dep_city = $request->input('dep_city');
        $book->des_city = $request->input('des_city');
        $book->class = $request->input('class');
        $book->total_adults = $request->input('total_adults');
        $book->total_children = $request->input('total_children');
        $book->save();

        // Bring the Passengers infromation
        $passengers = $book->passengers()->createMany($request->input('passengers'));

        return response()->json(
            [
                'booking' => $book,
                'passengers' => $passengers,
            ], 201);
    }

    public function postFlight(Request $request)
    {
        $flight = new Flight();
        $flight->from_date = $request->input('from_date');
        $flight->to_date = $request->input('to_date');
        $flight->flight_time = $request->input('flight_time');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->dep_city = $request->input('dep_city');
        $flight->des_city = $request->input('des_city');
        $flight->airline_id = $request->input('airline_id');
        $flight->price = $request->input('price');
        $flight->save();

        return response()->json(['flight' => $flight], 201);
    }

    public function getFlights()
    {
        $flight = Flight::all();
        $response = [
            'flight' => $flight
        ];
        return response()->json($response, 200);
    }

    public function putFlight(Request $request, $id)
    {
        $flight = Flight::find($id);
        if (!$flight) {
            return response()->json(['message' => 'Flight not found'], 404);
        }
        $flight->from_date = $request->input('from_date');
        $flight->to_date = $request->input('to_date');
        $flight->flight_time = $request->input('flight_time');
        $flight->arrival_time = $request->input('arrival_time');
        $flight->dep_city = $request->input('dep_city');
        $flight->des_city = $request->input('des_city');
        $flight->airline_id = $request->input('airline_id');
        $flight->price = $request->input('price');
        $flight->save();

        return response()->json(['flight' => $flight], 200);
    }

    public function deleteFlight($id)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return response()->json(['message' => 'Flight deleted'], 404);
    }
}
