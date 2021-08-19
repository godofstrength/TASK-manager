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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->name('home');
Route::post('/createCompany', [App\Http\Controllers\HomeController::class, 'createCompany']);
Route::get('/company/{company}', [App\Http\Controllers\CompanyController::class, 'index']);
Route::post('/{company}/createdept', [App\Http\Controllers\Companycontroller::class, 'createDepartment']);
Route::get('/department/{department}', [App\Http\Controllers\DepartmentController::class, 'index']);
Route::post('/{department}/create-project', [App\Http\Controllers\DepartmentController::class, 'createproject']);
Route::get('/project/{project}', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.show');
Route::post('/{project}/create-module', [App\Http\Controllers\ProjectController::class, 'createModule']);
Route::get('/{module}/tasks', [App\Http\Controllers\ModuleController::class, 'index']);
Route::post('/{module}/create-task', [App\Http\Controllers\ModuleController::class, 'createTask']);
Route::get('/delete/{task}', [App\Http\Controllers\ModuleController::class, 'deleteTask']);
Route::get('/start/{task}', [App\Http\Controllers\ModuleController::class, 'startTask']);
Route::get('/completeTask/{task}', [App\Http\Controllers\ModuleController::class, 'completeTask']);
Route::get('/company/{company}/members', [App\Http\Controllers\CompanyController::class, 'members']);
Route::post('/company/{company}/invite', [App\Http\Controllers\CompanyController::class, 'inviteMember']);
Route::get('/company/{company}/projects', [App\Http\controllers\ProjectController::class, 'allProjects']);