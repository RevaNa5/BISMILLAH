<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Data\ArticleData;

Route::get('/informasi', function () {
    $articles = ArticleData::getAll();
    return view('informasi', compact('articles'));
});

Route::get('/informasi/{slug}', function ($slug) {
    $article = ArticleData::findBySlug($slug);
    if (!$article) {
        abort(404);
    }
    $otherArticles = array_filter(ArticleData::getAll(), fn($item) => $item['slug'] !== $slug);
    return view('informasi-detail', compact('article', 'otherArticles'));
});

Route::get('/kegiatan', function () {
    return view('kegiatan');
});

Route::get('/kepengurusan', function () {
    return view('kepengurusan');
});

Route::get('/ruang-sebaya', function () {
    return view('ruang-sebaya');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Kas & Keuangan (User & Bendahara)
    Route::get('/kas', [App\Http\Controllers\DueController::class, 'index'])->name('kas.index');
    Route::post('/kas/bayar', [App\Http\Controllers\PaymentController::class, 'store'])->name('payments.store');
    
    // Khusus Bendahara & Ketua
    Route::middleware('can:manage_finance')->group(function () {
        Route::post('/kas', [App\Http\Controllers\DueController::class, 'store'])->name('kas.store');
        Route::get('/kas/verifikasi', [App\Http\Controllers\PaymentController::class, 'index'])->name('payments.index');
        Route::post('/kas/verifikasi/{payment}', [App\Http\Controllers\PaymentController::class, 'verify'])->name('payments.verify');
    });

    // Anggota Directory
    Route::get('/feature/Anggota', [App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
    
    // Kepengurusan Directory (Admin Panel)
    Route::get('/feature/Kepengurusan', [App\Http\Controllers\KepengurusanController::class, 'index'])->name('feature.kepengurusan');
    
    // Divisi Module (Admin Panel)
    Route::get('/feature/Divisi', [App\Http\Controllers\DivisiController::class, 'index'])->name('feature.divisi');
    Route::get('/feature/Divisi/{slug}', [App\Http\Controllers\DivisiController::class, 'show'])->name('divisi.show');
    
    // Kegiatan & Kalender
    Route::get('/feature/Kegiatan', [App\Http\Controllers\KegiatanController::class, 'index'])->name('feature.kegiatan');
    Route::get('/feature/Kalender', [App\Http\Controllers\KalenderController::class, 'index'])->name('feature.kalender');
    Route::post('/feature/Kalender', [App\Http\Controllers\KalenderController::class, 'store'])->name('kalender.store');
    Route::put('/feature/Kalender/{agenda}', [App\Http\Controllers\KalenderController::class, 'update'])->name('kalender.update');
    Route::delete('/feature/Kalender/{agenda}', [App\Http\Controllers\KalenderController::class, 'destroy'])->name('kalender.destroy');

    // Generic Under Construction Route for Pending Features
    Route::get('/feature/{name}', function ($name) {
        return view('under-construction');
    })->name('feature.pending');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
