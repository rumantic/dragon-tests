<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $anyModel = new \Sitebill\Dragon\app\Models\AnyModel();
    //$anyModel->setTable('data');
    $anyModel->setTable('data');
    //$anyModel->setTable('migrations');


    //$record = $anyModel->where('client_id', 18)->first();
    $record = $anyModel->take(3)->get();

    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tests/load_data', [App\Http\Controllers\OldModelController::class, 'load_data'])->name('load_data');
