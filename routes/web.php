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

Route::get('/', 'ProductsController@index');
Route::post('/', 'ProductsController@store')->name('product.store');
Route::get('products', 'ProductsController@lists')->name('product.list');
Route::prefix('product')->name('product.')->group(function(){
    Route::prefix('{product_id}')->group(function(){
        Route::get('/', 'ProductsController@detail')->name('detail');
        Route::post('comment', 'ProductsController@storeComment')->name('comment.store');
        Route::post('comment/{comment_id}/upvote', 'ProductsController@storeUpvote')->name('comment.upvote');
        Route::post('comment/{comment_id}/downvote', 'ProductsController@storeDownvote')->name('comment.downvote');
    });
});
