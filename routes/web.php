<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/eventexitplan', function () {
    return view('welcome-gratis');
});

// Form Pengajuan (Public)
Route::get('/pengajuan', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan/sukses', [PengajuanController::class, 'success'])->name('pengajuan.success');
Route::get('/exitplan', [PengajuanController::class, 'createGratis'])->name('pengajuan.create-gratis');
Route::post('/exitplan', [PengajuanController::class, 'storeGratis'])->name('pengajuan.store-gratis');

Route::get('/dashboard', [PengajuanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin / Auth user view submissions
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
    
    // Admin Manual Create routes
    Route::get('/admin/pengajuan/tambah', [PengajuanController::class, 'adminCreate'])->name('pengajuan.admin.create');
    Route::post('/admin/pengajuan/tambah', [PengajuanController::class, 'adminStore'])->name('pengajuan.admin.store');
    
    // Admin Export Excel (CSV)
    Route::get('/admin/pengajuan/export', [PengajuanController::class, 'exportExcel'])->name('pengajuan.admin.export');
    
    // Admin Delete submission
    Route::delete('/admin/pengajuan/{pengajuan}', [PengajuanController::class, 'destroy'])->name('pengajuan.admin.destroy');

    // Admin Edit & Update submission
    Route::get('/admin/pengajuan/{pengajuan}/edit', [PengajuanController::class, 'edit'])->name('pengajuan.admin.edit');
    Route::put('/admin/pengajuan/{pengajuan}', [PengajuanController::class, 'update'])->name('pengajuan.admin.update');

    // Admin Bulk Delete submissions
    Route::post('/admin/pengajuan/bulk-delete', [PengajuanController::class, 'bulkDestroy'])->name('pengajuan.admin.bulk-destroy');
});

require __DIR__.'/auth.php';
