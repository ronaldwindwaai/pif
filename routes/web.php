<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SupportController;
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

Route::get('/', function () {
    return redirect('home');
});
Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('projects', ProjectsController::class);
    Route::resource('resources', ResourcesController::class);
    Route::resource('support', SupportController::class);
    Route::resource('meeting', MeetingController::class);
    Route::resource('recording', RecordingController::class);
});