<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->hasRole('organizer')) {
        return redirect()->route('organizer.dashboard');
    }

    if ($user->hasRole('user')) {
        return redirect()->route('user.dashboard');
    }

    return redirect('/');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:organizer'])->prefix('organizer')->group(function () {
    Route::get('/dashboard', [OrganizerController::class, 'dashboard'])->name('organizer.dashboard');

    Route::get('/events/attendees', [OrganizerController::class, 'listAttendees'])->name('organizer.events.all_attendees');

    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('organizer.events.index');
        Route::get('/create', [EventController::class, 'create'])->name('organizer.events.create');
        Route::post('/', [EventController::class, 'store'])->name('organizer.events.store');
        Route::get('/{event}', [EventController::class, 'show'])->name('organizer.events.show');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('organizer.events.edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('organizer.events.update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('organizer.events.destroy');

        Route::get('/{event}/attendees', [OrganizerController::class, 'showAttendees'])->name('organizer.events.attendees');

        Route::prefix('{event}/tickets')->group(function () {
            Route::get('/', [TicketController::class, 'index'])->name('organizer.tickets.index');
            Route::get('/create', [TicketController::class, 'create'])->name('organizer.tickets.create');
            Route::post('/', [TicketController::class, 'store'])->name('organizer.tickets.store');
            Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('organizer.tickets.edit');
            Route::put('/{ticket}', [TicketController::class, 'update'])->name('organizer.tickets.update');
            Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('organizer.tickets.destroy');
        });

        Route::post('/tickets/validate/{eventAttendee}', [TicketController::class, 'validateTicket'])->name('organizer.tickets.validate');
    });
});

Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/events', [UserEventController::class, 'index'])->name('user.events.index');
    Route::get('/events/{event}', [UserEventController::class, 'show'])->name('user.events.show');
    Route::get('/my-tickets', [UserController::class, 'myTickets'])->name('user.tickets');
    Route::post('/events/{event}/tickets', [UserTicketController::class, 'store'])->name('events.tickets.buy');
});

Route::post('events/{event}/comments', [UserEventController::class, 'storeComment'])
    ->name('user.events.comments.store')
    ->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

require __DIR__ . '/auth.php';
