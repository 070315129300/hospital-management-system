<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class,'index']);


//Route::get('/dashboard',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/dashboard',[HomeController::class,'redirect']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add_doctor_view',[AdminController::class,'adddocview']);

Route::POST('/upload_doctor',[AdminController::class,'uploaddocpix']);

Route::POST('/appointment',[HomeController::class,'appointment']);
Route::get('/myappointment',[HomeController::class,'myappointment']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/showappointment',[AdminController::class,'showappointment']);
Route::get('/approved/{id}',[AdminController::class,'approvepatient']);
Route::get('/canceled/{id}',[AdminController::class,'cancelpatient']);
Route::get('/showdoctors',[AdminController::class,'showdoctor']);
Route::get('/delete/{id}',[AdminController::class,'deletedoctor']);
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor']);
Route::get('/edit_doctor/{id}',[AdminController::class,'edit_doctor']);
Route::get('/sendmail/{id}',[AdminController::class,'mailview']);
Route::post('/sendemail/{id}',[AdminController::class,'sendemail']);



