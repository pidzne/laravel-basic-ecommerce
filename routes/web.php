<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\BlogCateController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactsController;
use App\Http\Controllers\FrontEnd\LoadBlogController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Social\FacebookController;
use App\Http\Controllers\Social\GoogleController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     abort(404);
// });

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// login with facebook
Route::get('auth', [FacebookController::class, 'facebookRedirect'])->name('facebook.redirect');
Route::get('callback', [FacebookController::class, 'facebookLogin'])->name('facebook.login');

// login with google
Route::get('authGoogle', [GoogleController::class, 'googleRedirect'])->name('google.redirect');
Route::get('callbackGoogle', [GoogleController::class, 'googleLogin'])->name('google.login');

// frontend
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about-us', [FrontendController::class, 'getAboutUs']);
Route::get('/faq', [FrontendController::class, 'getFaq']);
// Route::post('/add-to-cart', [FrontEndController::class, 'addToCart']);
Route::get('/delete-prod-cart/{rowId}', [FrontEndController::class, 'deleteProdCart']);

// products
Route::get('/products', [ProductsController::class, 'allProducts']);
Route::get('/product-detail/{id}', [ProductsController::class, 'productDetail']);
Route::get('/product-cate/{id}', [ProductsController::class, 'productByCategory']);

// cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'saveCart']);
Route::post('/update-cart', [CartController::class, 'updateCart']);
Route::get('/delete-cart/{rowId}', [CartController::class, 'deleteCart']);
Route::get('/delete-all-cart', [CartController::class, 'deleteAllCart']);

// contact
Route::get('/contact', [ContactsController::class, 'contact']);
Route::post('/contact', [ContactsController::class, 'insertContact']);

// search
Route::get('/search', [SearchController::class, 'search']);

// sort
Route::get('/filter-view', [ProductsController::class,'filterByView'])->name('filter.view');
Route::get('/filter-rating', [ProductsController::class,'filterByRating'])->name('filter.rating');
Route::get('/filter-price', [ProductsController::class,'filterByPrice'])->name('filter.price');

// filter
Route::get('/filter-prod-cate', [ProductsController::class, 'filterByCate']);
Route::get('/filter-prod-brand', [ProductsController::class, 'filterByBrand']);

// success-order
Route::get('/success-order', [FrontendController::class, 'getSuccessOrders'])->name('success.index');

// blog
Route::get('/load-list-blog', [LoadBlogController::class, 'index'])->name('blogger.index');
Route::get('/load-detail-blog/{id}', [LoadBlogController::class, 'show'])->name('blogger.show');
Route::get('blog-by-cate/{id}', [LoadBlogController::class, 'loadBlogByCate'])->name('blogger.cate');
Route::get('blog-search', [LoadBlogController::class, 'searchBlog'])->name('blogger.search');

Route::middleware(['auth'])->group(function () {
    // checkout
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/place-order', [CheckoutController::class, 'placeOrder']);

    // orders
    Route::get('/my-orders', [OrderController::class, 'index']);
    Route::get('/detail-orders/{id}', [OrderController::class, 'detail']);
    Route::get('/edit-orders/{id}', [OrderController::class, 'edit']);
    Route::patch('/cancel-orders/{id}', [OrderController::class, 'cancelOrders']);

    // account
    Route::get('/account-detail', [UserController::class, 'index']);
    Route::get('/account-edit/{id}', [UserController::class, 'edit']);
    Route::patch('/account-update/{id}', [UserController::class, 'update']);
    Route::get('/account-chpass', [UserController::class, 'changePass']);
    Route::post('/account-chpass', [UserController::class, 'updatePass']);

    // comment
    Route::post('/add-ratings', [ProductsController::class, 'addCmt']);

    // wishlist
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/add-wishlist/{id}', [WishlistController::class, 'add']);
    Route::get('/delete-wishlist/{id}', [WishlistController::class, 'delete']);

    // address book
    Route::get('/list-address', [UserController::class, 'getIndexAddress'])->name('address.index');
    Route::get('/add-address', [UserController::class, 'createAddress'])->name('address.create');
    Route::post('/insert-address', [UserController::class, 'storeAddress'])->name('address.store');
    Route::get('/edit-address/{id}', [UserController::class, 'editAddress'])->name('address.edit');
    Route::put('/update-address/{id}', [UserController::class, 'updateAddress'])->name('address.update');
    Route::get('/delete-address/{id}', [UserController::class, 'destroyAddress'])->name('address.destroy');
});

