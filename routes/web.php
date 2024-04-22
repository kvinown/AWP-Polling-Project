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
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login_ex', function () {
    return view('login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Middleware Admin
Route::middleware(['auth', '1'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', function () {
        return view('home');
    })->name('home');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // User
    Route::get('user-index', [UserController::class, 'index'])->name('user-index');
    Route::get('user-create', [UserController::class, 'create'])->name('user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user-store');
    Route::get('user-delete{user}', [UserController::class, 'destroy'])->name('user-delete');
    Route::get('user-edit{user}', [UserController::class, 'edit'])->name('user-edit');
    Route::post('user-update{user}', [UserController::class, 'update'])->name('user-update');

    // Fakultas
    Route::get('fakultas-index', [FakultasController::class, 'index'])->name('fakultas-index');
    Route::get('fakultas-create', [FakultasController::class, 'create'])->name('fakultas-create');
    Route::post('fakultas-store', [FakultasController::class, 'store'])->name('fakultas-store');
    Route::get('fakultas-delete/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas-delete');
    Route::delete('fakultas-delete/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas-delete');
    Route::get('fakultas-edit/{fakultas}', [FakultasController::class, 'edit'])->name('fakultas-edit');
    Route::post('fakultas-update/{fakultas}', [FakultasController::class, 'update'])->name('fakultas-update');

    // Kurikulum
    Route::get('kurikulum-index', [KurikulumController::class, 'index'])->name('kurikulum-index');
    Route::get('kurikulum-create', [KurikulumController::class, 'create'])->name('kurikulum-create');
    Route::post('kurikulum-store', [KurikulumController::class, 'store'])->name('kurikulum-store');
    Route::get('kurikulum-delete/{kurikulum}', [KurikulumController::class, 'destroy'])->name('kurikulum-delete');
    Route::get('kurikulum-edit/{kurikulum}', [KurikulumController::class, 'edit'])->name('kurikulum-edit');
    Route::post('kurikulum-update/{kurikulum}', [KurikulumController::class, 'update'])->name('kurikulum-update');

    // Mata Kuliah
    Route::get('matakuliah-index', [MataKuliahController::class, 'index'])->name('matakuliah-index');
    Route::get('matakuliah-create', [MataKuliahController::class, 'create'])->name('matakuliah-create');
    Route::post('matakuliah-store', [MataKuliahController::class, 'store'])->name('matakuliah-store');
    Route::get('matakuliah-delete/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('matakuliah-delete');
    Route::get('matakuliah-edit/{mataKuliah}', [MataKuliahController::class, 'edit'])->name('matakuliah-edit');
    Route::post('matakuliah-update/{mataKuliah}', [MataKuliahController::class, 'update'])->name('matakuliah-update');

    // Polling
    Route::get('polling-index', [PollingController::class, 'index'])->name('polling-index');
    Route::get('polling-create', [PollingController::class, 'create'])->name('polling-create');
    Route::post('polling-store', [PollingController::class, 'store'])->name('polling-store');
    Route::get('polling-delete/{polling}', [PollingController::class, 'destroy'])->name('polling-delete');
    Route::get('polling-edit/{polling}', [PollingController::class, 'edit'])->name('polling-edit');
    Route::post('polling-update/{polling}', [PollingController::class, 'update'])->name('polling-update');

    // Polling Detail
    Route::get('pollingdetail-index', [PollingDetailContorller::class, 'index'])->name('pollingdetail-index');
    Route::post('pollingdetail-create', [PollingDetailContorller::class, 'create'])->name('pollingdetail-create');
    Route::post('pollingdetail-store', [PollingDetailContorller::class, 'store'])->name('pollingdetail-store');
    Route::get('pollingdetail-delete/{pollingDetail}', [PollingDetailContorller::class, 'destroy'])->name('pollingdetail-delete');
    Route::get('pollingdetail-edit/{pollingDetail}', [PollingDetailContorller::class, 'edit'])->name('pollingdetail-edit');
    Route::post('pollingdetail-update/{pollingDetail}', [PollingDetailContorller::class, 'update'])->name('pollingdetail-update');

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
    Route::post('role-store', [RoleController::class, 'store'])->name('role-store');
    Route::get('role-delete/{role}', [RoleController::class, 'destroy'])->name('role-delete');
    Route::get('role-edit/{role}', [RoleController::class, 'edit'])->name('role-edit');
    Route::post('role-update/{role}', [RoleController::class, 'update'])->name('role-update');

    // Hasil
    Route::get('pollingdetail-hasil', [PollingDetailContorller::class, 'hasil'])->name('pollingdetail-hasil');

});

