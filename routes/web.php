<?php

use App\Livewire\AdminDashboard;
use App\Livewire\ManageOrders;
use App\Livewire\ManageProduct;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::get('product/detail', ProductDetails::class);

Route::get('admin/dashboard', AdminDashboard::class)
    ->middleware('admin')
    ->name('admin.dashboard');

Route::get('products', ManageProduct::class)
    ->middleware('admin')
    ->name('products');

Route::get('orders', ManageOrders::class)
    ->middleware('admin')
    ->name('orders');
