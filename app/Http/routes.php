<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/accounts', function () {
    return App\Account::all();
});

Route::post('/api/accounts', function () {
    return factory(App\Account::class)->create(request()->all());
});

Route::get('/api/movements/', function () {
    return App\Movement::whereUserId(1)
        ->with('account')
        ->orderBy('date', 'desc')
        ->limit(10)
        ->get();
});

Route::post('/api/movements', function () {
    App\User::first()->movements()
        ->save(new App\Movement(request()->all()));
});

Route::patch('/api/movements/{movements}', function ($id) {
    App\Movement::findOrFail($id)->update(request()->all());
});

Route::get('/api/movements/{movements}', function ($id) {
    return App\Movement::find($id);
});

Route::delete('/api/movements/{movements}', function ($id) {
    App\Movement::whereId($id)->delete();
});
