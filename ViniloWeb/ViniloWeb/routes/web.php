<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ShoppingcartsController;
use App\Http\Controllers\NovedadesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\EstilosController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentMethodController;
use Illuminate\Support\Facades\Auth;



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

//vista inicio
Route::get('/', [ProductController::class, 'inicio'])->name('Inicio');


// Rutas relacionadas con la administración
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin_index');
    Route::post('/admin/note', [AdminController::class, 'updateNote'])->name('note_update');
    Route::post('/admin/note/{id}', [AdminController::class, 'updateNote'])->name('note_update');

});
///Rutas de author
Route::middleware('auth', 'admin')->group(function () {
    Route::get('authors', [AuthorController::class, 'index'])->name('authors_index');
    Route::get('authors/create', [AuthorController::class, 'create']);
    Route::post('/authors', [AuthorController::class, 'store'])->name('store_author');
    Route::get('author/{id}', [AuthorController::class, 'show'])->name('mostrar_author');
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('edit_author');
    Route::patch('/authors/up/{id}', [AuthorController::class, 'update'])->name('update_author');
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy'])->name('destroy_author');
    Route::get('authors/sort', [AuthorController::class, 'sortAuthors'])->name('sort_authors');
});

// Rutas de product
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/products/create', [ProductController::class, 'newProductGet'])->name('product_create_get');
    Route::post('/products', [ProductController::class, 'newProductPost'])->name('product_create_post');
    Route::get('/products', [ProductController::class, 'index'])->name('products_index');
    Route::get('/productsSorted', [ProductController::class, 'sortProducts'])->name('products_index_sorted');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products_show');
    Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete_product');
    Route::get('/products/up/{id}', [ProductController::class, 'updateProductGet'])->name('product_update_get');
    Route::put('/products/update/{id}', [ProductController::class, 'updateProduct'])->name('product_update');
});

// Rutas de genre
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/genres/create', [GenreController::class, 'create'])->name('genre_create');
    Route::post('/genres', [GenreController::class, 'newGenrePost'])->name('genre_create_post');
    Route::get('/genres', [GenreController::class, 'index'])->name('genres_index');
    Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres_show');
    Route::get('/genres/up/{id}', [GenreController::class, 'updateGenreGet'])->name('genre_update_get');
    Route::put('/genres/update/{id}', [GenreController::class, 'updateGenre'])->name('genre_update');
    Route::delete('/genres/delete/{id}', [GenreController::class, 'deleteGenre'])->name('delete_genre');
    Route::get('/genresSorted', [GenreController::class, 'sortGenres'])->name('genres_index_sorted');
});

//Rutas de pedido
Route::middleware('auth')->group(function () {
    Route::get('/orders/create', [OrderController::class, 'newOrderGet'])->name('order_create');
    Route::post('/orders', [OrderController::class, 'newOrderPost'])->name('order_create_post');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders_index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order_show');
    Route::get('/orders/up/{id}', [OrderController::class, 'updateOrderGet'])->name('order_update');
    Route::put('/orders/update/{id}', [OrderController::class, 'updateOrderPost'])->name('order_update_post');
    Route::delete('/orders/delete/{id}', [OrderController::class, 'deleteOrder'])->name('delete_order');
    Route::get('/orderSorted', [OrderController::class, 'sortOrders'])->name('orders_index_sorted');
    Route::get('/order/search', [OrderController::class, 'search'])->name('order_search');
});

//Rutas de carrito
Route::middleware('auth', 'admin')->group(function () {
    Route::delete('/shoppingcart', [ShoppingcartsController::class, 'destroy'])->name('shoppingcarts_destroy');
    Route::post('/shoppingcart', [ShoppingcartsController::class, 'create'])->name('shoppingcarts_create');
});

Route::middleware('auth')->group(function () {
    Route::get('/shoppingcart', [ShoppingcartsController::class, 'index'])->name('shoppingcarts_index');
    Route::post('/shoppingcart/add', [ShoppingcartsController::class, 'store'])->name('shoppingcarts_store');
    Route::delete('/shoppingcart/{productID}', [ShoppingcartsController::class, 'destroy_product'])->name('shoppingcarts_destroy_product');
    Route::delete('/shoppingcart', [ShoppingcartsController::class, 'clean'])->name('shoppingcarts_clean');
});

//Rutas de Novedades
Route::get('/novedades', [NovedadesController::class, 'index'])->name('novedades_index');

//Rutas de Review
Route::middleware('auth')->group(function () {
    Route::get('/product/{id}/review', [ProductController::class, 'reviewDisplay'])->name('review_index');
    Route::get('/review/{id}', [ReviewController::class, 'review'])->name('review_create');
    Route::post('/review/{id}', [ReviewController::class, 'post'])->name('review_post');
});

