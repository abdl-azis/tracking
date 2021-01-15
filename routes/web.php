<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContractsController;
//use App\Http\Controllers\Contract_docController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\OperationalsController;
use App\Http\Controllers\Progress_statusController;

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

// Route::get('/', function () {
//     return view('welcome');

Route:: view('/operationals','v_operational');
Route::resource('/',ClientsController::class);
Route::resource('/contracts',ContractsController::class);
Route::get('/contracts/{contract}/ammend', [ContractsController::class, 'ammend']);
Route::put('/contracts/{contract}', [ContractsController::class, 'upammend']);
Route::post('/contract_doc/{contract_doc}', [ContractsController::class, 'destroyDoc']);

Route::resource('/projects', ProjectsController::class);
Route::get('/projects/{project}/ammend', [ProjectsController::class, 'ammend']);
Route::put('/projects/{project}', [ProjectsController::class, 'upammend']);
Route::post('/progress_item/{progress_item}', [ProjectsController::class, 'destroyItem']);
Route::post('/project_cost/{project_cost}', [ProjectsController::class, 'destroyCost']);

Route::resource('/operationals', OperationalsController::class);
Route::post('/progress_doc', [OperationalsController::class, 'uploadProgress']);
Route::get('/changestatus/{changestatus}', [OperationalsController::class, 'changeStatus']);
Route::get('/progress_doc/{progress_doc}', [OperationalsController::class, 'destroyDoc']);

Route::resource('/progress_status', Progress_statusController::class);