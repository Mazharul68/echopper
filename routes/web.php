<?php
use App\Models\shipDistrict;
use Illuminate\Support\Facades\Auth;
Use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CardController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Frontend\indexController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Admin\ShippingAreaController;

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
//======================Home_page======================
Route::get('/',[indexController::class,'index']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');

// ============================Admin_Route_Here===========================================
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
//Admin Profile
Route::get('profile',[AdminController::class,'admin_profile'])->name('admin_profile');
Route::post('profile/Info',[AdminController::class,'update_data'])->name('update_data');
Route::get('update/image',[AdminController::class,'UpdateImage'])->name('image_update');
Route::post('update/store',[AdminController::class,'imgStore'])->name('store_image');
Route::get('update/password',[AdminController::class,'ChangePassword'])->name('change_password');
Route::post('update/password',[AdminController::class,'change_password'])->name('change_password');
// All Users Route Are Here
Route::get('all/users',[AdminController::class,'allUsers'])->name('all.users');
Route::get('user/unbanned/{id}',[AdminController::class,'userUnbanned']);
Route::get('user/banned/{id}',[AdminController::class,'userBanned']);
//Brand Route Here
Route::get('All-Brands',[BrandController::class,'index'])->name('brands');
Route::post('Brands/store',[BrandController::class,'BrandStore'])->name('brand-store');
Route::get('/brand-edit/{brand_id}',[BrandController::class,'BrandEdit']);
Route::post('/update-brand/',[BrandController::class,'BrandUpdate'])->name('update-brand');
Route::get('/brand-delete/{brand_id}',[BrandController::class,'BrandDelete']);

//Category Route Here
Route::get('category',[CategoryController::class,'index'])->name('category');
Route::post('/category-store/',[CategoryController::class,'CategoryStore'])->name('category-store');
Route::get('/category-edit/{cat_id}',[CategoryController::class,'CategoryEdit']);
Route::get('/category-delete/{cat_id}',[CategoryController::class,'CategoryDelete']);
Route::post('/update-category/',[CategoryController::class,'CategoryUpdate'])->name('update-category');
//Sub-Category route Here

Route::get('sub-category',[CategoryController::class,'SubIndex'])->name('sub-category');

Route::post('/sub-category-store/',[CategoryController::class,'SubCategoryStore'])->name('subcategory-store');

Route::get('/subcategory-edit/{subcat_id}',[CategoryController::class,'SubCategoryEdit']);

Route::post('/update/subcategory/',[CategoryController::class,'SubCategoryUpdate'])->name('update/subcategory');
Route::get('/subcategory-delete/{subcat_id}',[CategoryController::class,'SubCategoryDelete']);

//=====================================Sub Sub-Category Route Here
Route::get('sub-sub-category',[CategoryController::class,'SubSubIndex'])->name('sub-sub-category');
//With Ajax
 Route::get('/subcategory/ajax/{cat_id}',[CategoryController::class,'getSubCat']);
 Route::post('/sub-subcategory-store/',[CategoryController::class,'SubsubCategoryStore'])->name('sub-subcategory-store');
 Route::get('/sub-subcategory-edit/{subsubcat_id}',[CategoryController::class,'SubsubCategoryEdit']);
  Route::post('/ubdate-sub-sub-category/',[CategoryController::class,'SubsubCategoryUpdate'])->name('ubdate-sub-sub-category');
 Route::get('/sub-subcategory-delete/{subsubcat_id}',[CategoryController::class,'subsubCatgoryDelete']);
 //Product Route Are Here
 Route::get('add-product',[ProductController::class,'AddProduct'])->name('add-product');
 Route::post('/product-store/',[ProductController::class,'ProductStore'])->name('store-product');
 Route::get('/sub-subcategory/ajax/{subcat_id}',[ProductController::class,'getSubSubCat']);
 Route::get('/manage-product/',[ProductController::class,'ManageProduct'])->name('manage-product');
 Route::get('/product-edit/{product_id}',[ProductController::class,'ProductEdit']);
 Route::post('/update-product',[ProductController::class,'ProductUpdate'])->name('update-product');

 Route::get('/product-delete/{product_id}',[ProductController::class,'ProductDelete']);

Route::post('/update-product-image',[ProductController::class,'ProductMultiImg'])->name('update-product-image');
Route::post('/update-product-thambnail',[ProductController::class,'Productthamb'])->name('update-product-thambnail');
Route::get('/product/multiimg/delete/{id}',[ProductController::class,'ProductMultiDel']);
Route::get('/product-inactive/{id}',[ProductController::class,'ProductInactive']);
Route::get('/product-active/{id}',[ProductController::class,'ProductActive']);
//Slider Route Here
Route::get('/sliders',[SliderController::class,'index'])->name('sliders');
Route::post('/slider/store/',[SliderController::class,'SliderStore'])->name('slider-store');
Route::get('/sliders-edit/{id}',[SliderController::class,'SliderEdit']);
 Route::post('/update-slider',[SliderController::class,'SliderUpdate'])->name('update-slider');

Route::get('/sliders-delete/{id}',[SliderController::class,'SliderDelete']);
Route::get('/slider-inactive/{id}',[SliderController::class,'SliderInactive']);
Route::get('/slider-active/{id}',[SliderController::class,'SliderActive']);
// Coupon
Route::get('/coupon',[CouponController::class,'Coupon'])->name('coupon');
Route::post('/coupon-store',[CouponController::class,'CouponStore'])->name('coupon-store');
Route::get('/coupon-edit/{coupon_id}',[CouponController::class,'CouponEdit']);
Route::post('/update-coupon/',[CouponController::class,'CouponUpdate'])->name('update-coupon');
Route::get('/coupon-delete/{coupon_id}',[CouponController::class,'CouponDelete']);

// Division Area Route Are Here
Route::get('/division/',[ShippingAreaController::class,'division'])->name('division');
Route::post('/division-store/',[ShippingAreaController::class,'DivisionStore'])->name('division-store');
Route::get('/division-edit/{division_id}',[ShippingAreaController::class,'DivisionEdit']);
Route::get('/division-delete/{division_id}',[ShippingAreaController::class,'DivisionDelete']);
Route::post('/update-division/',[ShippingAreaController::class,'UpdateDivision'])->name
('division-update');

/// Disctrict Route Here
Route::get('/district/',[ShippingAreaController::class,'District'])->name('district');
Route::post('/district-store/',[ShippingAreaController::class,'districtStore'])->name('district-store');
Route::get('/district-edit/{district_id}',[ShippingAreaController::class,'DistrictEdit']);
Route::get('/district-delete/{district_id}',[ShippingAreaController::class,'DistrictDelete']);
Route::post('/update-district/',[ShippingAreaController::class,'UpdateDistrict'])->name
('district-update');

// Thana route Here
Route::get('/thana/',[ShippingAreaController::class,'thana'])->name('thana');
//District Name With Ajax
Route::get('district-get/ajax/{division_id}',[ShippingAreaController::class,'GetDistrict']);
Route::post('/thana-store/',[ShippingAreaController::class,'ThanaStore'])->name('thana-store');
Route::get('/thana-edit/{thana_id}',[ShippingAreaController::class,'ThanaEdit']);
Route::get('/thana-delete/{thana_id}',[ShippingAreaController::class,'ThanaDelete']);
Route::post('/update-Thana/',[ShippingAreaController::class,'UpdateThana'])->name
('thana-update');

// Order Route Are Here Pending
Route::get('/pending-orders/',[OrderController::class,'PendingOrders'])->name('pending-orders');
Route::get('/order-view/{order_id}',[OrderController::class, 'ViewOrders']);
Route::get('pending/order-delete/{order_id}',[OrderController::class, 'PendingDelete']);
//Confirmed Orders
Route::get('confirmed/order',[OrderController::class, 'ConfirmOrder'])->name('confirmed-orders');
// Processing Orders
Route::get('processing-orders',[OrderController::class,'ProcessingOrder'])->name('processing-orders');
//Picked Orders
Route::get('picked-orders',[OrderController::class,'PickedOrder'])->name('picked-orders');
// Shipping Orders
Route::get('shipping-orders',[OrderController::class,'ShippingOrder'])->name('shipping-orders');
//deleverd Orders
Route::get('delevered-orders',[OrderController::class,'DeleveredOrder'])->name('delevered-orders');
//Cancel Orders
Route::get('cancel-orders',[OrderController::class,'CancelOrder'])->name('cancel-orders');
//Pending to Confirm
Route::get('/pending-to-confirm/{order_id}',[OrderController::class,'PendingtoConfirm']);
// Confirm To Processing
Route::get('confirm-to-processing/{order_id}',[OrderController::class, 'ConfirmProcess']);
//Processing to Picked Order
Route::get('processing-to-picked/{order_id}',[OrderController::class, 'ProcessToPick']);
// Picked To Shipping Order
Route::get('picked-to-shipping/{order_id}',[OrderController::class, 'pickToShipped']);
// Shipping to Delivered Order
Route::get('shipping-to-delivered/{order_id}',[OrderController::class, 'ShippedToDelivery']);
// Invoice Downloard
Route::get('order-download/{order_id}',[OrderController::class, 'InvoiceDownloard']);
// Retorts
Route::get('reports',[ReportController::class,'index'])->name('reports');
Route::post('reports/by-date',[ReportController::class,'searchDate'])->name('search-by-date');
Route::post('reports/by-month',[ReportController::class,'searchMonth'])->name('search-by-month');
Route::post('reports/by-year',[ReportController::class,'searchYear'])->name('search-by-year');
});

