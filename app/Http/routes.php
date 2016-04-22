<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('design', 'HomeController@design');



Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


    Route::auth();


    // route resource everything about job, include add, delete, edit, update, store, index - all function in Jobs controller
    Route::resource('job', 'jobsController');

    Route::get('job/assign/{id}', 'jobsController@assignIndex');
    Route::post('job/assign/{id}', 'jobsController@assign');
    
    Route::post('job/{id}', 'jobsController@apply');

    Route::get('job/approve', 'jobsController@approveIndex');
    Route::post('job/approve/{id}', 'jobsController@approve'); //single approve from view 
    Route::post('job/approve', 'jobsController@approveAll');		 // multi approve



    Route::get('myjobs', 'jobsController@myjobs');

    Route::get('/home', 'HomeController@index');
    Route::resource('admin/users', 'UserController');

