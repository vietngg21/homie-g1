<?php

use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use App\Http\Controllers\TasksController;

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
    return view('listings', [
        'heading' => 'Latest Rental Listings',
        'listings' => Listing::all(),
        'users' => User::all()
    ]);
});

Route::get('/listing/{id}', function ($id) {
   return view('listing', [
       'listing' => Listing::find($id),
//       'user' => DB::table('users')->where('id', $user_id)->get()
   ]);
})->where('id', '[0-9]+');

Route::get('/user/{id}', function ($id) {
    return view('user', [
        'user' => User::find($id),
    ]);
})->where('id', '[0-9]+');

Route::get('/listing_images/', function () {
    return view('images', [
        'images' => Image::all(),
    ]);
})->where('id', '[0-9]+');

Route::get('/index', 'TasksController@helloWorld');
