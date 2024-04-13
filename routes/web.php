<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ConsumerController;
use App\Http\Controllers\Admin\CustumerController;

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
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/welcome-user', function () {
    // Qui puoi generare l'HTML della tua email preimpostata
    $html = view('reply.welcomeUser')->render();

    // Restituisci l'HTML come risposta
    return Response::make($html)->header('Content-Type', 'text/html');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

        // Rotte Email (messages)
        Route::get('/email/trashed',                    [MessageController::class, 'trashed'])->name('email.trashed');
        Route::post('/email/{email}/restore',           [MessageController::class, 'restore'])->name('email.restore');
        Route::delete('/email/{email}/hardDelete',      [MessageController::class, 'harddelete'])->name('email.hardDelete');

        // Risorse
        Route::resource('email', MessageController::class);
        Route::resource('consumers', ConsumerController::class);
        Route::resource('custumers', CustumerController::class);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
