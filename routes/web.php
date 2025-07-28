<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddChurchController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'navigate_to_homepage'])->name('home');
// HOME 'REGISTER NOW BUTTON'
Route::get('/Registration', [HomeController::class, 'navigate_to_registration'])->name('register__now');
// FORM 'NEXT BUTTON'
Route::get('/Church Name', [HomeController::class, 'churchNameForm'])->name('churchNameForm');
Route::get('/Peronsal Details', [HomeController::class, 'personalDetailsForm'])->name('personalDetailsForm');
Route::get('/Accomodation', [HomeController::class, 'accomodationForm'])->name('accomodationForm');
Route::get('/Transportation', [HomeController::class, 'transportationForm'])->name('transportationForm');
Route::get('/Confirmation', [HomeController::class, 'confirmationForm'])->name('confirmation');
// ADD NEW CHURCH ON LIST
Route::get('/add-church', [AddChurchController::class, 'church_add'])->name('church.add');
Route::post('/church-store', [AddChurchController::class, 'addNewChurch'])->name('church.store');