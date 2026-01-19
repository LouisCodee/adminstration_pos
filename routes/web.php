<?php

use App\Livewire\Business\BusinessCreate;
use App\Livewire\Business\BusinessEdit;
use App\Livewire\Business\BusinessIndex;
use App\Livewire\Business\BusinessShow;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\Users\UserIndex;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserShow;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');


    Route::get('users', UserIndex::class)->name('users.index')->middleware('permission:view_users|create_users|delete_users|update_users');
    Route::get('user/create', UserCreate::class)->name('user.create')->middleware('permission:create_users');
    Route::get('user/{id}/edit', UserEdit::class)->name('user.edit')->middleware('permission:update_users');
    Route::get('user/{id}/show', UserShow::class)->name('user.show')->middleware('permission:view_users');


    // Business Routes
    Route::get('business', BusinessIndex::class)->name('business.index')->middleware('permission:view_business|create_business|delete_business|update_business');
    Route::get('business/create', BusinessCreate::class)->name('business.create')->middleware('permission:create_business');
    Route::get('business/{id}/edit', BusinessEdit::class)->name('business.edit')->middleware('permission:update_business');
    Route::get('business/{id}/show', BusinessShow::class)->name('business.show')->middleware('permission:view_business');



    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
