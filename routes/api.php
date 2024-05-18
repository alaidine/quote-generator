<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Quote;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/quotes/all', function () {
    foreach (Quote::all() as $quote) {
        echo $quote->text . '<br>';
    }
    return Quote::all();
});

Route::post('/quotes/create', function (Request $request) {
    return Quote::create([
        'content' => $request->content,
        'author' => $request->author,
    ]);
});

Route::delete('/quotes/clear', function () {
    Quote::truncate();
    return 'Quotes cleared';
});

Route::get('/quotes/delete/{id}', function ($id) {
    Quote::where('id', $id)->delete();
    return 'Quote deleted';
});
