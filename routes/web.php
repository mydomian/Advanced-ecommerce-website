<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/admin')->namespace('Admin')->group(function (){
// all admin route is define here
Route::match(['get','post'], '/', [\App\Http\Controllers\AdminController::class, 'login']);
Route::group(['middleware' => ['admin']], function(){

    Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard']);
    //admin settings route
    Route::get('settings/password', [\App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
    Route::post('update-password', [\App\Http\Controllers\AdminController::class, 'updatePassword']);
    Route::post('submit-update-password', [\App\Http\Controllers\AdminController::class, 'submitUpdatePassword']);
    Route::match(['get','post'], 'settings/update-admin-details', [\App\Http\Controllers\AdminController::class, 'adminDetails']);
    //Sections Route
    Route::match(['get','post'],'sections', [\App\Http\Controllers\SectionController::class, 'getSections']);
    Route::match(['get','post'],'sections/status/active/{id}', [\App\Http\Controllers\SectionController::class, 'sectionStatusActive']);
    Route::match(['get','post'],'sections/status/inactive/{id}', [\App\Http\Controllers\SectionController::class, 'sectionStatusInActive']);
    //Categores Route
    Route::match(['get','post'], 'categories', [\App\Http\Controllers\CategoryController::class, 'index']);
    Route::match(['get','post'],'categories/status/active/{id}', [\App\Http\Controllers\CategoryController::class, 'categoryStatusActive']);
    Route::match(['get','post'],'categories/status/inactive/{id}', [\App\Http\Controllers\CategoryController::class, 'categoryStatusInActive']);
    Route::match(['get','post'],'categories/add-categories', [\App\Http\Controllers\CategoryController::class, 'create']);
    Route::post('categories/store', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::post('append-categories-level', [\App\Http\Controllers\CategoryController::class, 'appendCategoryLevel']);
    Route::match(['get','post'],'categories/edit/{id}', [\App\Http\Controllers\CategoryController::class, 'edit']);
    Route::match(['get','post'],'categories/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('delete-categories/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);
    //brands Route
    Route::match(['get','post'], 'brands', [\App\Http\Controllers\BrandController::class, 'index']);
    Route::match(['get','post'],'brands/status/active/{id}', [\App\Http\Controllers\BrandController::class, 'brandStatusActive']);
    Route::match(['get','post'],'brands/status/inactive/{id}', [\App\Http\Controllers\BrandController::class, 'brandStatusInActive']);
    Route::match(['get','post'],'brands/add-brand', [\App\Http\Controllers\BrandController::class, 'create']);
    Route::post('brands/store', [\App\Http\Controllers\BrandController::class, 'store']);
    Route::match(['get','post'],'brands/edit/{id}', [\App\Http\Controllers\BrandController::class, 'edit']);
    Route::match(['get','post'],'brands/update/{id}', [\App\Http\Controllers\BrandController::class, 'update']);
    Route::get('delete-brands/{id}', [\App\Http\Controllers\BrandController::class, 'destroy']);
   //banners Route
    Route::match(['get','post'], 'banners', [\App\Http\Controllers\BannerController::class, 'index']);
    Route::match(['get','post'],'banners/status/active/{id}', [\App\Http\Controllers\BannerController::class, 'bannerStatusActive']);
    Route::match(['get','post'],'banners/status/inactive/{id}', [\App\Http\Controllers\BannerController::class, 'bannerStatusInActive']);
    Route::match(['get','post'],'banners/add-banners', [\App\Http\Controllers\BannerController::class, 'create']);
    Route::post('banners/store', [\App\Http\Controllers\BannerController::class, 'store']);
    Route::match(['get','post'],'banners/edit/{id}', [\App\Http\Controllers\BannerController::class, 'edit']);
    Route::match(['get','post'],'banners/update/{id}', [\App\Http\Controllers\BannerController::class, 'update']);
    Route::get('delete-banners/{id}', [\App\Http\Controllers\BannerController::class, 'destroy']);
    //products Route
    Route::match(['get','post'], 'products', [\App\Http\Controllers\ProductController::class, 'index']);
    Route::match(['get','post'],'products/status/active/{id}', [\App\Http\Controllers\ProductController::class, 'productStatusActive']);
    Route::match(['get','post'],'products/status/inactive/{id}', [\App\Http\Controllers\ProductController::class, 'productStatusInActive']);
    Route::match(['get','post'],'products/add-products', [\App\Http\Controllers\ProductController::class, 'create']);
    Route::post('products/store', [\App\Http\Controllers\ProductController::class, 'store']);
    Route::match(['get','post'],'products/edit/{id}', [\App\Http\Controllers\ProductController::class, 'edit']);
    Route::match(['get','post'],'products/update/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
    Route::get('delete-products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
    //product attribute Route
    Route::match(['get','post'],'products/attribute/{id}', [\App\Http\Controllers\ProductController::class, 'productAttribue']);
    Route::match(['get','post'],'products/store-attribute/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributeStore']);
    Route::match(['get','post'],'products/update-attribute/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributeUpdate']);
//    Route::match(['get','post'],'products-attribute/status/active/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributeStatusActive']);
//    Route::match(['get','post'],'products-attribute/status/inactive/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributeStatusInActive']);
    Route::get('delete-productattribute/{id}', [\App\Http\Controllers\ProductController::class, 'productAttributeDelete']);
    //product multiple images
    Route::match(['get','post'],'products/images/{id}', [\App\Http\Controllers\ProductImageController::class, 'productMultiImage']);
    Route::match(['get','post'],'products-images/status/active/{id}', [\App\Http\Controllers\ProductImageController::class, 'productImageStatusActive']);
    Route::match(['get','post'],'products-images/status/inactive/{id}', [\App\Http\Controllers\ProductImageController::class, 'productImageStatusInActive']);
    Route::match(['get','post'],'products/images/store/{id}', [\App\Http\Controllers\ProductImageController::class, 'productImageStore']);
    Route::get('delete-products-image/{id}', [\App\Http\Controllers\ProductImageController::class, 'ProductImageDelete']);
    //admin logout route
    Route::get('logout', [\App\Http\Controllers\AdminController::class, 'logout']);
});
});

// all front-end route is define here
Route::namespace('Front')->group(function (){
    //front index
    Route::get('/', [\App\Http\Controllers\Front\IndexController::class, 'index']);
    //listing url route
    $urls = \App\Category::select('url')->where('status',1)->pluck('url')->toArray();
    foreach ($urls as $url){
        Route::get('/'.$url, [\App\Http\Controllers\Front\ProductsController::class, 'listing']);
    }
    //product details route
    Route::get('/product/{id}', [\App\Http\Controllers\Front\ProductsController::class, 'productDetails']);
    //get product price
    Route::post('/get-product-price', [\App\Http\Controllers\Front\ProductsController::class, 'getProductPrice']);
    //add to cart
    Route::post('/add-to-cart',[\App\Http\Controllers\Front\ProductsController::class, 'addToCart']);
    //shopping cart details
    Route::get('/cart',[\App\Http\Controllers\Front\ProductsController::class, 'cartDetail']);
    //update quantity
    Route::post('/get-update-quantity', [\App\Http\Controllers\Front\ProductsController::class, 'updateQty']);
    //delete quantity
    Route::post('/delete-cart-item', [\App\Http\Controllers\Front\ProductsController::class, 'deleteCartItem']);
});
