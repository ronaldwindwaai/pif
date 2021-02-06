<?php

use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ResourceController;
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
    Route::resource('programmes', ProgrammeController::class);
    Route::delete('peogrammes/delete_select/', [ProgrammeController::class, 'delete_select'])->name('delete_selected');
    Route::resource('projects', ProjectController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('support', SupportController::class);
    Route::resource('meetings', MeetingController::class);
    Route::resource('recordings', RecordingController::class);
    Route::resource('users', UserController::class);
});