// ============================Login_Route_Here===========================================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');

//=========================User Route are Here
Route::post('update/data',[UserController::class,'updateData'])->name('update.profile');
Route::get('image',[UserController::class,'ImagePage'])->name('user_image');
Route::post('update_image',[UserController::class,'UpdateImage'])->name('update_image');
Route::get('update/password',[UserController::class,'update_password'])->name('update_password');
Route::post('store/password',[UserController::class,'Store_Password'])->name('store_password');
Route::get('/wishlist/',[WishlistController::class,'Wishlist'])->name('wishlist');
Route::get('/get-wishlist-product',[WishlistController::class,'getWishlistProd']);
Route::get('/wishlist-remove/{id}',[WishlistController::class,'wishlishremove']);

//Checkout Address With Ajax
Route::get('district-get/ajax/{division_id}',[CheckoutController::class,'GetDistrictCheckout']);
Route::get('thana-get/ajax/{district_id}',[CheckoutController::class,'GetThanaCheckout']);
Route::post('payment',[CheckoutController::class,'UserCheckoutStore'])->name('user.checkout.store');

// Strip Payment Method route
Route::post('stripe/payment-page',[StripeController::class,'paymentStore'])->name('stripe.order.success');

// User Order Show
Route::get('my-order/show',[UserOrderController::class,'MyOrders'])->name('my-orders');
Route::get('order-view/{order_id}',[UserOrderController::class,'OrderView']);
Route::get('order-download/{order_id}',[UserOrderController::class,'OrderDownload']);

