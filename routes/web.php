<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\Contract_docController;

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
// });
// Route::get('/test', function () {
//     return view('v_home');
// });


Route:: view('/projects','v_create_project');
//Route:: view('/operationals','contracts.v_index');
Route:: view('/operationals','v_operational');
Route::resource('/',ClientsController::class);
Route::resource('/contracts',ContractsController::class);
Route::get('/contracts/{contract}/ammend', [ContractsController::class, 'ammend']);
Route::put('/contracts/{contract}', [ContractsController::class, 'upammend']);
//Route::delete('/contracts/{contract}/filedelete', [ContractsController::class, 'deletefile']);
Route::post('/contract_doc/{contract_doc}', [ContractsController::class, 'destroyDoc']);