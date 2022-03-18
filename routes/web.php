<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
*/

// Route::get('/index', 'HomeController@viewbanner')->name('index');
Route::get('/testroute', 'Admin\BannerController@test')->name('testroute');

Route::get('/', 'Admin\BannerController@viewbanner')->name('index');
// Route::get('/index', 'Admin\BannerController@viewbanner')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/emptycart', 'HomeController@emptycart')->name('emptycart');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::post('/comments', 'Auth\LoginController@comments')->name('comments');
Route::get('/checkout', 'Frontend\checkoutController@product_checkout')->name('checkout');
Route::get('/productdetail', 'HomeControllerabout@productdetail')->name('productdetail');
Route::get('/product/{slug}', 'Admin\ProductController@productslugpage')->name('product');;
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/billing', 'Admin\ProductController@billing')->name('billing');
Route::post('/shipping_address', 'Admin\ProductController@shipping_address')->name('shipping_address');

Route::post('/editaddressform', 'Admin\ProductController@editshipping_address_form')->name('editaddressform');

Route::post('/edit_billing_address', 'Admin\ProductController@edit_billing')->name('edit_billing_address');
Route::get('/billingcheckout', 'Frontend\CartController@final_checkout')->name('checkout');


Route::get('/address_checkout', 'Frontend\checkoutController@product_checkout')->name('address_checkout');
Route::get('/ordersummary', 'Frontend\checkoutController@ordersummary')->name('ordersummary');

Route::get('/orderlist', 'Frontend\checkoutController@orderlist')->name('orderlist');
// Route::post('/cart_payment', 'Frontend\checkoutController@order_payment')->name('cart_payment');

Route::post('/addToCart', 'Admin\ProductController@addToCart')->name('add-to-cart');
Route::post('/cartupdate', 'Frontend\CartController@updatecart')->name('cartupdate');
// Route::get('/cookiescart', 'Admin\LoginController@cookiescart')->name('cookiescart');
Route::get('/forgetpassword', 'Frontend\CartController@forgetpassword')->name('forgetpassword');
Route::post('/validate_data-otp','Frontend\CartController@send_otp');
Route::post('/checkout_user','Frontend\checkoutController@product_checkout_user_deatils')->name('checkout_user');


Route::get('cookies', 'TestController@cookies')->name('cookies');
Route::get('/cartlist', 'Admin\ProductController@orderlist')->name('cartlist');
Route::get('/cart', 'Frontend\CartController@index')->name('cart');
// Route::get('/cart', 'Admin\ProductController@userorderlist')->name('cart');
Route::get('/login','HomeController@register')->name('login');
/**Register start */
Route::get('/register', 'HomeController@myaccount')->name('register');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
Route::post('/validate_data','Auth\RegisterController@send_otp');

Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\RegisterController@getLogout')->name('logout');
// Route::get('/deletecart', 'ProductController@deletecart')->name('deletecart');
Route::post('/deletecart', 'Admin\ProductController@deletecart')->name('deletecart');
// Route::get('/productlisiting', 'Admin\ProductController@productlisting')->name('productlisiting');
Route::get('/category', 'Admin\ProductController@productlistingcategory')->name('category');

Route::post('/categoryfilter/{id}', 'Admin\ProductController@productfiltercategory')->name('categoryfilter');



Route::post('razorpay-payment', 'RazorpayPaymentController@store')->name('razorpay.payment.store');
Route::get('/payment', 'RazorpayPaymentController@index');

Route::get('/orderhistory', 'RazorpayPaymentController@orderhistory');

Route::get('authentication-failed', function () {
    $errors = [];
    array_push($errors, ['code' => 'auth-001', 'message' => 'Unauthenticated.']);
    return response()->json([
        'errors' => $errors
    ], 401);
})->name('authentication-failed');

Route::group(['prefix' => 'payment-mobile'], function () {
    Route::get('/', 'PaymentController@payment')->name('payment-mobile');
    Route::get('set-payment-method/{name}', 'PaymentController@set_payment_method')->name('set-payment-method');
});


// forget password route
Route::post('/forgetpassword_check', 'Frontend\CartController@forgetpassword_check')->name('forgetpassword_check');
Route::get('/forgetpassword2', 'Frontend\CartController@forgetpassword2')->name('forgetpassword2');
Route::post('/update_details', 'Frontend\CartController@update_details')->name('update_details');
Route::get('/resent_otp', 'Frontend\CartController@resent_otp')->name('resent_otp');

// forget password route end
 
// SSLCOMMERZ Start
/*Route::get('/example1', 'SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');*/
Route::post('pay-ssl', 'SslCommerzPaymentController@index');
Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel', 'SslCommerzPaymentController@cancel');
Route::post('/ipn', 'SslCommerzPaymentController@ipn');
//SSLCOMMERZ END


/*paypal*/
/*Route::get('/paypal', function (){return view('paypal-test');})->name('paypal');*/
Route::post('pay-paypal', 'PaypalPaymentController@payWithpaypal')->name('pay-paypal');
Route::get('paypal-status', 'PaypalPaymentController@getPaymentStatus')->name('paypal-status');
/*paypal*/

/*Route::get('stripe', function (){
return view('stripe-test');
});*/
Route::post('pay-stripe', 'StripePaymentController@paymentProcess')->name('pay-stripe');

// Get Route For Show Payment Form
Route::get('paywithrazorpay', 'RazorPayController@payWithRazorpay')->name('paywithrazorpay');
Route::post('payment-razor', 'RazorPayController@payment')->name('payment-razor');

/*Route::fallback(function () {
    return redirect('/admin/auth/login');
});*/

Route::get('payment-success', 'PaymentController@success')->name('payment-success');
Route::get('payment-fail', 'PaymentController@fail')->name('payment-fail');

Route::get('add-currency', function () {
    $currencies = file_get_contents("installation/currency.json");
    $decoded = json_decode($currencies, true);
    $keep = [];
    foreach ($decoded as $item) {
        array_push($keep, [
            'country' => $item['name'],
            'currency_code' => $item['code'],
            'currency_symbol' => $item['symbol_native'],
            'exchange_rate' => 1,
        ]);
    }
    DB::table('currencies')->insert($keep);
    return response()->json(['ok']);
});

Route::get('chk-mail', 'RazorpayPaymentController@chkMail')->name('sendMail');

Route::get('/test',function (){
    return view('errors.404');
});
