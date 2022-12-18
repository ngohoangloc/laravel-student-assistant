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

Route::get('/', 'App\Http\Controllers\Client\HomeController@index');


Route::prefix('admin')->middleware(\App\Http\Middleware\CheckAdmin::class)->group(function () {
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

    Route::prefix('motels')->group(function () {
        Route::get('/', [
            'as' => 'motels.index',
            'uses' => 'App\Http\Controllers\Admin\MotelController@index'
        ]);

        Route::get('/create', [
            'as' => 'motel.create',
            'uses' => 'App\Http\Controllers\Admin\MotelController@create'
        ]);
        Route::post('/create', [
            'as' => 'motel.store',
            'uses' => 'App\Http\Controllers\Admin\MotelController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'motel.edit',
            'uses' => 'App\Http\Controllers\Admin\MotelController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'motel.update',
            'uses' => 'App\Http\Controllers\Admin\MotelController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'motel.delete',
            'uses' => 'App\Http\Controllers\Admin\MotelController@delete'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'motel.detail',
            'uses' => 'App\Http\Controllers\Admin\MotelController@detail'
        ]);
    });

    Route::prefix('edu-centers')->group(function () {
        Route::get('/', [
            'as' => 'edu_centers.index',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@index'
        ]);

        Route::get('/create', [
            'as' => 'edu_center.create',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@create'
        ]);
        Route::post('/create', [
            'as' => 'edu_center.store',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'edu_center.edit',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'edu_center.update',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'edu_center.delete',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@delete'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'edu_center.detail',
            'uses' => 'App\Http\Controllers\Admin\EduCenterController@detail'
        ]);
    });

    Route::prefix('dining-venues')->group(function () {
        Route::get('/', [
            'as' => 'dining_venues.index',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@index'
        ]);

        Route::get('/create', [
            'as' => 'dining_venue.create',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@create'
        ]);
        Route::post('/create', [
            'as' => 'dining_venue.store',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'dining_venue.edit',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'dining_venue.update',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'dining_venue.delete',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@delete'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'dining_venue.detail',
            'uses' => 'App\Http\Controllers\Admin\DiningVenueController@detail'
        ]);
    });

    Route::prefix('tourist-places')->group(function () {
        Route::get('/', [
            'as' => 'tourist_places.index',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@index'
        ]);

        Route::get('/create', [
            'as' => 'tourist_place.create',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@create'
        ]);
        Route::post('/create', [
            'as' => 'tourist_place.store',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'tourist_place.edit',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@edit'
        ]);
        Route::post('/edit/{id}', [
            'as' => 'tourist_place.update',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'tourist_place.delete',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@delete'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'tourist_place.detail',
            'uses' => 'App\Http\Controllers\Admin\TouristPlaceController@detail'
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
            'uses' => 'App\Http\Controllers\Client\ScholarshipController@detail'
        ]);

        Route::post('/comment', [
            'as' => 'comments.store',
            'uses' => 'App\Http\Controllers\Client\CommentController@store'
        ])->middleware(\App\Http\Middleware\Auth::class);
    });

    Route::prefix('jobs')->group(function () {
        Route::get('/', [
            'as' => 'client.jobs.index',
            'uses' => 'App\Http\Controllers\Client\JobController@index'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'job.detail',
            'uses' => 'App\Http\Controllers\Client\JobController@detail'
        ]);

        Route::post('/comment', [
            'as' => 'comments.store',
            'uses' => 'App\Http\Controllers\Client\CommentController@store'
        ])->middleware(\App\Http\Middleware\Auth::class);
    });
    Route::prefix('motels')->group(function () {
        Route::get('/', [
            'as' => 'client.motels.index',
            'uses' => 'App\Http\Controllers\Client\MotelController@index'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'motel.detail',
            'uses' => 'App\Http\Controllers\Client\MotelController@detail'
        ]);

        Route::post('/comment', [
            'as' => 'comments.store',
            'uses' => 'App\Http\Controllers\Client\CommentController@store'
        ])->middleware(\App\Http\Middleware\Auth::class);
    });

    Route::prefix('edu-centers')->group(function () {
        Route::get('/', [
            'as' => 'edu_center.index',
            'uses' => 'App\Http\Controllers\Client\EduCenterController@index'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'edu_center.detail',
            'uses' => 'App\Http\Controllers\Client\EduCenterController@detail'
        ]);

        Route::post('/comment', [
            'as' => 'comments.store',
            'uses' => 'App\Http\Controllers\Client\CommentController@store'
        ])->middleware(\App\Http\Middleware\Auth::class);
    });

    Route::prefix('dining-venues')->group(function () {
        Route::get('/', [
            'as' => 'client.dining_venue.index',
            'uses' => 'App\Http\Controllers\Client\DiningVenueController@index'
        ]);
        Route::get('/detail/{id}', [
            'as' => 'client.dining_venue.detail',
            'uses' => 'App\Http\Controllers\Client\DiningVenueController@detail'
        ]);
    });

    Route::prefix('tourist-places')->group(function () {
        Route::get('/', [
            'as' => 'client.tourist_place.index',
            'uses' => 'App\Http\Controllers\Client\TouristPlaceController@index'
        ]);

        Route::get('/detail/{id}', [
            'as' => 'client.tourist_place.detail',
            'uses' => 'App\Http\Controllers\Client\TouristPlaceController@detail'
        ]);
    });
});

Route::get('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/login', 'App\Http\Controllers\AuthController@checkLogin')->name('auth.login');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');
Route::get('/register', 'App\Http\Controllers\AuthController@showRegister');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('/showMajorsInCollege', 'App\Http\Controllers\AuthController@showMajorsInCollege');

Route::get('search-scholarship', 'App\Http\Controllers\SearchController@searchScholarship')->name('search.scholarship');
Route::get('search-edu-center', 'App\Http\Controllers\SearchController@searchEduCenter')->name('search.edu_center');
Route::get('search-motel', 'App\Http\Controllers\SearchController@searchMotel')->name('search.motel');
Route::get('search-job', 'App\Http\Controllers\SearchController@searchJob')->name('search.job');
