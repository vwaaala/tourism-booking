<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Bunker\TourismBooking\Http\Controllers', 'as' => 'tourism-booking.'], function () {
    Route::get('regions', 'RegionController@index')->name('index');
    Route::post('regions/store', 'RegionController@store')->name('store');
});
