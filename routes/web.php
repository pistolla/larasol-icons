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
use App\Http\Controllers\CountiesController;
use App\Http\Controllers\WardsController;
use App\Http\Controllers\FarmTypesController;
use App\Http\Controllers\ProducesController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\ProgramsController;

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

Route::get('/', function () {
     return redirect('sign-in');
})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/evoucher', [EvoucherController::class, 'index'])->middleware('auth')->name('evoucher');
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
     'prefix' => 'farmers',
     'middleware' => ['auth'],
], function () {
     Route::get('/', [FarmerController::class, 'index'])->name('farmers.index');
     Route::get('/register', [FarmerController::class, 'create'])->name('farmers.create');
     Route::get('/export-farmers-csv', [FarmerController::class, 'exportCSV']);
     Route::get('/export-farmers-excel', [FarmerController::class, 'exportExcel']);
});

Route::group([
     'prefix' => 'setup/data',
     'middleware' => 'auth',
], function () {
     Route::get('/', [GeneratorTablesController::class, 'index'])
          ->name('generator_tables.generator_table.index');
     Route::get('/create', [GeneratorTablesController::class, 'create'])
          ->name('generator_tables.generator_table.create');
     Route::get('/show/{generatorTable}', [GeneratorTablesController::class, 'show'])
          ->name('generator_tables.generator_table.show');
     Route::get('/{generatorTable}/edit', [GeneratorTablesController::class, 'edit'])
          ->name('generator_tables.generator_table.edit');
     Route::post('/', [GeneratorTablesController::class, 'store'])
          ->name('generator_tables.generator_table.store');
     Route::put('generator_table/{generatorTable}', [GeneratorTablesController::class, 'update'])
          ->name('generator_tables.generator_table.update');
     Route::delete('/generator_table/{generatorTable}', [GeneratorTablesController::class, 'destroy'])
          ->name('generator_tables.generator_table.destroy');
});

Route::group([
     'prefix' => 'setup/data/field',
     'middleware' => 'auth',
], function () {
     Route::get('/', [GeneratorTableFieldsController::class, 'index'])
          ->name('generator_table_fields.generator_table_field.index');
     Route::get('/create', [GeneratorTableFieldsController::class, 'create'])
          ->name('generator_table_fields.generator_table_field.create');
     Route::get('/show/{generatorTableField}', [GeneratorTableFieldsController::class, 'show'])
          ->name('generator_table_fields.generator_table_field.show')->where('id', '[0-9]+');
     Route::get('/{generatorTableField}/edit', [GeneratorTableFieldsController::class, 'edit'])
          ->name('generator_table_fields.generator_table_field.edit')->where('id', '[0-9]+');
     Route::post('/', [GeneratorTableFieldsController::class, 'store'])
          ->name('generator_table_fields.generator_table_field.store');
     Route::put('generator_table_field/{generatorTableField}', [GeneratorTableFieldsController::class, 'update'])
          ->name('generator_table_fields.generator_table_field.update')->where('id', '[0-9]+');
     Route::delete('/generator_table_field/{generatorTableField}', [GeneratorTableFieldsController::class, 'destroy'])
          ->name('generator_table_fields.generator_table_field.destroy')->where('id', '[0-9]+');
});

// Generate
Route::group([
     'prefix' => 'setup/data/generate',
     'middleware' => 'auth',
], function () {
     Route::get('/config/{table}', [GeneratorTableFieldsController::class, 'generateConfig'])
          ->name('generator_table_fields.generator_table_field.config');
     Route::get('/resources/{table}', [GeneratorTableFieldsController::class, 'generateResources'])
          ->name('generator_table_fields.generator_table_field.resources');

     Route::get('/config', [GeneratorTablesController::class, 'generateConfig'])
          ->name('generator_tables.generator_table.config');
     Route::get('/resources', [GeneratorTablesController::class, 'generateResources'])
          ->name('generator_tables.generator_table.resources');
});

