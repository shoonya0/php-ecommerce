<?php

use App\Livewire\AdminDashboard;
use App\Livewire\ManageOrders;
use App\Livewire\ManageProduct;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\AboutUs;
use App\Livewire\AddCategory;
use App\Livewire\AddProductForm;
use App\Livewire\AllProducts;
use App\Livewire\Contacts;
use App\Livewire\EditCategory;
use App\Livewire\EditProduct;
use App\Livewire\ManageCategories;
use App\Livewire\ShoppingCartComponent;
use App\Livewire\ShoppingCartIcon;
use App\Livewire\Order;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

Route::get('product/{product_id}/detail', ProductDetails::class);

Route::get('/shopping-cart', ShoppingCartComponent::class)->name('shopping-cart');

Route::get('/all-products', AllProducts::class)->name('all-products');

Route::get('/about-us', AboutUs::class)->name('about-us');

Route::get('/contact-us', Contacts::class)->name('contact-us');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', AdminDashboard::class)
        ->name('admin.dashboard');

    Route::get('/products', ManageProduct::class)
        ->name('products');

    Route::get('/orders', ManageOrders::class)
        ->name('orders');

    // add product form
    Route::get('/add/product', AddProductForm::class);

    Route::get('/manage/categories', ManageCategories::class);

    // add category form
    Route::get('/add/category', AddCategory::class);

    // edit product
    Route::get('/edit/{id}/product', EditProduct::class);

    // edit category
    Route::get('/edit/{id}/category', EditCategory::class);

    // add order
    Route::get('/order', ManageOrders::class);
});
