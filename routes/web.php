<?php

use App\Http\Controllers\AdminAlbumController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserCatalogueController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminProductCatalogueController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminPostCatalogueController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\ProductControllers;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\MailControllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeControllers::class, 'index'])->name('home.index');
Route::get('/contact', [HomeControllers::class, 'contact'])->name('home.contact');
//send mail
Route::post('/send-mail', [HomeControllers::class, 'sendMail'])->name('contact.sendmail');
Route::get('/about', [HomeControllers::class, 'about'])->name('home.about');

// product
Route::get('/product', [ProductControllers::class, 'index'])->name('product.index');
Route::get('/product/category/{id}', [ProductControllers::class, 'category'])->name('product.category');
Route::get('/product/brand/{id}', [ProductControllers::class, 'brand'])->name('product.brand');
Route::get('/product/detail/{id}', [ProductControllers::class, 'detail'])->name('product.detail');
Route::post('/product/{id}/comment', [ProductControllers::class, 'storeComment'])->name('product.comment');
Route::delete('/comment/{id}', [ProductControllers::class, 'destroy'])->name('comment.destroy');


// post
Route::get('/post', [PostControllers::class, 'index'])->name('post.index');
Route::get('/post/category/{id}', [PostControllers::class, 'category'])->name('post.category');
Route::get('/post/detail/{id}', [PostControllers::class, 'detail'])->name('post.detail');
Route::post('/post/{id}/comment', [PostControllers::class, 'storeComment'])->name('post.comment');
Route::delete('/comment/{id}', [PostControllers::class, 'destroy'])->name('comment.destroy');


//cart 
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store'); //create cart
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update'); // update cart
Route::delete('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy'); //xóa 1
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear'); // clear cart

// checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('cart.checkout');
Route::post('/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
Route::get('/thanks', [CheckoutController::class, 'thanks'])->name('checkout.thanks');


// search products
Route::get('/search', [ProductControllers::class, 'search'])->name('product.search');



// filter product
Route::get('/filterBySort', [AjaxController::class, 'sort'])->name('product.sort');


// dashboard
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//admin product
Route::get('/admin/product', [AdminProductController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.product');
Route::post('/product/search', [AdminProductController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/product/create', [AdminProductController::class, 'create'])->middleware(['auth', 'verified'])->name('product.create');
Route::post('/product/store', [AdminProductController::class, 'store'])->middleware(['auth', 'verified'])->name('product.store');
Route::get('/product/update/{id}', [AdminProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');
Route::post('/product/edit/{id}', [AdminProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('product.edit');
Route::get('/product/delete/{id}', [AdminProductController::class, 'delete'])->middleware(['auth', 'verified'])->name('product.delete');
Route::delete('/product/destroy/{id}', [AdminProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.destroy');
Route::delete('/product/softDelete/{id}', [AdminProductController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('product.softdelete');

//product catalogues
Route::get('/admin/product/catalogues', [AdminProductCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.product.catalogues');
Route::post('/product/catalogue/search', [AdminProductCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/product/catalogue/create', [AdminProductCatalogueController::class, 'create'])->middleware(['auth', 'verified'])->name('product.catalogue.create');
Route::post('/product/catalogue/store', [AdminProductCatalogueController::class, 'store'])->middleware(['auth', 'verified'])->name('product.catalogue.store');
Route::get('/product/catalogue/update/{id}', [AdminProductCatalogueController::class, 'update'])->middleware(['auth', 'verified'])->name('product.catalogue.update');
Route::post('/product/catalogue/edit/{id}', [AdminProductCatalogueController::class, 'edit'])->middleware(['auth', 'verified'])->name('product.catalogue.edit');
Route::get('/product/catalogue/delete/{id}', [AdminProductCatalogueController::class, 'delete'])->middleware(['auth', 'verified'])->name('product.catalogue.delete');
Route::delete('/product/catalogue/destroy/{id}', [AdminProductCatalogueController::class, 'destroy'])->middleware(['auth', 'verified'])->name('product.catalogue.destroy');
Route::delete('/product/catalogue/softDelete/{id}', [AdminProductCatalogueController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('product.catalogue.softdelete');

//brand 
Route::get('/admin/brands', [AdminBrandController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.brands');
Route::post('/brand/search', [AdminBrandController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/brand/create', [AdminBrandController::class, 'create'])->middleware(['auth', 'verified'])->name('brand.create');
Route::post('/brand/store', [AdminBrandController::class, 'store'])->middleware(['auth', 'verified'])->name('brand.store');
Route::get('/brand/update/{id}', [AdminBrandController::class, 'update'])->middleware(['auth', 'verified'])->name('brand.update');
Route::post('/brand/edit/{id}', [AdminBrandController::class, 'edit'])->middleware(['auth', 'verified'])->name('brand.edit');
Route::get('/brand/delete/{id}', [AdminBrandController::class, 'delete'])->middleware(['auth', 'verified'])->name('brand.delete');
Route::delete('/brand/destroy/{id}', [AdminBrandController::class, 'destroy'])->middleware(['auth', 'verified'])->name('brand.destroy');
Route::delete('/brand/softDelete/{id}', [AdminBrandController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('brand.softdelete');

//banner 
Route::get('/admin/banners', [AdminBannerController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.banners');
Route::post('/banner/search', [AdminBannerController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/banner/create', [AdminBannerController::class, 'create'])->middleware(['auth', 'verified'])->name('banner.create');
Route::post('/banner/store', [AdminBannerController::class, 'store'])->middleware(['auth', 'verified'])->name('banner.store');
Route::get('/banner/update/{id}', [AdminBannerController::class, 'update'])->middleware(['auth', 'verified'])->name('banner.update');
Route::post('/banner/edit/{id}', [AdminBannerController::class, 'edit'])->middleware(['auth', 'verified'])->name('banner.edit');
Route::get('/banner/delete/{id}', [AdminBannerController::class, 'delete'])->middleware(['auth', 'verified'])->name('banner.delete');
Route::delete('/banner/destroy/{id}', [AdminBannerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('banner.destroy');
Route::delete('/banner/softDelete/{id}', [AdminBannerController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('banner.softdelete');

// albums ảnh
Route::get('/admin/albums', [AdminAlbumController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.albums');
Route::post('/album/search', [AdminAlbumController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/album/create', [AdminAlbumController::class, 'create'])->middleware(['auth', 'verified'])->name('album.create');
Route::post('/album/store', [AdminAlbumController::class, 'store'])->middleware(['auth', 'verified'])->name('album.store');
Route::get('/album/update/{id}', [AdminAlbumController::class, 'update'])->middleware(['auth', 'verified'])->name('album.update');
Route::post('/album/edit/{id}', [AdminAlbumController::class, 'edit'])->middleware(['auth', 'verified'])->name('album.edit');
Route::get('/album/delete/{id}', [AdminAlbumController::class, 'delete'])->middleware(['auth', 'verified'])->name('album.delete');
Route::delete('/album/destroy/{id}', [AdminAlbumController::class, 'destroy'])->middleware(['auth', 'verified'])->name('album.destroy');
Route::delete('/album/softDelete/{id}', [AdminAlbumController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('album.softdelete');

//order
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.orders');
Route::get('/order/create', [AdminOrderController::class, 'create'])->middleware(['auth', 'verified'])->name('order.create');
Route::post('/order/store', [AdminOrderController::class, 'store'])->middleware(['auth', 'verified'])->name('order.store');
Route::post('/order/search', [AdminOrderController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/order/detail/{id}', [AdminOrderController::class, 'detail'])->middleware(['auth', 'verified'])->name('order.detail');
Route::get('/order/update/{id}', [AdminOrderController::class, 'update'])->middleware(['auth', 'verified'])->name('order.update');
Route::post('/order/edit/{id}', [AdminOrderController::class, 'edit'])->middleware(['auth', 'verified'])->name('order.edit');
Route::get('/order/delete/{id}', [AdminOrderController::class, 'delete'])->middleware(['auth', 'verified'])->name('order.delete');
Route::delete('/order/destroy/{id}', [AdminOrderController::class, 'destroy'])->middleware(['auth', 'verified'])->name('order.destroy');
Route::delete('/order/softDelete/{id}', [AdminOrderController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('order.softdelete');

//user catalogues
Route::get('/admin/user/catalogues', [AdminUserCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.user.catalogues');
Route::post('/user/catalogue/search', [AdminUserCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/user/catalogue/create', [AdminUserCatalogueController::class, 'create'])->middleware(['auth', 'verified'])->name('user.catalogue.create');
Route::post('/user/catalogue/store', [AdminUserCatalogueController::class, 'store'])->middleware(['auth', 'verified'])->name('user.catalogue.store');
Route::get('/user/catalogue/update/{id}', [AdminUserCatalogueController::class, 'update'])->middleware(['auth', 'verified'])->name('user.catalogue.update');
Route::post('/user/catalogue/edit/{id}', [AdminUserCatalogueController::class, 'edit'])->middleware(['auth', 'verified'])->name('user.catalogue.edit');
Route::get('/user/catalogue/delete/{id}', [AdminUserCatalogueController::class, 'delete'])->middleware(['auth', 'verified'])->name('user.catalogue.delete');
Route::delete('/user/catalogue/destroy/{id}', [AdminUserCatalogueController::class, 'destroy'])->middleware(['auth', 'verified'])->name('user.catalogue.destroy');
Route::delete('/user/catalogue/softDelete/{id}', [AdminUserCatalogueController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('user.catalogue.softdelete');

// user
Route::get('/admin/users', [AdminUserController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.users');
Route::post('/user/search', [AdminUserController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/user/create', [AdminUserController::class, 'create'])->middleware(['auth', 'verified'])->name('user.create');
Route::post('/user/store', [AdminUserController::class, 'store'])->middleware(['auth', 'verified'])->name('user.store');
Route::get('/user/update/{id}', [AdminUserController::class, 'update'])->middleware(['auth', 'verified'])->name('user.update');
Route::post('/user/edit/{id}', [AdminUserController::class, 'edit'])->middleware(['auth', 'verified'])->name('user.edit');
Route::get('/user/delete/{id}', [AdminUserController::class, 'delete'])->middleware(['auth', 'verified'])->name('user.delete');
Route::delete('/user/destroy/{id}', [AdminUserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('user.destroy');
Route::delete('/user/softDelete/{id}', [AdminUserController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('user.softdelete');


//post
Route::get('/admin/posts', [AdminPostController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.posts');
Route::post('/post/search', [AdminPostController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/post/create', [AdminPostController::class, 'create'])->middleware(['auth', 'verified'])->name('post.create');
Route::post('/post/store', [AdminPostController::class, 'store'])->middleware(['auth', 'verified'])->name('post.store');
Route::get('/post/update/{id}', [AdminPostController::class, 'update'])->middleware(['auth', 'verified'])->name('post.update');
Route::post('/post/edit/{id}', [AdminPostController::class, 'edit'])->middleware(['auth', 'verified'])->name('post.edit');
Route::get('/post/delete/{id}', [AdminPostController::class, 'delete'])->middleware(['auth', 'verified'])->name('post.delete');
Route::delete('/post/destroy/{id}', [AdminPostController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.destroy');
Route::delete('/post/softDelete/{id}', [AdminPostController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('post.softdelete');

//post catalogues
Route::get('/admin/post/catalogues', [AdminPostCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.post.catalogues');
Route::post('/post/catalogue/search', [AdminPostCatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/post/catalogue/create', [AdminPostCatalogueController::class, 'create'])->middleware(['auth', 'verified'])->name('post.catalogue.create');
Route::post('/post/catalogue/store', [AdminPostCatalogueController::class, 'store'])->middleware(['auth', 'verified'])->name('post.catalogue.store');
Route::get('/post/catalogue/update/{id}', [AdminPostCatalogueController::class, 'update'])->middleware(['auth', 'verified'])->name('post.catalogue.update');
Route::post('/post/catalogue/edit/{id}', [AdminPostCatalogueController::class, 'edit'])->middleware(['auth', 'verified'])->name('post.catalogue.edit');
Route::get('/post/catalogue/delete/{id}', [AdminPostCatalogueController::class, 'delete'])->middleware(['auth', 'verified'])->name('post.catalogue.delete');
Route::delete('/post/catalogue/destroy/{id}', [AdminPostCatalogueController::class, 'destroy'])->middleware(['auth', 'verified'])->name('post.catalogue.destroy');
Route::delete('/post/catalogue/softDelete/{id}', [AdminPostCatalogueController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('post.catalogue.softdelete');

//comment
Route::get('/admin/comments', [AdminCommentController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.comments');
Route::post('/comment/search', [AdminCommentController::class, 'index'])->middleware(['auth', 'verified'])->name('index.search');
Route::get('/comment/create', [AdminCommentController::class, 'create'])->middleware(['auth', 'verified'])->name('comment.create');
Route::post('/comment/store', [AdminCommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment.store');
Route::get('/comment/update/{id}', [AdminCommentController::class, 'update'])->middleware(['auth', 'verified'])->name('comment.update');
Route::post('/comment/edit/{id}', [AdminCommentController::class, 'edit'])->middleware(['auth', 'verified'])->name('comment.edit');
Route::get('/comment/delete/{id}', [AdminCommentController::class, 'delete'])->middleware(['auth', 'verified'])->name('comment.delete');
Route::delete('/comment/destroy/{id}', [AdminCommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('comment.destroy');
Route::delete('/comment/softDelete/{id}', [AdminCommentController::class, 'softDelete'])->middleware(['auth', 'verified'])->name('comment.softdelete');

// auth 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
