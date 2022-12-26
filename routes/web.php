<?php

use Illuminate\Support\Facades\Route;
// Controladores Base
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CompanyMemberController;
use App\Http\Controllers\LegalRepresentativeControlle;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/natural-person/create', [NatutalPersonController::class, 'create'])->name('natural-person.create');
Route::post('natural-person', [NatutalPersonController::class, 'store'])->name('natural-person.store');

Route::get('/legal-representative/create', [LegalRepresentativeControlle::class, 'create'])->name('legal-representative.create');
Route::post('legal-representative', [LegalRepresentativeControlle::class, 'store'])->name('legal-representative.store');

Route::get('/company-member/create', [CompanyMemberController::class, 'create'])->name('company-member.create');
Route::post('company-member', [CompanyMemberController::class, 'store'])->name('company-member.store');

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('tests', TestController::class);
    Route::resource('natural-person', NatutalPersonController::class)->except(['create', 'store']);
    Route::resource('legal-representative', LegalRepresentativeControlle::class)->except(['create', 'store']);
    Route::resource('company-member', CompanyMemberController::class)->except(['create', 'store']);
});



Route::get('/hola', function(){
    Storage::disk("google")->put("test3.txt", "Hola esto es un test de google drive");
    return "Firmeelectronica";
});
