<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Caindo aqui API está funcional.
Route::any('/v1', function () {
    return response()->json(
        [
            'status' => 200,
            'message' => 'api work fine! :)'
        ]
    );
});

Route::post('/v1/login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');

// Product Routes
Route::apiResource('/product', 'ProductController')->except('create', 'edit');

// Rotas Protegidas
Route::middleware('jwt.auth')->prefix('/v1')->group(function () {
    // jwt-auth routes
    Route::post('me', 'AuthController@me');

    // Customer
    Route::prefix('/customer')->group(function () {
        Route::get('/{customer}', 'CustomerController@getCustomer');
    });
});
