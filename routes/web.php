<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IgsstationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CorsstationController;
use App\Http\Controllers\SystemDescriptionController;
use App\Http\Controllers\Controller;



Route::get('/', function () {
    
    $stations = getStations();
    return view('igsstations', $stations);
})->name('website.index');

Route::get('about', function () {
    return view('about');
});

//return a website igsstations


Route::get('/igs', [Controller::class, 'igsstations'])->name(
    'igs.index'
);


Route::get('/cors', [Controller::class, 'corsstations'])->name(
    'cors.index'
);


Route::middleware(['auth'])
    ->get('/dashboard', function () {
        return view('dashboard');
    })
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::get('igsstations', [IgsstationController::class, 'index'])->name(
            'igsstations.index'
        );
        Route::post('igsstations', [
            IgsstationController::class,
            'store',
        ])->name('igsstations.store');
        Route::get('igsstations/create', [
            IgsstationController::class,
            'create',
        ])->name('igsstations.create');

        // excel start 
        Route::get('igsstations/create_excel', [
            IgsstationController::class,
            'create_excel',
        ])->name('igsstations.create_excel');

        Route::post('igsstations/store_excel', [
            IgsstationController::class,
        'store_excel',
        ])->name('igsstations.store_excel');
    // excel end

        Route::get('igsstations/{igsstation}', [
            IgsstationController::class,
            'show',
        ])->name('igsstations.show');
        Route::get('igsstations/{igsstation}/edit', [
            IgsstationController::class,
            'edit',
        ])->name('igsstations.edit');
        Route::put('igsstations/{igsstation}', [
            IgsstationController::class,
            'update',
        ])->name('igsstations.update');
        Route::delete('igsstations/{igsstation}', [
            IgsstationController::class,
            'destroy',
        ])->name('igsstations.destroy');

        Route::get('corsstations', [
            CorsstationController::class,
            'index',
        ])->name('corsstations.index');
        Route::post('corsstations', [
            CorsstationController::class,
            'store',
        ])->name('corsstations.store');
        Route::get('corsstations/create', [
            CorsstationController::class,
            'create',
        ])->name('corsstations.create');

        // excel start 
        Route::get('corsstations/create_excel', [
            CorsstationController::class,
            'create_excel',
        ])->name('corsstations.create_excel');

        Route::post('corsstations/store_excel', [
            CorsstationController::class,
            'store_excel',
        ])->name('corsstations.store_excel');
        // excel end
        Route::get('corsstations/{corsstation}', [
            CorsstationController::class,
            'show',
        ])->name('corsstations.show');
        Route::get('corsstations/{corsstation}/edit', [
            CorsstationController::class,
            'edit',
        ])->name('corsstations.edit');
        Route::put('corsstations/{corsstation}', [
            CorsstationController::class,
            'update',
        ])->name('corsstations.update');
        Route::delete('corsstations/{corsstation}', [
            CorsstationController::class,
            'destroy',
        ])->name('corsstations.destroy');

        Route::get('users', [UserController::class, 'index'])->name(
            'users.index'
        );
        Route::post('users', [UserController::class, 'store'])->name(
            'users.store'
        );
        Route::get('users/create', [UserController::class, 'create'])->name(
            'users.create'
        );
        Route::get('users/{user}', [UserController::class, 'show'])->name(
            'users.show'
        );
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name(
            'users.edit'
        );
        Route::put('users/{user}', [UserController::class, 'update'])->name(
            'users.update'
        );
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name(
            'users.destroy'
        );

        Route::get('system-descriptions', [
            SystemDescriptionController::class,
            'index',
        ])->name('system-descriptions.index');
        Route::post('system-descriptions', [
            SystemDescriptionController::class,
            'store',
        ])->name('system-descriptions.store');
        Route::get('system-descriptions/create', [
            SystemDescriptionController::class,
            'create',
        ])->name('system-descriptions.create');
        Route::get('system-descriptions/{systemDescription}', [
            SystemDescriptionController::class,
            'show',
        ])->name('system-descriptions.show');
        Route::get('system-descriptions/{systemDescription}/edit', [
            SystemDescriptionController::class,
            'edit',
        ])->name('system-descriptions.edit');
        Route::put('system-descriptions/{systemDescription}', [
            SystemDescriptionController::class,
            'update',
        ])->name('system-descriptions.update');
        Route::delete('system-descriptions/{systemDescription}', [
            SystemDescriptionController::class,
            'destroy',
        ])->name('system-descriptions.destroy');
    });


   

    
