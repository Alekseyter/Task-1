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

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
    Route::get('/filter', 'FilterController')->name('main.filter');
    Route::get('/sort-name', 'FilterController@sortName')->name('main.filter.sortName');
    Route::get('/sort-price-down', 'FilterController@sortPriceDown')->name('main.filter.sortPriceDown');
    Route::get('/sort-price-up', 'FilterController@sortPriceUp')->name('main.filter.sortPriceUp');

    Route::group(['prefix' => 'fertilizers'], function () {
        Route::get('/{fertilizer}', 'ShowController')->name('main.fertilizer.show');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    Route::group(['namespace' => 'Cultures', 'prefix' => 'cultures'], function () {
        Route::get('/', 'IndexController')->name('admin.culture.index');
        Route::post('/', 'StoreController')->name('admin.culture.store');
        Route::get('/{culture}/edit', 'EditController')->name('admin.culture.edit');
        Route::patch('/{culture}', 'UpdateController')->name('admin.culture.update');
        Route::delete('/{culture}', 'DeleteController')->name('admin.culture.delete');

        Route::get('/trash/deleted', 'TrashController')->name('admin.culture.trash');
    });

    Route::group(['namespace' => 'Fertilizers', 'prefix' => 'fertilizers'], function () {
        Route::get('/', 'IndexController')->name('admin.fertilizer.index');
        Route::post('/', 'StoreController')->name('admin.fertilizer.store');
        Route::get('/{fertilizer}', 'ShowController')->name('admin.fertilizer.show');
        Route::get('/{fertilizer}/edit', 'EditController')->name('admin.fertilizer.edit');
        Route::patch('/{fertilizer}', 'UpdateController')->name('admin.fertilizer.update');
        Route::delete('/{fertilizer}', 'DeleteController')->name('admin.fertilizer.delete');

        Route::get('/trash/deleted', 'TrashController')->name('admin.fertilizer.trash');
    });

    Route::group(['namespace' => 'Clients', 'prefix' => 'clients'], function () {
        Route::get('/', 'IndexController')->name('admin.client.index');

        Route::get('/filter', 'FilterController')->name('admin.client.filter');
        Route::get('/sort-name', 'FilterController@sortName')->name('admin.client.filter.sortName');
        Route::get('/sort-price-down', 'FilterController@sortPriceDown')->name('admin.client.filter.sortPriceDown');
        Route::get('/sort-price-up', 'FilterController@sortPriceUp')->name('admin.client.filter.sortPriceUp');

        Route::get('/create', 'CreateController')->name('admin.client.create');
        Route::post('/', 'StoreController')->name('admin.client.store');
        Route::get('/{client}', 'ShowController')->name('admin.client.show');
        Route::get('/{client}/edit', 'EditController')->name('admin.client.edit');
        Route::patch('/{client}', 'UpdateController')->name('admin.client.update');
        Route::delete('/{client}', 'DeleteController')->name('admin.client.delete');

        Route::get('/trash/deleted', 'TrashController')->name('admin.client.trash');
    });

    Route::group(['namespace' => 'Users', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');

        Route::get('/trash/deleted', 'TrashController')->name('admin.user.trash');
    });
});


Auth::routes();

