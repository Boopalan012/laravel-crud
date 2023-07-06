<?php

use App\Http\Controllers\studentscontroller;
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
//add student form 
Route::get('/create', function () {
    return view('create');
});

//get all ->first index page
Route::get('/index', [studentscontroller::class, 'index'])->name('students.index');

//insert route
Route::post('/index', [studentscontroller::class, 'store'])->name('students.store');

//delete route
Route::delete('/index/{id}', [studentscontroller::class, 'destroy'])->name('students.delete');

//update get object with id
Route::get('index/{id}', [studentscontroller::class, 'edit'])->name('students.update');

//update route
Route::post('updated/{id}', [studentscontroller::class, 'update'])->name('students.updated');

Route::get('/index/{name}',[studentscontroller::class,'index'])->name('students.query');