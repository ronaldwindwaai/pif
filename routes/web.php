<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Models\Participant;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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
    return redirect('dashboard');
});
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('programmes', ProgrammeController::class);
    Route::delete('peogrammes/delete_select/', [ProgrammeController::class, 'delete_select'])->name('delete_selected');
    Route::resource('projects', ProjectController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('supports', SupportController::class);
    Route::resource('meetings', MeetingController::class);
    Route::resource('recordings', RecordingController::class);
    Route::get('participants/search/add', [ParticipantController::class, 'search'])->name('participants.search');
    Route::get('participants/load', [ParticipantController::class, 'load'])->name('participants.load');
    Route::post('participants/upload', [ParticipantController::class, 'upload'])->name('participants.upload');
    Route::resource('participants', ParticipantController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('partners', PartnerController::class);
    Route::get('/calendars', [CalendarController::class, 'index'])->name('calendar');
    Route::get('user', [DashboardController::class, 'get_user_by_role'])->name('user_role');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('login');
    });
});
