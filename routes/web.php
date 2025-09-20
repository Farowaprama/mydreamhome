<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\FlatManagementController;
use App\Http\Controllers\PayBillContoller;
 use App\Http\Controllers\UserController;
 use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\TolateController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\SslCommerzPaymentController;



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
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/checkout', [SslCommerzPaymentController::class, 'Checkout'])->name('checkout');

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
// Route::get('/dashboard', function () {
//     return view('admin\dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('dashboard');
Route::get('/email', [EmailController::class, 'index']);




Route::get('/renter_dashboard/rid{id}', [DashboardController::class, 'show_dashboard']);

Route::post('/submit_registration', [UserController::class, 'StoreRegistration']);
Route::get('add_renter', [UserController::class, 'AddRenter']);
Route::get('renter_list/{id?}', [UserController::class, 'RenterList']);

Route::get('myLogin', [UserController::class, 'myLoginview']);
Route::post('myLogin', [UserController::class, 'myLogin']);



Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Auth::routes();

Route::get('authorized/{provider}', ['as' => 'loginWithSchoialMedia', 'uses' => 'LoginController@redirectToProvider']);
//Route::any('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::any('authorized/{provider}/callback', [ 'uses' => 'LoginController@handleProviderCallback']);

// Password Reset Routes...
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset')->name('password.reset');

});

//password reset route
// Route::post('email/reset/check', 'UserController@passwordReset');
// Route::post('newPswdSet', 'UserController@newPswdSet');

Route::post('email/reset/check', [UserController::class, 'passwordReset']);
Route::post('newPswdSet', [UserController::class, 'newPswdSet']);

Route::get('logout', [UserController::class, 'logout']);
Route::get('profile_view/{id?}', [UserController::class, 'ProfileView']);
Route::any('profile_update', [UserController::class, 'ProfileUpdate']);

Route::post('user-approve-or-delete', [UserController::class, 'userApproveOrDelete']);



Route::resource('products-ajax-crud', ProductAjaxController::class);

Route::post('store', [UserController::class, 'store']);
Route::post('store_payBill', [PayBillContoller::class, 'store']);

Route::resource('flat-management', FlatManagementController::class);
Route::post('set_bill_store', [FlatManagementController::class, 'store']);

Route::resource('billing_history', PayBillContoller::class);
Route::any('pay_bill_list/{id?}/{type?}', [PayBillContoller::class, 'paybilllist']);
Route::any('due_bill_list/{id?}/{type?}', [PayBillContoller::class, 'paybilllist']);
Route::any('receipt/{id?}', [PayBillContoller::class, 'show_receipt']);

Route::post('set_Tolate_store', [TolateController::class, 'store']);
Route::resource('tolate', TolateController::class);
//Route::post('dynamic_dependent/fetch', 'ParticipantController@fetch')->name('dynamicdependent.fetch');
Route::post('dynamic_dependent/fetch', [TolateController::class, 'fetch']);

//Route::resource('roles', 'RolesController', ['names' => 'user.roles']);
Route::resource('roles', RolesController::class, ['names' => 'user.roles']);
Route::resource('admin_role', AdminRoleController::class, ['names' => 'admin_role']);




//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
