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
    //return view('welcome'); 
    return redirect('/login');
}); 

Route::get('About', function () {
    return 'About-Us';
});
Route::view('welcome-to','welcome');
Route::view('contact','contact-us'); 

Auth::routes(); 

Route::prefix('result')->name('result.')->middleware(['auth'])->group(function() {
 
 
});//end of result routes
   

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/changePassword','UserController@showChangePasswordForm')->name('changePassword');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');
Route::get('logout','Auth\LoginController@userLogout')->name('user.logout');