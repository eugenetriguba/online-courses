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

Route::get('/', function () {
    return view('welcome');
});

/*
 * Route conventions
 *
 * GET    /projects        (index)   (show all projects)
 * GET    /projects/create (create)  (show a form to create a project)
 * GET    /projects/1      (show)    (show a single project)
 * POST   /projects        (store)   (persistently store a project)
 * GET    /projects/1/edit (edit)    (show a form to edit a project)
 * PATCH  /projects/1      (update)  (update project of id of 1)
 * DELETE /projects/1      (destroy) (delete the project with an id of 1)
 */

Route::resource('projects', 'ProjectsController');

//Route::get('/projects',                  'ProjectsController@index');
//Route::get('/projects/create',           'ProjectsController@create');
//Route::get('/projects/{projectId}',      'ProjectsController@show');
//Route::post('/projects',                 'ProjectsController@store');
//Route::get('/projects/{projectId}/edit', 'ProjectsController@edit');
//Route::patch('/projects/{projectId}',    'ProjectsController@update');
//Route::delete('/projects/{projectId}',   'ProjectsController@destroy');