//Rutas de Artistas
Route::get('/artistas', [ArtistasController::class, 'index'])->name('artistas_index');
Route::get('/artistas/select', [ArtistasController::class, 'select'])->name('artistas_select');
Route::get('/artistas/{id}', [ArtistasController::class, 'show'])->name('artistas_show');
Route::get('/artistas/{genre}', [ArtistasController::class, 'filtro'])->name('artistas_filtrado');

//Rutas de Contáctanos
Route::get('/contactanos', [ContactanosController::class, 'main'])->name('contactanos_main');
Route::post('/contactanos', [ContactanosController::class, 'send'])->name('contactanos_send');

//Rutas de usuario
Route::middleware('admin')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users_index');
    Route::get('users/create', [UserController::class, 'create'])->name('users_create');
    Route::post('/users', [UserController::class, 'store'])->name('users_store');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users_show');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users_edit');
    Route::patch('/users/update/{id}', [UserController::class, 'update'])->name('users_update');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('destroy_user');
    Route::get('/usersSorted', [UserController::class, 'sortUsers'])->name('sort_users');
});

//Rutas de editar perfil
Route::middleware('auth')->group(function(){
    Route::get('/users/geti/{id}', [UserController::class, 'getUserOrders'])->name('users_order');
    Route::get('/change/password/{id}', [UserController::class, 'changePassword'])->name('change_password');
    Route::post('/users/passChange/{id}', [UserController::class, 'updatePassword'])->name('update_password');
    
    Route::get('users/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::get('users/profile/change/{id}', [UserController::class, 'changeProfile'])->name('change_profile');
    Route::post('users/profile/edit/{id}', [UserController::class, 'updateProfile'])->name('update_profile');
});


//Rutas busqueda
Route::get('/search', [SearchController::class, 'search'])->name('search');

//Sobrenosotros
Route::get('/sobre-nosotros', function () {
    return view('sobrenosotros');
});

//Producto detallado
Route::get('/product/{id}', [ProductController::class, 'detailed'])->name('products.detailed');
Route::get('/all', [ProductController::class, 'allProducts'])->name('all');

//Estilo Musical
Route::get('/estiloMusical', [EstilosController::class, 'estiloMusical'])->name('genre.estiloMusical');
Route::get('/estilo/filtro', [EstilosController::class, 'filtro'])->name('genre.filtro');
Route::get('/genres/{id}/products', [GenreController::class, 'genreProducts'])->name('genres.products');

//Rutas de Ofertas
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/sales/create', [App\Http\Controllers\SaleController::class, 'newSaleGet'])->name('sale_create_get');
    Route::post('/sales', [App\Http\Controllers\SaleController::class, 'newSalePost'])->name('sale_create_post');
    Route::get('/sales', [App\Http\Controllers\SaleController::class, 'index'])->name('sales_index');
    Route::delete('/sales/delete/{id}', [App\Http\Controllers\SaleController::class, 'deleteSale'])->name('delete_sale');
    Route::get('/sales/up/{id}', [App\Http\Controllers\SaleController::class, 'updateSaleGet'])->name('sale_update_get');
    Route::put('/sales/update/{id}', [App\Http\Controllers\SaleController::class, 'updateSale'])->name('sale_update');
});

// Vista de las Ofertas existentes
Route::get('/ofertas', [App\Http\Controllers\SaleController::class, 'indexOfertas'])->name('sales_ofertas');

//Lista deseados

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist_index');
    Route::post('wishlist/add/{product}', [WishlistController::class, 'add'])->name('wishlist_add');
    Route::delete('/wishlist/remove/{product}', [WishlistController::class, 'remove'])->name('wishlist_remove');
});

Route::get('/payment_methods', [PaymentMethodController::class, 'index'])->name('payment_methods.index');
Route::get('/payment_methods/create', [PaymentMethodController::class, 'create'])->name('payment_methods.create');
Route::post('/payment_methods', [PaymentMethodController::class, 'store'])->name('payment_methods.store');
Route::get('/payment_methods/{payment_method}', [PaymentMethodController::class, 'show'])->name('payment_methods.show');
Route::get('/payment_methods/{payment_method}/edit', [PaymentMethodController::class, 'edit'])->name('payment_methods.edit');
Route::put('/payment_methods/{payment_method}', [PaymentMethodController::class, 'update'])->name('payment_methods.update');
Route::delete('/payment_methods/{payment_method}', [PaymentMethodController::class, 'destroy'])->name('payment_methods.destroy');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
