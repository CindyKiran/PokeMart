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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
] );


Route::get('/signup', [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup',
    'middleware' => 'guest'
]);

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });
    
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);
        
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);
    });
});

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceQty',
    'as' => 'product.reduceQty'
]);

Route::get('/increase/{id}', [
    'uses' => 'ProductController@getIncreaseQty',
    'as' => 'product.increaseQty'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.removeItem'
]);

Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);

Route::get('/checkout',[
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
]);

Route::get('/payment',[
    'uses' => 'ProductController@paid',
    'as' => 'payment'
]);