// backend
Route::prefix('admin')->namespace('admin')->middleware(['auth', 'checkRole'])->group(function () {
    // dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // category
    Route::get('/list-category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/insert-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/un-active-category/{id}', [CategoryController::class, 'unActive'])->name('category.unactive');
    Route::get('/active-category/{id}', [CategoryController::class, 'active'])->name('category.active');

    // brand
    Route::get('/list-brand', [BrandController::class,'index'])->name('brand.index');
    Route::get('/add-brand', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/insert-brand', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/update-brand/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/delete-brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/un-active-brand/{id}', [BrandController::class, 'unActive'])->name('brand.unactive');
    Route::get('/active-brand/{id}', [BrandController::class, 'active'])->name('brand.active');

    // product
    Route::get('/list-product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/insert-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/un-active-product/{id}', [ProductController::class, 'unActive'])->name('product.unactive');
    Route::get('/active-product/{id}', [ProductController::class, 'active'])->name('product.active');

    // color 
    Route::get('/list-color/{id}', [ProductController::class, 'getColorProduct'])->name('color.index');
    Route::post('/add-color', [ProductController::class, 'createColorProduct'])->name('color.store');
    Route::get('/delete-color/{id}', [ProductController::class, 'destroyColorProduct'])->name('color.destroy');

    // size
    Route::get('/list-size/{id}', [ProductController::class, 'getSizeProduct'])->name('size.index');
    Route::post('/add-size', [ProductController::class, 'createSizeProduct'])->name('size.store');
    Route::get('/delete-size/{id}', [ProductController::class, 'destroySizeProduct'])->name('size.destroy');
    
    // orders
    Route::get('/list-order', [OrdersController::class, 'index'])->name('order_admin.index');
    Route::get('/detail-order/{id}', [OrdersController::class, 'show'])->name('order_admin.show');
    Route::get('/edit-order/{id}', [OrdersController::class, 'edit'])->name('order_admin.edit');
    Route::patch('/update-order/{id}', [OrdersController::class, 'update'])->name('order_admin.update');
    Route::get('/delete-order/{id}', [OrdersController::class, 'destroy'])->name('order_admin.destroy');

    // users
    Route::get('/list-user', [UsersController::class, 'index'])->name('user_admin.index');
    // Route::get('/detail-user/{id}', [UsersController::class, 'show'])->name('user_admin.show');
    Route::get('/edit-user/{id}', [UsersController::class, 'edit'])->name('user_admin.edit');
    Route::patch('/update-user/{id}', [UsersController::class, 'update'])->name('user_admin.update');
    Route::get('/delete-user/{id}', [UsersController::class, 'destroy'])->name('user_admin.destroy');

    // comment
    Route::get('/list-comment', [CommentController::class, 'index'])->name('comment.index');
    Route::get('/un-active-comment/{id}', [CommentController::class, 'unActive'])->name('comment.unactive');
    Route::get('/active-comment/{id}', [CommentController::class, 'active'])->name('comment.active');

    // contact
    Route::get('/list-contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/delete-contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    // sliders
    Route::get('/list-slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/add-slider', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/insert-slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/edit-slider/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/update-slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/delete-slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::get('/un-active-slider/{id}', [SliderController::class, 'unActive'])->name('slider.unactive');
    Route::get('/active-slider/{id}', [SliderController::class, 'active'])->name('slider.active');

    // albums
    Route::get('/list-album/{id}',[AlbumController::class,'index'])->name('album.index');
    Route::get('/add-album/{prod_id}', [AlbumController::class, 'create'])->name('album.create');
    Route::post('/add-album/{prod_id}', [AlbumController::class, 'store'])->name('album.store');
    Route::get('/edit-album/{id}', [AlbumController::class, 'edit'])->name('album.edit');
    Route::put('/update-album/{id}', [AlbumController::class, 'update'])->name('album.update');
    Route::get('/delete-album/{id}', [AlbumController::class, 'destroy'])->name('album.destroy');
    Route::get('/un-active-album/{id}', [AlbumController::class, 'unActive'])->name('album.unactive');
    Route::get('/active-album/{id}', [AlbumController::class, 'active'])->name('album.active');

    // blog-cate
    Route::get('/list-blog-cate', [BlogCateController::class, 'index'])->name('blog_cate.index');
    Route::get('/add-blog-cate', [BlogCateController::class, 'create'])->name('blog_cate.create');
    Route::post('/insert-blog-cate', [BlogCateController::class, 'store'])->name('blog_cate.store');
    Route::get('/edit-blog-cate/{id}', [BlogCateController::class, 'edit'])->name('blog_cate.edit');
    Route::put('/update-blog-cate/{id}', [BlogCateController::class, 'update'])->name('blog_cate.update');
    Route::get('/delete-blog-cate/{id}', [BlogCateController::class, 'destroy'])->name('blog_cate.destroy');
    Route::get('/un-active-blog-cate/{id}', [BlogCateController::class, 'unActive'])->name('blog_cate.unactive');
    Route::get('/active-blog-cate/{id}', [BlogCateController::class, 'active'])->name('blog_cate.active');

    // blog
    Route::get('/list-blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/add-blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/insert-blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('/un-active-blog/{id}', [BlogController::class, 'unActive'])->name('blog.unactive');
    Route::get('/active-blog/{id}', [BlogController::class, 'active'])->name('blog.active');

    // analytics
    Route::get('/stats', [AnalyticsController::class, 'index'])->name('analytic.index');

    // search, filter by
    Route::get('/search-user', [UsersController::class, 'multipleSearchUsers'])->name('search_user');
    Route::get('/search-order', [OrdersController::class, 'multipleSearchOrder'])->name('search_order');

    // // coupon
    // Route::get('/list-coupon', [CouponController::class, 'index'])->name('coupon.index');
    // Route::get('/add-coupon', [CouponController::class, 'create'])->name('coupon.create');
    // Route::post('/insert-coupon', [CouponController::class, 'store'])->name('coupon.store');
    // Route::get('/edit-coupon/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    // Route::put('/update-coupon/{id}', [CouponController::class, 'update'])->name('coupon.update');
    // Route::get('/delete-coupon/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');

    // // shipping-fee
    // Route::get('/list-shipping-fee', [ShippingController::class, 'index'])->name('shipping_fee.index');
    // Route::get('/add-shipping-fee', [ShippingController::class, 'create'])->name('shipping_fee.create');
    // Route::post('insert-shipping-fee', [ShippingController::class, 'store'])->name('shipping_fee.store');
    // Route::get('edit-shipping-fee/{id}', [ShippingController::class, 'edit'])->name('shipping_fee.edit');
    // Route::put('update-shipping-fee/{id}', [ShippingController::class, 'update'])->name('shipping_fee.update');
    // Route::get('delete-shipping-fee/{id}', [ShippingController::class, 'destroy'])->name('shipping_fee.delete');

});
