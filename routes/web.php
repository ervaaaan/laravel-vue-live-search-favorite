<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

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

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\CompaniesController::class, 'index']);

Route::post('favorite/{company}', [App\Http\Controllers\CompaniesController::class, 'favorite']);
Route::post('unfavorite/{company}', [App\Http\Controllers\CompaniesController::class, 'unfavorite']);

Route::get('my_favorites', [App\Http\Controllers\UsersController::class, 'myFavorites']);

Route::get('companies/{search}', function($search) {
    if ($search == 'all') {
        return Company::all();
    } else {
        return Company::where('name', 'like', "%{$search}%")->get();
    }
});
