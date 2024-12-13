<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BombController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('bomb.login')->middleware('guest');


// Admin

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/data-event', [AdminController::class, 'dataEvent'])->middleware('auth')->name('dataevent');
Route::get('/dashboard/create-event', [AdminController::class, 'create'])->middleware('auth')->name('createevent');
Route::post('/dashboard/create-event/store', [AdminController::class, 'store'])->middleware('auth')->name('postevent');
Route::get('/dashboard/edit-mission', [AdminController::class, 'editConfig'])->middleware('auth')->name('editConfig');
Route::get('/dashboard/update-mission', [AdminController::class, 'updateConfig'])->middleware('auth')->name('updateConfig');
Route::get('/dashboard/{id}/edit-mission', [AdminController::class, 'editMission'])->middleware('auth')->name('editevent');
Route::put('/dashboard/{id}', [AdminController::class, 'update'])->middleware('auth')->name('eventupdate');
Route::get('/dashboard/fetch-on-off/{admin}', [AdminController::class, 'onOff'])->middleware('auth')->name('fetch.on.off');

// User

Route::get('/teamsix-check', [BombController::class, 'teamSixCheck'])->name('teamsix.check');
Route::get('/teamsix-check-fetch', [BombController::class, 'checkPasscode'])->name('teamsix.check.fetch');

Route::get('/teamsix-mission/{admin}', [BombController::class, 'index'])->name('teamsix.index');
Route::get('/teamsix-in-action/{admin}', [BombController::class, 'show'])->name('teamsix.show');
Route::get('/teamsix-success-fetch/{admin}', [BombController::class, 'successFetch'])->name('teamsix.success.fetch');
Route::get('/teamsix-time-fetch/{admin}', [BombController::class, 'timeFetch'])->name('teamsix.time.fetch');
Route::get('/teamsix-answer-fetch/{admin}', [BombController::class, 'answerFetch'])->name('teamsix.answer.fetch');
Route::get('/teamsix-bombnumber-fetch/{admin}', [BombController::class, 'bombNumberFetch'])->name('teamsix.bombnumber.fetch');
// Route::get('/teamsix-failed-fetch/{admin}', [BombController::class, 'failedFetch'])->name('teamsix.failed.fetch');

Route::get('/t', function() {
    dd(request()->all());
})-> name('t');

require __DIR__.'/auth.php';