// Middleware Kepala Program Studi
Route::middleware(['auth', '2'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', function () {
        return view('home');
    })->name('home');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // Kurikulum
    Route::get('kurikulum-index', [KurikulumController::class, 'index'])->name('kurikulum-index');
    Route::get('kurikulum-create', [KurikulumController::class, 'create'])->name('kurikulum-create');
    Route::post('kurikulum-store', [KurikulumController::class, 'store'])->name('kurikulum-store');
    Route::get('kurikulum-delete/{kurikulum}', [KurikulumController::class, 'destroy'])->name('kurikulum-delete');
    Route::get('kurikulum-edit/{kurikulum}', [KurikulumController::class, 'edit'])->name('kurikulum-edit');
    Route::post('kurikulum-update/{kurikulum}', [KurikulumController::class, 'update'])->name('kurikulum-update');

    // Mata Kuliah
    Route::get('matakuliah-index', [MataKuliahController::class, 'index'])->name('matakuliah-index');
    Route::get('matakuliah-create', [MataKuliahController::class, 'create'])->name('matakuliah-create');
    Route::post('matakuliah-store', [MataKuliahController::class, 'store'])->name('matakuliah-store');
    Route::get('matakuliah-delete/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('matakuliah-delete');
    Route::get('matakuliah-edit/{mataKuliah}', [MataKuliahController::class, 'edit'])->name('matakuliah-edit');
    Route::post('matakuliah-update/{mataKuliah}', [MataKuliahController::class, 'update'])->name('matakuliah-update');

    // Polling
    Route::get('polling-index', [PollingController::class, 'index'])->name('polling-index');
    Route::get('polling-create', [PollingController::class, 'create'])->name('polling-create');
    Route::post('polling-store', [PollingController::class, 'store'])->name('polling-store');
    Route::get('polling-delete/{polling}', [PollingController::class, 'destroy'])->name('polling-delete');
    Route::get('polling-edit/{polling}', [PollingController::class, 'edit'])->name('polling-edit');
    Route::post('polling-update/{polling}', [PollingController::class, 'update'])->name('polling-update');

    // Polling Detail
    Route::get('pollingdetail-index', [PollingDetailContorller::class, 'index'])->name('pollingdetail-index');
    Route::post('pollingdetail-create', [PollingDetailContorller::class, 'create'])->name('pollingdetail-create');
    Route::post('pollingdetail-store', [PollingDetailContorller::class, 'store'])->name('pollingdetail-store');
    Route::get('pollingdetail-delete/{pollingDetail}', [PollingDetailContorller::class, 'destroy'])->name('pollingdetail-delete');
    Route::get('pollingdetail-edit/{pollingDetail}', [PollingDetailContorller::class, 'edit'])->name('pollingdetail-edit');
    Route::post('pollingdetail-update/{pollingDetail}', [PollingDetailContorller::class, 'update'])->name('pollingdetail-update');

    // Hasil
    Route::get('pollingdetail-hasil', [PollingDetailContorller::class, 'hasil'])->name('pollingdetail-hasil');

});

// Middleware Mahasiswa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('home', function () {
        return view('home');
    })->name('home');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    // Polling Detail
    Route::get('pollingdetail-index', [PollingDetailContorller::class, 'index'])->name('pollingdetail-index');
    Route::post('pollingdetail-create', [PollingDetailContorller::class, 'create'])->name('pollingdetail-create');
    Route::post('pollingdetail-store', [PollingDetailContorller::class, 'store'])->name('pollingdetail-store');
    Route::get('pollingdetail-delete/{pollingDetail}', [PollingDetailContorller::class, 'destroy'])->name('pollingdetail-delete');
    Route::get('pollingdetail-edit/{pollingDetail}', [PollingDetailContorller::class, 'edit'])->name('pollingdetail-edit');
    Route::post('pollingdetail-update/{pollingDetail}', [PollingDetailContorller::class, 'update'])->name('pollingdetail-update');

    // Hasil
    Route::get('pollingdetail-hasil', [PollingDetailContorller::class, 'hasil'])->name('pollingdetail-hasil');

});

require __DIR__.'/auth.php';
