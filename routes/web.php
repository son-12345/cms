<?php
use Illuminate\Support\Facades\DB;
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
Route::get('home', 'App\Http\Controllers\HomeController@showWelcome');
Route::get('about','App\Http\Controllers\AboutController@showDetails');

Route::get('/', function () {
    return view('welcome');
});

Route::get('profile/{name}','App\Http\Controllers\ProfileController@showProfile');

//Route::get('about',function() {
//    return 'About Content';
//});

Route::get('about/directions',function() {
    return'Directions go here';
});

Route::any('submit-form',function() {
    return 'Process Form';
});

Route::get('about/{theSubject}', 'App\Http\Controllers\AboutController@showSubject');

Route::get('about/classes/{theSubject}', function ($theSubject) {
    return " Content on $theSubject ";
});

Route::get('about/classes/{theArt}/{thePrince}',function ($theArt, $thePrince) {
    return "The product: $theArt and $thePrince";
});

Route::get('where', function() {
    return Redirect::route('direction');
});

Route::get('/insert', function (){
    DB::insert('insert into posts(title, body, is_admin) values(?,?,?)', ['PHP with Laravel', 'Laravel is the best framework !',4] );
    return 'DONE';
});

Route::get('/read', function () {
    $result = DB::select('select * from posts where id = ?', [1]);
//    return  $result;
    foreach ($result as $post){
        return $post->body;
    }
});

Route::get('update', function (){
    $update = DB::update('update posts set title = "New Title haha" where id > ?', [1]);
    return $update;
});

Route::get('delete', function () {
    $deleted = DB::delete('delete from posts where id = ?',[3]);
    return $deleted;
});