// User Return Order
Route::post('user/return-order/submit',[UserOrderController::class, 'ReturnOrderSubmit'])->name('user-return-order');
Route::get('return-order',[UserOrderController::class,'ReturnOrder'])->name('return-orders');
Route::get('cancel-order',[UserOrderController::class,'CancelOrder'])->name('cancel-orders');

});

// SSLCOMMERZ Start
Route::group(['middleware' =>['user','auth']], function(){
    Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);
    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
});
//SSLCOMMERZ END


// ============================Frontend_Route_Here==================================
Route::get('enlish/language',[LanguageController::class,'English'])->name('english.language');
Route::get('bangla/language',[LanguageController::class,'Bangla'])->name('bangla.language');
// Sigle Product Details
Route::get('sigle/product/{id}/{slug}',[indexController::class,'sigleProduct']);
// Tags wise Product
Route::get('product/tags/{tag}',[indexController::class,'productTags']);
// SubCategory wise Product show
Route::get('subcategory/product/{subcat_id}/{slug}',[indexController::class,'subcatProductShow']);
Route::get('sub/subcategory/product/{subsubcat_id}/{slug}',[indexController::class,'subsubcatProductShow']);

// Product View With Ajax
Route::get('product/view/modal/{id}',[indexController::class,'prodViewModal']);
// Add to Card with Ajax
Route::post('/add/data/store/{id}',[CardController::class,'AddTocardStore']);
//MiniCart
Route::get('product/mini/cart',[CardController::class,'ProdMiniCart']);
//MiniCart Product Remove
Route::get('/minicart/product/remove/{rowId}',[CardController::class,'miniprodremove']);

// Add To My Cart Page
Route::post('/add-to/wishlist/{product_id}',[CardController::class,'AddtoWishlist']);
Route::get('/my-cart/',[CardController::class,'mycart'])->name('mycart');
Route::get('/get-cart-product',[CardController::class,'getCartProd']);
Route::get('/cart-remove/{rowId}',[CardController::class,'Cartremove']);
// Cart Increment
Route::get('/cart-increment/{rowId}',[CardController::class,'CartIncrement']);
Route::get('/cart-decrement/{rowId}',[CardController::class,'CartDecrement']);
// Coupon Apply
Route::post('/coupon-apply',[CardController::class,'ApplyCoupon']);
Route::get('/coupon-calculation',[CardController::class,'CouponCalculation']);
Route::get('/coupon-remove',[CardController::class,'CouponRemove']);
Route::get('user/checkout',[CardController::class,'UserCheckout'])->name('checkout');







