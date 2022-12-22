<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\GeneratorTablesController;
use App\Http\Controllers\GeneratorTableFieldsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify'); 
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('edit-account-info', [UserController::class, 'accountInfo'])->name('admin.account.info');
    Route::post('edit-account-info', [UserController::class, 'accountInfoStore'])->name('admin.account.info.store');
    Route::post('change-password', [UserController::class, 'changePasswordStore'])->name('admin.account.password.store');
});


Route::group([
    'prefix' => 'setup/data',
    'middleware' => 'auth',
], function () {
    Route::get('/', [GeneratorTablesController::class,'index'])
         ->name('generator_tables.generator_table.index');
    Route::get('/create',[GeneratorTablesController::class, 'create'])
         ->name('generator_tables.generator_table.create');
    Route::get('/show/{generatorTable}',[GeneratorTablesController::class, 'show'])
         ->name('generator_tables.generator_table.show');
    Route::get('/{generatorTable}/edit',[GeneratorTablesController::class, 'edit'])
         ->name('generator_tables.generator_table.edit');
    Route::post('/', [GeneratorTablesController::class, 'store'])
         ->name('generator_tables.generator_table.store');
    Route::put('generator_table/{generatorTable}', [GeneratorTablesController::class,'update'])
         ->name('generator_tables.generator_table.update');
    Route::delete('/generator_table/{generatorTable}',[GeneratorTablesController::class,'destroy'])
         ->name('generator_tables.generator_table.destroy');
});

Route::group([
    'prefix' => 'setup/data/field',
    'middleware' => 'auth',
], function () {
    Route::get('/', [GeneratorTableFieldsController::class,'index'])
         ->name('generator_table_fields.generator_table_field.index');
    Route::get('/create',[GeneratorTableFieldsController::class,'create'])
         ->name('generator_table_fields.generator_table_field.create');
    Route::get('/show/{generatorTableField}',[GeneratorTableFieldsController::class,'show'])
         ->name('generator_table_fields.generator_table_field.show')->where('id', '[0-9]+');
    Route::get('/{generatorTableField}/edit',[GeneratorTableFieldsController::class,'edit'])
         ->name('generator_table_fields.generator_table_field.edit')->where('id', '[0-9]+');
    Route::post('/', [GeneratorTableFieldsController::class,'store'])
         ->name('generator_table_fields.generator_table_field.store');
    Route::put('generator_table_field/{generatorTableField}', [GeneratorTableFieldsController::class,'update'])
         ->name('generator_table_fields.generator_table_field.update')->where('id', '[0-9]+');
    Route::delete('/generator_table_field/{generatorTableField}',[GeneratorTableFieldsController::class,'destroy'])
         ->name('generator_table_fields.generator_table_field.destroy')->where('id', '[0-9]+');
});

// Generate
Route::group([
    'prefix' => 'setup/data/generate',
    'middleware' => 'auth',
], function () {
    Route::get('/config/{table}', [GeneratorTableFieldsController::class,'generateConfig'])
         ->name('generator_table_fields.generator_table_field.config');
    Route::get('/resources/{table}',[GeneratorTableFieldsController::class,'generateResources'])
         ->name('generator_table_fields.generator_table_field.resources');

    Route::get('/config', [GeneratorTablesController::class,'generateConfig'])
        ->name('generator_tables.generator_table.config');
    Route::get('/resources',[GeneratorTablesController::class,'generateResources'])
        ->name('generator_tables.generator_table.resources');
});