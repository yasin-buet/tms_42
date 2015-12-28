<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/language/{language}', function ($language) {
    Session::put('language', $language);
    return redirect('/auth/login');
});
Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth'], function() {
    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
    Route::get('register', 'AuthController@getRegister');
    Route::post('register', 'AuthController@postRegister');
});
Route::get('/home', function () {
    if (\Auth::user()->role) {
        return view('supervisor.home');
    } else {
        return view('trainee.home');
    }
});
Route::group(['prefix' => 'supervisor', 'namespace' => 'Supervisor', 'middleware' => ['auth', 'supervisor']], function() {
    Route::resource('courses', 'CoursesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('users', 'UsersController');
    Route::resource('subjects.tasks', 'SubjectsTasksController');
    Route::resource('course.users', 'CourseUsersController');
});
Route::group(['prefix' => 'trainee', 'namespace' => 'Trainee', 'middleware' => 'auth'], function() {
    Route::resource('users', 'UsersController');
    Route::resource('courses', 'CoursesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('reports', 'ReportsController');
    Route::resource('tasks', 'TasksController');
});
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));
