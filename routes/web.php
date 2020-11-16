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
    return view('welcome');
});


Route::get('/projects', 'App\Http\Controllers\ProjectsController@index');
Route::post('/projects', 'App\Http\Controllers\ProjectsController@store');

// Route::get('/projects', function () {
//     $projects = App\Models\Project::all();

//     return view('projects.index', compact('projects'));
// });

// Route::post('/projects', function () {
//     // validate

//     // persist
//     App\Models\Project::create(request(['title', 'description']));

//     // redirect

// });
