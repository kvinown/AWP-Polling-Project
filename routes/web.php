<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\PollingDetailContorller;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', function () {
        return view('home');
    })->name('home');

    // Fakultas
    Route::get('fakultas-index', [FakultasController::class, 'index'])->name('fakultas-index');
    Route::get('fakultas-create', [FakultasController::class, 'create'])->name('fakultas-create');
    Route::post('fakultas-store', [FakultasController::class, 'store'])->name('fakultas-store');
    Route::get('fakultas-delete/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas-delete');
    Route::get('fakultas-edit/{fakultas}', [FakultasController::class, 'edit'])->name('fakultas-edit');
    Route::post('fakultas-update/{fakultas}', [FakultasController::class, 'update'])->name('fakultas-update');

    // Kurikulum
    Route::get('kurikulum-index', [KurikulumController::class, 'index'])->name('kurikulum-index');
    Route::get('kurikulum-create', [KurikulumController::class, 'create'])->name('kurikulum-create');
    Route::get('kurikulum-delete/{kurikulum}', [KurikulumController::class, 'destroy'])->name('kurikulum-delete');

    // Mata Kuliah
    Route::get('matakuliah-index', [MataKuliahController::class, 'index'])->name('matakuliah-index');
    Route::get('matakuliah-create', [MataKuliahController::class, 'create'])->name('matakuliah-create');
    Route::get('matakuliah-delete/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('matakuliah-delete');

    // Polling
    Route::get('polling-index', [PollingController::class, 'index'])->name('polling-index');
    Route::get('polling-create', [PollingController::class, 'create'])->name('polling-create');
    Route::get('polling-delete/{polling}', [PollingController::class, 'destroy'])->name('polling-delete');

    // Polling Detail
    Route::get('pollingdetail-index', [PollingDetailContorller::class, 'index'])->name('pollingdetail-index');
    Route::get('pollingdetail-create', [PollingDetailContorller::class, 'create'])->name('pollingdetail-create');
    Route::get('pollingdetail-delete/{pollingDetail}', [PollingDetailContorller::class, 'destroy'])->name('pollingdetail-delete');

    // Program Studi
    Route::get('programstudi-index', [ProgramStudiController::class, 'index'])->name('programstudi-index');
    Route::get('programstudi-create', [ProgramStudiController::class, 'create'])->name('programstudi-create');
    Route::post('programstudi-store', [ProgramStudiController::class, 'store'])->name('programstudi-store');
    Route::get('programstudi-delete/{programStudi}', [ProgramStudiController::class, 'destroy'])->name('programstudi-delete');
    Route::get('programstudi-edit/{programStudi}', [ProgramStudiController::class, 'edit'])->name('programstudi-edit');
    Route::post('programstudi-update/{programStudi}', [ProgramStudiController::class, 'update'])->name('programstudi-update');

    // Role
    Route::get('role-index', [RoleController::class, 'index'])->name('role-index');
    Route::get('role-create', [RoleController::class, 'create'])->name('role-create');
    Route::get('role-delete/{role}', [RoleController::class, 'destroy'])->name('role-delete');

    // User
    Route::get('akun-index', [UserController::class, 'index'])->name('akun-index');
    Route::get('akun-create', [UserController::class, 'create'])->name('akun-create');
    Route::get('akun-delete/{user}', [UserController::class, 'destroy'])->name('akun-delete');

});

require __DIR__.'/auth.php';
