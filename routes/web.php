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
    ('App\Http\Controllers\Admin\DashboardController@index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin');

    Route::prefix('scholarships')->group(function () {
        Route::get('/', [
            'as' => 'scholarships.index',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@index'
        ]);

        Route::get('/create', [
            'as' => 'scholarship.create',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@create'
        ]);
        Route::post('/create', [
            'as' => 'scholarship.store',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'scholarship.edit',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'scholarship.update',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'scholarship.delete',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@delete'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'scholarship.delete',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@delete'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'scholarship.detail',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@detail'
        ]);
    });

    Route::prefix('jobs')->group(function () {
        Route::get('/', [
            'as' => 'jobs.index',
            'uses' => 'App\Http\Controllers\Admin\JobController@index'
        ]);

        Route::get('/create', [
            'as' => 'job.create',
            'uses' => 'App\Http\Controllers\Admin\JobController@create'
        ]);
        Route::post('/create', [
            'as' => 'job.store',
            'uses' => 'App\Http\Controllers\Admin\JobController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'job.edit',
            'uses' => 'App\Http\Controllers\Admin\JobController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'job.update',
            'uses' => 'App\Http\Controllers\Admin\JobController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'job.delete',
            'uses' => 'App\Http\Controllers\Admin\JobController@delete'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'job.delete',
            'uses' => 'App\Http\Controllers\Admin\JobController@delete'
        ]);
    });

});

Route::prefix('/')->group(function () {

    Route::prefix('scholarships')->group(function () {
        Route::get('/', [
            'as' => 'client.scholarships.index',
            'uses' => 'App\Http\Controllers\Client\ScholarshipController@index'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'scholarship.detail',
            'uses' => 'App\Http\Controllers\Admin\ScholarshipController@detail'
        ]);
    });

    Route::prefix('jobs')->group(function () {
        Route::get('/', [
            'as' => 'jobs.index',
            'uses' => 'App\Http\Controllers\Admin\JobController@index'
        ]);

        Route::get('/create', [
            'as' => 'job.create',
            'uses' => 'App\Http\Controllers\Admin\JobController@create'
        ]);
        Route::post('/create', [
            'as' => 'job.store',
            'uses' => 'App\Http\Controllers\Admin\JobController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'job.edit',
            'uses' => 'App\Http\Controllers\Admin\JobController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'job.update',
            'uses' => 'App\Http\Controllers\Admin\JobController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'job.delete',
            'uses' => 'App\Http\Controllers\Admin\JobController@delete'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'job.delete',
            'uses' => 'App\Http\Controllers\Admin\JobController@delete'
        ]);
    });

});

Route::get('/login', 'App\Http\Controllers\AuthController@login');
