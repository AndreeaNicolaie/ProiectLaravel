<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Speaker_SessionController;
use App\Http\Controllers\ContactController;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::resource('events', EventController::class);
Route::resource('tickets', TicketController::class);
Route::resource('packages', PackageController::class);
Route::resource('partners', PartnerController::class);
Route::resource('sponsors', SponsorController::class);
Route::resource('agendas', AgendaController::class);
Route::resource('speakers', SpeakerController::class);
Route::resource('sessions', SessionController::class);
Route::resource('speakers_sessions', Speaker_SessionController::class);
Route::resource('participants', ParticipantController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    // Alte rute care necesită autentificare
});

// ShoppingCartController routes
Route::get('/shop', [ShoppingCartController::class, 'index'])->name('shop.index');
Route::get('cart', [ShoppingCartController::class, 'cart']);
Route::get('add-to-cart/{id}', [ShoppingCartController::class, 'addToCart']);
Route::patch('update-cart', [ShoppingCartController::class, 'update'])->name('update-cart');
Route::delete('remove-from-cart', [ShoppingCartController::class, 'remove'])->name('remove-from-cart');
Route::post('/save-cart', [ShoppingCartController::class, 'saveCart'])->name('save-cart');

// PaymentController routes
Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::get('/success', [PaymentController::class, 'success'])->name('success');
// Eliminați orice referințe la saveCart din ShoppingCartController dacă nu mai sunt necesare

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/home', function () {
    return view('home');
});


