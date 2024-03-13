<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Bunker\TourismBooking\Http\Controllers\Admin', 'middleware' => ['auth', 'web'], 'as' => 'tourism-booking.'], function () {
    Route::get('regions', 'RegionController@index')->name('regions.index');
    Route::get('regions/create', 'RegionController@create')->name('regions.create');
    Route::post('regions/store', 'RegionController@store')->name('regions.store');
    Route::get('regions/edit/{slug}', 'RegionController@edit')->name('regions.edit');
    Route::post('regions/update/{slug}', 'RegionController@store')->name('regions.update');
    Route::post('regions/delete/{slug}', 'RegionController@store')->name('regions.delete');
});
