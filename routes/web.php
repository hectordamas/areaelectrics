<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Public\ProductsController as PublicProductsController;
use App\Http\Controllers\Public\BrandsController as PublicBrandsController;
use App\Http\Controllers\Public\CategoriesController as PublicCategoriesController;
use App\Http\Controllers\Public\OrdersController as PublicOrdersController;
use App\Http\Controllers\Public\MessagesController as PublicMessagesController;
use App\Http\Controllers\Public\ShopController;
use App\Http\Controllers\Public\CartController;
use App\Http\Controllers\Public\IndexController;

use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ConectionsController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UsersController;

//Rutas Publicas
Auth::routes();

Route::get('/nosotros', function(){
    return view('about');
});

Route::get('contacto', function(){
    return view('contacto');
});

Route::get('/', [IndexController::class, 'index']);
Route::get('tienda-en-linea', [ShopController::class, 'index']);
Route::get('buscar', [ShopController::class, 'search']);

Route::get('nuestros-productos/{slug}', [PublicProductsController::class, 'show']);
Route::get('nuestras-marcas/{slug}', [PublicBrandsController::class, 'index']);
Route::get('nuestras-categorias/{slug}', [PublicCategoriesController::class, 'index']);

Route::post('conections/store', [PublicConectionsController::class, 'store']);

Route::post('messages', [PublicMessageController::class, 'store'])->name('messages.store');

Route::get('carrito-de-compras', [CartController::class, 'index']);
Route::post('cart/addToCart', [CartController::class, 'addToCart']);
Route::post('cart/updateCartItem', [CartController::class, 'updateCartItem']);
Route::post('cart/removeCartItem', [CartController::class, 'removeCartItem']);
Route::get('cart/destroy', [CartController::class, 'destroy']);
Route::get('finalizar-compra', [CartController::class, 'finalizarCompra']);
Route::get('checkout', [CartController::class, 'checkout']);

Route::group(['middleware' => ['auth', 'check.active'] ], function(){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('mis-ordenes', [PublicOrdersController::class, 'index']);
    Route::get('detalles-de-orden/{id}', [PublicOrdersController::class, 'show']);
    Route::get('downloadInvoice/{id}', [PublicOrdersController::class, 'downloadInvoice']);


    Route::get('completed', function(){
        return view('orders.completed');
    });
});

//Rutas Admin
Route::group(['middleware' => ['auth', 'admin'] ], function(){
    Route::get('products/filter', [ProductsController::class, 'filter']);
    Route::get('products/search', [ProductsController::class, 'search']);
    Route::post('products/handle', [ProductsController::class, 'handle']);
    Route::post('excel_import', [ProductsController::class, 'importProducts']);
    Route::get('excel_export', [ProductsController::class, 'exportProducts']);
    
    Route::get('products/create', [ProductsController::class, 'create']);
    Route::post('products/store', [ProductsController::class, 'store']);
    Route::get('products/{id}/edit', [ProductsController::class, 'edit']);
    Route::post('products/{id}/update', [ProductsController::class, 'update']);
    Route::post('products/{id}/delete', [ProductsController::class, 'delete']);

    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('categories/create', [CategoriesController::class, 'create']);
    Route::post('categories/store', [CategoriesController::class, 'store']);
    Route::get('categories/{id}/edit', [CategoriesController::class, 'edit']);
    Route::post('categories/{id}/update', [CategoriesController::class, 'update']);
    Route::post('categories/{id}/delete', [CategoriesController::class, 'delete']);
    Route::post('update-categories-order', [CategoriesController::class, 'updateCategoriesOrder']);
    
    Route::get('brands', [BrandsController::class, 'index']);
    Route::get('brands/create', [BrandsController::class, 'create']);
    Route::post('brands/store', [BrandsController::class, 'store']);
    Route::get('brands/{id}/edit', [BrandsController::class, 'edit']);
    Route::post('brands/{id}/update', [BrandsController::class, 'update']);
    Route::post('brands/{id}/delete', [BrandsController::class, 'delete']);
    Route::post('update-brands-order', [BrandsController::class, 'updateBrandsOrder']);

    Route::post('image-upload', [ImagesController::class, 'upload']);
    Route::post('update-image-order', [ImagesController::class, 'updateImageOrder']);
    Route::post('images/{id}/destroy', [ImagesController::class, 'destroy']);

    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('orders/{id}/show', [OrdersController::class, 'show']);
    Route::post('orders/{id}/update', [OrdersController::class, 'update']);

    Route::get('admin/conections', [ConectionsController::class, 'index'])->name('conections.index');
    Route::get('admin/conections/{id}', [ConectionsController::class, 'show'])->name('conections.show');
    Route::post('admin/conections/{id}/approve', [ConectionsController::class, 'approve'])->name('conections.approve');

    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');

    Route::get('admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('admin/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('admin/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::post('admin/users/{id}/update', [UsersController::class, 'update'])->name('users.update');
    Route::post('admin/users/{id}/destroy', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::get('admin/users/{id}', [UsersController::class, 'show'])->name('users.show');
    Route::post('admin/users/handle', [UsersController::class, 'handle'])->name('users.handle');

});

