<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\purchaseController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::middleware(['auth'])->group(function () {
#Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

#Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('products', [productsController::class, 'getAction']);
Route::get('dashboard', [productsController::class, 'getAction']);
Route::get('products/{id}', [productsController::class, 'getProductDetail']);

Route::get('purchase/{id}', [purchaseController::class, 'getAction']);
Route::post('order-post', [purchaseController::class, 'orderPost'])->name('order-post');
Route::get('orders', [orderController::class, 'getAction'])->name('orders');
// In your routes file (web.php or api.php)
Route::post('stripe/webhook', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');
Route::post('create-payment-intent', [purchaseController::class, 'createPaymentIntent'])->name('create.payment.intent');
});

