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

// Route::get('/', function () {
//     return view('welcome');
// });

//Admin Panel
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index')->name('post.home');

    // Post Page
    Route::prefix('post')->group(function () {
        Route::get('', 'PostsController@show')->name('post.show');      
        Route::get('/create', 'PostsController@create')->name('post.create');
        Route::post('/store', 'PostsController@store')->name('post.store'); 
        Route::delete('/{post}', 'PostsController@delete')->name('post.delete'); 
        Route::get('/edit/{id}', 'PostsController@edit')->name('post.edit'); 
        Route::post('/update/{id}', 'PostsController@update')->name('post.update'); 
    });

    // Image page
    Route::prefix('image')->group(function () {
        Route::get('', 'ImageController@index')->name('image.index');
        Route::get('/create', 'ImageController@create')->name('image.create');
        Route::post('/store', 'ImageController@store')->name('image.store'); 
        Route::delete('/{image}', 'ImageController@delete')->name('image.delete'); 
        Route::get('/edit/{id}', 'ImageController@edit')->name('image.edit'); 
        Route::post('/update/{id}', 'ImageController@update')->name('image.update'); 
    }); 
    
    //Slider Page
    Route::prefix('slider')->group(function () {
        Route::get('', 'SliderController@index')->name('slider.index');
        Route::get('/create', 'SliderController@create')->name('slider.create');
        Route::post('/store', 'SliderController@store')->name('slider.store');
        Route::delete('/{id}', 'SliderController@delete')->name('slider.delete'); 
        Route::get('/edit/{id}', 'SliderController@edit')->name('slider.edit'); 
        Route::post('/update/{id}', 'SliderController@update')->name('slider.update');  
    });   

    });


//Front End Panel
Route::get('/', 'FrontEndController@home')->name('frontend.home'); 
Route::get('page/{page}', 'FrontEndController@single_page')->name('frontend.single'); 


