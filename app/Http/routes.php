<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('api/accounts', 'AccountsController', ['except' => ['create', 'show', 'edit']]);
Route::resource('api/movements', 'MovementsController', ['except' => ['create', 'edit']]);
Route::resource('api/transfers', 'TransfersController', ['only' => 'store']);
