<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/retrieve_db_table',[DatabaseController::class, 'retrieve_db_table']);

Route::view('/Group', 'group.group');
Route::get('/Cement_Group-create', function () {return view('group.create');});
Route::get('/db_cement_group_table',[DatabaseController::class, 'db_cement_group_table']);

Route::view('/Company', 'company.company');
Route::get('/Cement_Company-create', function () {return view('company.create');});
Route::get('/db_cement_company_table',[DatabaseController::class, 'db_cement_company_table']);

Route::view('/Plant','plant.plant');
Route::get('/Cement_Plant-create', function () {return view('plant.create');});
Route::get('/db_cement_plant_table',[DatabaseController::class, 'db_cement_plant_table']);

Route::view('/Plant_Type','plant_type.plant_type');
Route::get('/Cement_Plant_Type-create', function () {return view('plant_type.create');});
Route::get('/db_cement_plant_type_table',[DatabaseController::class, 'db_cement_plant_type_table']);

Route::view('/Map1','map.map1');
Route::view('/Map2','map.map2');
Route::get('/retrieve_db_group_cnt_table',[DatabaseController::class, 'retrieve_db_group_cnt_table']);
Route::get('/retrieve_db_plant_loc_stgr_table',[DatabaseController::class, 'retrieve_db_plant_loc_stgr_table']);
Route::get('/retrieve_db_plant_det_loc_table',[DatabaseController::class, 'retrieve_db_plant_det_loc_table']);
//Route::get('/retrieve_db_plant_loc_site_table',[DatabaseController::class, 'retrieve_db_plant_loc_site_table']);
