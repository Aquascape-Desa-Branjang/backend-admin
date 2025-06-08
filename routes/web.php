<?php

use App\Http\Controllers\Web;
use Filament\Actions\Exports\Http\Controllers\DownloadExport;
use Filament\Actions\Imports\Http\Controllers\DownloadImportFailureCsv;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Base
|--------------------------------------------------------------------------
*/

// Route::controller(Web\MiscWebController::class)->group(function () {
//     Route::get('/', 'home')->name('home');
//     Route::get('/about-us', 'about')->name('about-us');
//     Route::get('/our-services', 'ourServices')->name('our-services');
//     Route::get('/legal/{type}', 'legal')->name('legal');
// });

// Route::controller(Web\CareerController::class)->group(function () {
//     Route::get('/career', 'index')->name('career.index');
// });

// Route::controller(Web\EProcurementController::class)->group(function () {
//     Route::get('/e-procurement', 'index')->name('e-procurement.index');
// });

// Route::controller(Web\ContactController::class)->group(function () {
//     Route::get('/contact', 'index')->name('contact.index');
//     Route::post('/contact/submit', 'submit')->name('contact.submit');
// });

// Route::get('/login', fn () => redirect('auth.login'))
//     ->name('login');

// Route::prefix('')->name('auth.')->group(function () {
//     Route::get('/logout', [Web\AuthenticationController::class, 'logout'])
//         ->name('logout');

//     Route::middleware('guest')->group(function () {
//         Route::get('/login', [Web\AuthenticationController::class, 'login'])
//             ->name('login');

//         Route::get('/register', [Web\AuthenticationController::class, 'register'])
//             ->name('register');

//         Route::get('/forgot-password', [Web\AuthenticationController::class, 'forgotPassword'])
//             ->name('forgot-password');

//         Route::get('/reset-password/{token}', [Web\AuthenticationController::class, 'resetPassword'])
//             ->name('reset-password');
//     });
// });

/*
|--------------------------------------------------------------------------
| Web Extra
|--------------------------------------------------------------------------
*/

//

/*
|--------------------------------------------------------------------------
| Filament Overrides
|--------------------------------------------------------------------------
*/

Route::get('/filament/exports/{export}/download', DownloadExport::class)
    ->middleware('auth.filament')
    ->name('filament.exports.download');

Route::get('/filament/imports/{import}/failed-rows/download', DownloadImportFailureCsv::class)
    ->middleware('auth.filament')
    ->name('filament.imports.failed-rows.download');
