<?php

use Illuminate\Http\Request;

// Create Airline company
Route::post('/airline', [ 'uses' => 'FlightController@postAirline']);

// Create airline flight
Route::post('/flight', [ 'uses' => 'FlightController@postFlight']);

// Get airline flight list
Route::get('/flights', [ 'uses' => 'FlightController@getFlights']);

// Book a flight
Route::post('/flight/book', [ 'uses' => 'FlightController@postBookFlight']);

// Update airline flight
Route::patch('/flight/{id}', [ 'uses' => 'FlightController@putFlight']);

// Delete airline flight
Route::delete('/flight/{id}', [ 'uses' => 'FlightController@deleteFlight']);