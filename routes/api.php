<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentsapicontroller;
use App\Models\address;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/index', [studentsapicontroller::class, 'index'])->name('studentsapi.index');
Route::post('/index',[studentsapicontroller::class,'store']);
Route::get('/index/{id}',[studentsapicontroller::class ,'show']);
Route::delete('/index/{id}',[studentsapicontroller::class ,'destroy']);
Route::put('/index/{id}',[studentsapicontroller::class ,'update']);

// add address url
Route::post('/index/address/{id}',[studentsapicontroller::class,'storeAddress']);
//show student address
Route::get('/address',[studentsapicontroller::class,'viewalladdress']);
//delete url
Route::delete('/index/address/{id}',[studentsapicontroller::class,'deleteStudentAddressById']);
//update url
Route::put('/index/address/{id}',[studentsapicontroller::class ,'updateStudentAddressById']);





