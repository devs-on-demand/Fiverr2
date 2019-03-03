<?php

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Test Routes
Route::get('/subscriptionbeta',function(){
    return view('Test.test');
})->name('subscriptionbeta');
Route::get('/render',function(){
    return view('Test.render');
});
Route::get('/frontend',function(){
    return view('layouts.master');
});
Route::post('/saveform','FormController@saveForm')->name('saveform');
Route::get('/getData','FormController@getFormDetails')->name('getFormDetails');
// Test Routes End

Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function(){
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    // Subscription Form Routes
    Route::get('/createform',function(){
        return view('admin.createform');
    })->name('createform');
    Route::get('/viewform',function(){
        return view('admin.viewform');
    })->name('viewform');

    // Event View Routes
    Route::get('/createevent',function(){
        return view('admin.createevent');
    })->name('createevent');
    Route::get('/viewevents',function(){
        return view('viewevent');
    })->name('viewevents');

    // Events CRUD Routes
    Route::post('/createevent','EventController@createEvent')->name('addevent');
    Route::get('/geteventdetails','EventController@getEventDetails')->name('geteventdetails');
    
    // Program View Routes
    Route::get('/createprogram',function(){
        return view('admin.creatprogram');
    })->name('createprogram');
    Route::get('/viewprograms',function(){
        return view('viewprograms');
    })->name('viewprograms');
});