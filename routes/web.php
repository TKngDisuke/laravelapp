<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PurchasehistoryController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\RestappController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MultiAuthController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Mail;
use App\Mail\Thanks;
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
Route::get('hello/session', [HelloController::class,'ses_get']);
Route::post('hello/session', [HelloController::class,'ses_put']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('image/shop', [ProductController::class,'shop']);
    Route::get('shop', [CartController::class,'mycart']);
    Route::post('shop', [CartController::class,'addmycart']);
    Route::get('shop/form', [CartController::class,'form']);
    Route::post('shop/form', [CartController::class,'shop']);
    Route::get('shop/edit', [CartController::class,'edit']);;
    Route::post('shop/edit', [CartController::class,'update']);
    Route::post('checkout',[CartController::class,'checkout']);
    Route::get('shop/cartdel', [CartController::class,'delete']);
    Route::post('shop/cartdel', [CartController::class,'remove']);
    Route::get('shop/history', [PurchasehistoryController::class,'index']);//購入履歴

});



Route::get('image/index', [ProductController::class,'index']);
Route::get('image/form', [ProductController::class,'form']);
Route::post('image/form', [ProductController::class,'store'])->name('image.store');
Route::get('image/edit', [ProductController::class,'edit']);
Route::post('image/edit', [ProductController::class,'update']);
Route::get('image/del', [ProductController::class,'delete']);
Route::post('image/del', [ProductController::class,'remove']);

Route::group(['middleware' => ['auth']], function () {
Route::get('store', [StoreController::class,'index']);
Route::get('store/form', [StoreController::class,'form']);
Route::post('store/form', [StoreController::class,'store'])->name('store.store');
Route::get('store/edit', [StoreController::class,'edit']);
Route::post('store/edit', [StoreController::class,'update']);
Route::get('store/del', [StoreController::class,'delete']);
Route::post('store/del', [StoreController::class,'remove']);
Route::get('store/control', [StoreController::class,'control']);//storeのMO管理画面、商品購入メッセージ表示
Route::get('store/receive', [StoreController::class,'receive']);//storeの何を作って欲しいかのデータ表示
});





Route::get('hello/rest', [HelloController::class,'rest']);
Route::resource('rest', RestappController::class);
Route::get('hello', [HelloController::class,'index']);
Route::post('hello', [HelloController::class,'post']);
Route::get('person', [PersonController::class,'index']);
Route::get('person/find', [PersonController::class,'find']);
Route::post('person/find', [PersonController::class,'search']);
Route::get('person/add', [PersonController::class,'add']);
Route::post('person/add', [PersonController::class,'create']);
Route::get('person/edit', [PersonController::class,'edit']);
Route::post('person/edit', [PersonController::class,'update']);
Route::get('person/del', [PersonController::class,'delete']);
Route::post('person/del', [PersonController::class,'remove']);

Route::get('board', [BoardController::class,'index']);
Route::get('board/add', [BoardController::class,'add']);
Route::post('board/add', [BoardController::class,'create']);

Route::get('hello/add', [HelloController::class,'add']);
Route::post('hello/add', [HelloController::class,'create']);
Route::get('hello/edit', [HelloController::class,'edit']);
Route::post('hello/edit', [HelloController::class,'update']);
Route::get('hello/del', [HelloController::class,'del']);
Route::post('hello/del', [HelloController::class,'remove']);
Route::get('hello/show', [HelloController::class,'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('scss', function () {
    return view('for-scss');
});



Route::get('multi_login', [MultiAuthController::class, 'showLoginForm']);
Route::post('multi_login', [MultiAuthController::class, 'login']);

// ログアウト
Route::get('multi_login/logout', [MultiAuthController::class, 'logout']);

// ログイン後のページ
Route::prefix('administrators')->middleware('auth:administrators')->group(function(){

Route::get('dashboard', function(){ return '管理者でログイン完了'; });
Route::get('home', [MultiAuthController::class, 'index']);
});
