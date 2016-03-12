<?php
use App\job;
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

//The routes for views/pages using the functions inside PagesController


// if user logged in show home and message saying you already logged in


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


// route to what admin can access 







//Route::resource('jobs', 'jobsController');

// ********************************************** to check 



Route::group(['middleware' => 'user'], function () {
    Route::auth();
    //Route::get('/home', 'HomeController@index');
    Route::get('/jobs', 'jobsController@redirect_to_index');
    Route::get('/jobs/index', 'jobsController@index');
    Route::get('design','PagesController@design');
    Route::get('/jobs/show/{id}', 'jobsController@show');
    Route::get('/', 'PagesController@home');
    Route::get('restricted','PagesController@restricted');
    Route::get('/home', 'HomeController@index');
});

    //Route::resource('admin', 'IsAdmin');
Route::group(['middleware' => 'admin'], function()
{
    //Route::auth();
    Route::get('/admin', function()
    {
        return view('admin.admin'); // can only access this if type == A
    });

    Route::get('/jobs/create', [
    'middleware' => 'admin',
    'uses'       => 'jobsController@create',
    ]);
    // update the job
    Route::post('/jobs/edit', [
    'middleware' => 'admin',
    'uses'       => 'jobsController@update',
    ]);

    // DELETE
    Route::delete('/jobs/delete/{id}', [
        'middleware' => 'admin',
        'uses'       => 'jobsController@destroy',
    ]);
    // edit job
    Route::get('/jobs/edit/{id}', 'jobsController@edit');


    // store the job
    Route::post('/jobs/store', [
        'middleware' => 'admin',
        'uses'       => 'jobsController@store',
    ]);

});

Route::group(['middleware' => 'business'], function()
{
    //Route::auth();
    Route::get('/business', function()
    {
        return view('manager.biz'); // can only access this if type == A
    });
    Route::get('business','PagesController@business');


});