Route::group([
    'prefix' => 'counties',
], function () {
    Route::get('/', [CountiesController::class, 'index'])
         ->name('counties.county.index');
    Route::get('/create', [CountiesController::class, 'create'])
         ->name('counties.county.create');
    Route::get('/show/{county}',[CountiesController::class, 'show'])
         ->name('counties.county.show')->where('id', '[0-9]+');
    Route::get('/{county}/edit',[CountiesController::class, 'edit'])
         ->name('counties.county.edit')->where('id', '[0-9]+');
    Route::post('/', [CountiesController::class, 'store'])
         ->name('counties.county.store');
    Route::put('county/{county}', [CountiesController::class, 'update'])
         ->name('counties.county.update')->where('id', '[0-9]+');
    Route::delete('/county/{county}',[CountiesController::class, 'destroy'])
         ->name('counties.county.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'wards',
], function () {
    Route::get('/', [WardsController::class, 'index'])
         ->name('wards.wards.index');
    Route::get('/create', [WardsController::class, 'create'])
         ->name('wards.wards.create');
    Route::get('/show/{wards}',[WardsController::class, 'show'])
         ->name('wards.wards.show')->where('id', '[0-9]+');
    Route::get('/{wards}/edit',[WardsController::class, 'edit'])
         ->name('wards.wards.edit')->where('id', '[0-9]+');
    Route::post('/', [WardsController::class, 'store'])
         ->name('wards.wards.store');
    Route::put('wards/{wards}', [WardsController::class, 'update'])
         ->name('wards.wards.update')->where('id', '[0-9]+');
    Route::delete('/wards/{wards}',[WardsController::class, 'destroy'])
         ->name('wards.wards.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'farm_types',
], function () {
    Route::get('/', [FarmTypesController::class, 'index'])
         ->name('farm_types.farm_types.index');
    Route::get('/create', [FarmTypesController::class, 'create'])
         ->name('farm_types.farm_types.create');
    Route::get('/show/{farmTypes}',[FarmTypesController::class, 'show'])
         ->name('farm_types.farm_types.show')->where('id', '[0-9]+');
    Route::get('/{farmTypes}/edit',[FarmTypesController::class, 'edit'])
         ->name('farm_types.farm_types.edit')->where('id', '[0-9]+');
    Route::post('/', [FarmTypesController::class, 'store'])
         ->name('farm_types.farm_types.store');
    Route::put('farm_types/{farmTypes}', [FarmTypesController::class, 'update'])
         ->name('farm_types.farm_types.update')->where('id', '[0-9]+');
    Route::delete('/farm_types/{farmTypes}',[FarmTypesController::class, 'destroy'])
         ->name('farm_types.farm_types.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'counties',
], function () {
    Route::get('/', [CountiesController::class, 'index'])
         ->name('counties.counties.index');
    Route::get('/create', [CountiesController::class, 'create'])
         ->name('counties.counties.create');
    Route::get('/show/{counties}',[CountiesController::class, 'show'])
         ->name('counties.counties.show')->where('id', '[0-9]+');
    Route::get('/{counties}/edit',[CountiesController::class, 'edit'])
         ->name('counties.counties.edit')->where('id', '[0-9]+');
    Route::post('/', [CountiesController::class, 'store'])
         ->name('counties.counties.store');
    Route::put('counties/{counties}', [CountiesController::class, 'update'])
         ->name('counties.counties.update')->where('id', '[0-9]+');
    Route::delete('/counties/{counties}',[CountiesController::class, 'destroy'])
         ->name('counties.counties.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'produces',
], function () {
    Route::get('/', [ProducesController::class, 'index'])
         ->name('produces.produces.index');
    Route::get('/create', [ProducesController::class, 'create'])
         ->name('produces.produces.create');
    Route::get('/show/{produces}',[ProducesController::class, 'show'])
         ->name('produces.produces.show')->where('id', '[0-9]+');
    Route::get('/{produces}/edit',[ProducesController::class, 'edit'])
         ->name('produces.produces.edit')->where('id', '[0-9]+');
    Route::post('/', [ProducesController::class, 'store'])
         ->name('produces.produces.store');
    Route::put('produces/{produces}', [ProducesController::class, 'update'])
         ->name('produces.produces.update')->where('id', '[0-9]+');
    Route::delete('/produces/{produces}',[ProducesController::class, 'destroy'])
         ->name('produces.produces.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'programs',
    'middleware' => 'auth',
], function () {
    Route::get('/', [ProgramsController::class, 'index'])
         ->name('programs.program.index');
    Route::get('/create', [ProgramsController::class, 'create'])
         ->name('programs.program.create');
    Route::get('/show/{program}',[ProgramsController::class, 'show'])
         ->name('programs.program.show')->where('id', '[0-9]+');
    Route::get('/{program}/edit',[ProgramsController::class, 'edit'])
         ->name('programs.program.edit')->where('id', '[0-9]+');
    Route::post('/', [ProgramsController::class, 'store'])
         ->name('programs.program.store');
    Route::put('program/{program}', [ProgramsController::class, 'update'])
         ->name('programs.program.update')->where('id', '[0-9]+');
    Route::delete('/program/{program}',[ProgramsController::class, 'destroy'])
         ->name('programs.program.destroy')->where('id', '[0-9]+');
});
