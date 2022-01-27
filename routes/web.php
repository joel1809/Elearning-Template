<?php

use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', 'MainController@home')->name('main.home');



Auth::routes();
Route::get('/logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
/* courses */
Route::get('/courses', 'CoursesControlle@courses')->name('courses.index');
Route::get('/courses/{slug}', 'CoursesControlle@course')->name('courses.show');
/* la vue formateur */

Route::get('/instructor/overview', 'InstructorController@index')->name('instructor.index');;
Route::get('/instructor/new', 'InstructorController@create')->name('instructor.create');
Route::post('/instructor/store', 'InstructorController@store')->name('instructor.store');
Route::get('/instrutor/courses/{id}/edit', 'InstructorController@edit')->name('instructor.edit');
Route::put('/instructor/courses/{id}/update', 'InstructorController@update')->name('instructor.update');
Route::get('/instructor/courses/{id}/destroy', 'InstructorController@destroy')->name('instructor.destroy');
Route::get("/instructor/courses/{id}/publish", "InstructorController@publish")->name('instructor.publush');

/* tarification */
Route::get('/instructor/courses{id}/pricing', 'PricingController@pricing')->name('pricing.index');
Route::post('/instructor/courses/{id}/pricing/store', 'PricingController@store')->name('pricing.store');

/* le plan du cours */

Route::get('/instructor/courses/{id}/curriculum', 'CurriculumController@index')->name('instructor.curriculum.index');
Route::get('/instructor/courses/{id}/curriculum/add', 'CurriculumController@create')->name('instructor.curriculum.create');
Route::post('/instructor/courses/{id}/curriculum/store', 'CurriculumController@store')->name('instructor.curriculum.store');
Route::get('/instructor/courses/{id}/curriculum/{section}/edit', 'CurriculumController@edit')->name('instructor.curriculum.edit');
Route::put('/instructor/courses/{id}/curriculum/{section}/update', 'CurriculumController@update')->name('instructor.curriculum.update');
Route::get('/instructor/courses/{id}/curriculum/{section}/destroy', 'CurriculumController@destroy')->name('instructor.curriculum.destroy');

/* cart */

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{id}/store', 'CartController@store')->name('cart.store');
Route::get('/cart/{id}/destroy', 'CartController@destroy')->name('cart.destroy');
Route::get('/cart/clear', 'CartController@clear')->name('cart.clear');

/* wishlist */
Route::get('/wishlist/{id}/store', 'WishlistController@store')->name('wishlist.store');
Route::get('/wishlist/{id}/destroy', 'WishlistController@destroy')->name('wishlist.destroy');
Route::get('/wishlist/{id}/toCart', 'WishlistController@toCart')->name('wishlist.toCart');
Route::get('/wishlist/{id}/toWishList', 'WishlistController@toWishList')->name('wishlist.toWishList');

/* checkout */
Route::get('checkout', function () {
    return view('checkout.payment');
})->name('checkout.payment');
