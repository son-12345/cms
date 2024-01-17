<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'HomeController@showWelcome');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('about',function() {
    return 'Hello World';
});

Route::get('about/directions',function() {
    return'Directions go here';
});

Route::any('submit-form',function() {
    return 'Process Form';
});

Route::get('about/{theSubject}',function ($theSubject) {
    return $theSubject. ' content goes here';
});

Route::get('about/classes/{theSubject}', function ($theSubject) {
    return " Content on $theSubject ";
});

Route::get('about/classes/{theArt}/{thePrince}',function ($theArt, $thePrince) {
    return "The product: $theArt and $thePrince";
});

Route::get('where', function() {
    return Redirect::route('direction');
});

Route::get('/showWelcome', [HomeController::class, 'showWelcome']);
Route::get('/user/{id}', [TestController::class, 'show']);
