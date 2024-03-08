<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserNetwork;
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

Route::get('/',[UserNetwork::class,'loadPage']);
Route::get('/admin', [UserNetwork::class, 'admin']);
Route::get('/register',[UserNetwork::class,'loadRegister']);

Route::post('/user-registered',[UserNetwork::class,'registered'])->name('registered');
Route::get('/invite-register',[UserNetwork::class,'loadInviteRegister']);
    
Route::get('/login', [UserNetwork::class, 'loadLogin']);
Route::post('/login', [UserNetwork::class, 'userLogin'])->name('login');

Route::get('/dashboard/{id}', [UserNetwork::class, 'loadDashboard']);

Route::post('/send-invite/{id}', [UserNetwork::class, 'sendInvite'])->name('sendinvite');

Route::get('/total', [UserNetwork::class, 'totalDisplay']);
