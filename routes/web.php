<?php

use Illuminate\Support\Facades\Route;
// Controladores Base
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NatutalPersonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Storage;

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

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verificar_email_at');
Route::get('/natural-person/create', [NatutalPersonController::class, 'create'])->name('natural-person.create');

Route::group(['middleware' => ['auth', 'verificar_email_at']], function()
{
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('tests', TestController::class);
    Route::resource('natural-person', NatutalPersonController::class)->except(['create', 'store']);
    
});


Route::get('/hola', function(){
    Storage::disk("google")->put("test3.txt", "Hola esto es un test de google drive");
    return "Firmeelectronica";
});
