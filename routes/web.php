<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\Projectcontroller;
use App\Http\Controllers\Resultcontroller;
use App\Http\Controllers\Subjectcontroller;

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

// Define a route group with middleware 'isloggedin'
Route::middleware(['isloggedin'])->group(function () {

    // These routes will only be accessible if the user is logged in
    Route::get('profile', [Logincontroller::class, 'profile']);
    Route::get('/form', [Projectcontroller::class, 'form']);
    Route::post('/form', [Projectcontroller::class, 'formregister']);
    Route::get('/showtable', [Projectcontroller::class, 'showtable']);
    Route::get('/edit/{id}', [Projectcontroller::class, 'editdata']);
    Route::get('/delete/{id}', [Projectcontroller::class, 'delete']);
    Route::post('/update/{id}', [Projectcontroller::class, 'update']);

    
    // subject in form
    Route::get('/subject', [Subjectcontroller::class, 'sub_form']);
    Route::post('/subject', [Subjectcontroller::class,'subjectform']);

    //result in form
    Route::get('/result_form', [Resultcontroller::class, 'resultform']);
    Route::post('/result_form', [Resultcontroller::class, 'rform']);


    // result preview
    Route::get('/result/{id}', [Resultcontroller::class,'result']);
    // Route::post('/', [Subjectcontroller::class,'result']);

    
});

// Routes not requiring login
Route::get('/regitration', [Logincontroller::class, 'regitration'])->middleware('alreadyLoggedin');
Route::post('/regitration', [Logincontroller::class, 'userregistration']);

Route::get('login', [Logincontroller::class, 'login'])->middleware('alreadyLoggedin');
Route::post('/login', [Logincontroller::class, 'userlogin']);
Route::get('/logout', [Logincontroller::class, 'logout']);
