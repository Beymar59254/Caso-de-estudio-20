<?php

use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user?->hasRole('Administrador')) {
        return redirect()->route('admin.users.index');
    }

    return redirect()->route('user.profile');
})->middleware(['auth'])->name('dashboard');

use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [ProfileController::class, 'show'])->name('user.profile');

    Route::middleware([\App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::resource('admin/users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
    });
});



require __DIR__.'/auth.php';
