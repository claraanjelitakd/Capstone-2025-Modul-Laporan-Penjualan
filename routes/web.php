<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleCheck;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PengerajinController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\FotoProdukController;
use App\Http\Controllers\Admin\UsahaController;
use App\Http\Controllers\Admin\JenisUsahaController;
use App\Http\Controllers\Admin\UsahaPengerajinController;
use App\Http\Controllers\Admin\UsahaJenisController;
use App\Http\Controllers\Admin\UsahaProdukController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\TransaksiController;

// Authentication Routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('loginForm');
Route::post('login', [AuthController::class, 'login'])->name('login');

//Guest
Route::get('', [PageController::class, 'index'])->name('guest-index');
Route::get('about', [PageController::class, 'about'])->name('guest-about');
Route::get('contact', [PageController::class, 'contact'])->name('guest-contact');
Route::get('products', [PageController::class, 'products'])->name('guest-products');
Route::get('single-product', [PageController::class, 'singleProduct'])->name('guest-single-product');
Route::get('produk/kategori/{slug}', [PageController::class, 'productsByCategory'])->name('guest-productsByCategory');
Route::get('produk/{slug}', [PageController::class, 'singleProduct'])->name('guest-singleProduct');


Route::middleware(['role:admin'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('admin/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('admin/change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::post('update-password', [AuthController::class, 'updatePassword'])->name('update-password');

    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    //transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');

    // Pengerajin
    Route::get('admin/pengerajin', [PengerajinController::class, 'index'])->name('admin.pengerajin-index');
    Route::get('admin/pengerajin/create', [PengerajinController::class, 'create'])->name('admin.pengerajin-create');
    Route::post('admin/pengerajin/store', [PengerajinController::class, 'store'])->name('admin.pengerajin-store');
    Route::get('admin/pengerajin/edit/{id}', [PengerajinController::class, 'edit'])->name('admin.pengerajin-edit');
    Route::put('admin/pengerajin/update/{id}', [PengerajinController::class, 'update'])->name('admin.pengerajin-update');
    Route::delete('admin/pengerajin/destroy/{id}', [PengerajinController::class, 'destroy'])->name('admin.pengerajin-destroy');

    // Usaha
    Route::get('admin/usaha', [UsahaController::class, 'index'])->name('admin.usaha-index');
    Route::get('admin/usaha/create', [UsahaController::class, 'create'])->name('admin.usaha-create');
    Route::post('admin/usaha/store', [UsahaController::class, 'store'])->name('admin.usaha-store');
    Route::get('admin/usaha/edit/{id}', [UsahaController::class, 'edit'])->name('admin.usaha-edit');
    Route::put('admin/usaha/update/{id}', [UsahaController::class, 'update'])->name('admin.usaha-update');
    Route::delete('admin/usaha/destroy/{id}', [UsahaController::class, 'destroy'])->name('admin.usaha-destroy');

    // Jenis Usaha
    Route::get('admin/jenis-usaha', [JenisUsahaController::class, 'index'])->name('admin.jenis_usaha-index');
    Route::get('admin/jenis-usaha/create', [JenisUsahaController::class, 'create'])->name('admin.jenis_usaha-create');
    Route::post('admin/jenis-usaha/store', [JenisUsahaController::class, 'store'])->name('admin.jenis_usaha-store');
    Route::get('admin/jenis-usaha/edit/{id}', [JenisUsahaController::class, 'edit'])->name('admin.jenis_usaha-edit');
    Route::put('admin/jenis-usaha/update/{id}', [JenisUsahaController::class, 'update'])->name('admin.jenis_usaha-update');
    Route::delete('admin/jenis-usaha/destroy/{id}', [JenisUsahaController::class, 'destroy'])->name('admin.jenis_usaha-destroy');

    // Kategori Produk
    Route::get('admin/kategori-produk', [KategoriProdukController::class, 'index'])->name('admin.kategori_produk-index');
    Route::get('admin/kategori-produk/create', [KategoriProdukController::class, 'create'])->name('admin.kategori_produk-create');
    Route::post('admin/kategori-produk/store', [KategoriProdukController::class, 'store'])->name('admin.kategori_produk-store');
    Route::get('admin/kategori-produk/edit/{id}', [KategoriProdukController::class, 'edit'])->name('admin.kategori_produk-edit');
    Route::put('admin/kategori-produk/update/{id}', [KategoriProdukController::class, 'update'])->name('admin.kategori_produk-update');
    Route::delete('admin/kategori-produk/destroy/{id}', [KategoriProdukController::class, 'destroy'])->name('admin.kategori_produk-destroy');

    // Produk
    Route::get('admin/produk', [ProdukController::class, 'index'])->name('admin.produk-index');
    Route::get('admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk-create');
    Route::post('admin/produk/store', [ProdukController::class, 'store'])->name('admin.produk-store');
    Route::get('admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk-edit');
    Route::put('admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk-update');
    Route::delete('admin/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('admin.produk-destroy');

    // Foto Produk
    Route::get('admin/foto-produk', [FotoProdukController::class, 'index'])->name('admin.foto_produk-index');
    Route::get('admin/foto-produk/create', [FotoProdukController::class, 'create'])->name('admin.foto_produk-create');
    Route::post('admin/foto-produk/store', [FotoProdukController::class, 'store'])->name('admin.foto_produk-store');
    Route::get('admin/foto-produk/edit/{id}', [FotoProdukController::class, 'edit'])->name('admin.foto_produk-edit');
    Route::put('admin/foto-produk/update/{id}', [FotoProdukController::class, 'update'])->name('admin.foto_produk-update');
    Route::delete('admin/foto-produk/destroy/{id}', [FotoProdukController::class, 'destroy'])->name('admin.foto_produk-destroy');

    // Usaha Pengerajin
    Route::get('admin/usaha-pengerajin', [UsahaPengerajinController::class, 'index'])->name('admin.usaha_pengerajin-index');
    Route::get('admin/usaha-pengerajin/create', [UsahaPengerajinController::class, 'create'])->name('admin.usaha_pengerajin-create');
    Route::post('admin/usaha-pengerajin/store', [UsahaPengerajinController::class, 'store'])->name('admin.usaha_pengerajin-store');
    Route::get('admin/usaha-pengerajin/edit/{id}', [UsahaPengerajinController::class, 'edit'])->name('admin.usaha_pengerajin-edit');
    Route::put('admin/usaha-pengerajin/update/{id}', [UsahaPengerajinController::class, 'update'])->name('admin.usaha_pengerajin-update');
    Route::delete('admin/usaha-pengerajin/destroy/{id}', [UsahaPengerajinController::class, 'destroy'])->name('admin.usaha_pengerajin-destroy');

    // Usaha Jenis
    Route::get('admin/usaha-jenis', [UsahaJenisController::class, 'index'])->name('admin.usaha_jenis-index');
    Route::get('admin/usaha-jenis/create', [UsahaJenisController::class, 'create'])->name('admin.usaha_jenis-create');
    Route::post('admin/usaha-jenis/store', [UsahaJenisController::class, 'store'])->name('admin.usaha_jenis-store');
    Route::get('admin/usaha-jenis/edit/{id}', [UsahaJenisController::class, 'edit'])->name('admin.usaha_jenis-edit');
    Route::put('admin/usaha-jenis/update/{id}', [UsahaJenisController::class, 'update'])->name('admin.usaha_jenis-update');
    Route::delete('admin/usaha-jenis/destroy/{id}', [UsahaJenisController::class, 'destroy'])->name('admin.usaha_jenis-destroy');

    // Usaha Produk
    Route::get('admin/usaha-produk', [UsahaProdukController::class, 'index'])->name('admin.usaha_produk-index');
    Route::get('admin/usaha-produk/create', [UsahaProdukController::class, 'create'])->name('admin.usaha_produk-create');
    Route::post('admin/usaha-produk/store', [UsahaProdukController::class, 'store'])->name('admin.usaha_produk-store');
    Route::get('admin/usaha-produk/edit/{id}', [UsahaProdukController::class, 'edit'])->name('admin.usaha_produk-edit');
    Route::put('admin/usaha-produk/update/{id}', [UsahaProdukController::class, 'update'])->name('admin.usaha_produk-update');
    Route::delete('admin/usaha-produk/destroy/{id}', [UsahaProdukController::class, 'destroy'])->name('admin.usaha_produk-destroy');
});





