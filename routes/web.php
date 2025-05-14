<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\OrderController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;


Route::get('/', [ShopController::class, 'home'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/product/{product}', ProductDetailsController::class)->name('product');

# Rotas de visitantes
Route::middleware('guest')->group(function(){
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth')->group(function(){

    # Verificação de e-mail
    Route::get('/verify-email', function (Request $request) {

        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('auth.verify-email');

    })->name('verification.notice');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');


    # Rotas de admin
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function(){

        Route::get('/dashboard', DashboardController::class)->name('dashboard');    
        Route::resource('transactions', TransactionController::class)->only(['index', 'update']);
        Route::get('customers', fn() => view('admin.customer',['users' => User::all()]) )->name('customers');
        Route::resource('categories', CategoryController::class)->except(['show'])->parameters(['categories' => 'category']);
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update']);

    });

    Route::name('user.')->prefix('user')->group(function(){

        Route::view('/profile', 'user.profile')->name('profile');
        Route::post('/profile', function(){ return "This feature is under maintance mode"; });
        Route::resource('orders', OrderController::class)->only(['index', 'show', 'update']);
        Route::view('/ship_info', 'user.ship_info')->name('ship_info');

    });
    
    Route::middleware('verified')->group(function(){

        Route::get('/checkout', [CheckoutController::class, 'showForm'])->name('checkout');
        Route::post('/checkout', [CheckoutController::class, 'createOrder'])->name('checkout');

    });

    # Endereço do usuário
    Route::get('/address', function(){

        /** @var App\Models\User $user **/
        $user = Auth::user();
        return collect($user->only(['first_name', 'last_name', 'email', 'mobile']))
                    ->merge($user->addresses()->first(['address_line', 'city', 'postal_code', 'country']));
    });

    # Carrinho do usuário
    Route::post('/add_to_cart/{product}', [CartController::class, 'store'])->name('atc');
    Route::delete('/remove_from_cart/{product}', [CartController::class, 'destroy'])->name('rfc');
    Route::put('update_cart/{product}/{quantity}', [CartController::class, 'update'])->name('uc');

    # Gerar detalhes fakes
    Route::post('fake_address', function(){
        App\Models\Address::factory()->create(['user_id' => Auth::id()]);
        return back();
    })->name('fake_addr');

    Route::post('fake_payment', function(){
        App\Models\Payment::factory()->create(['user_id' => Auth::id(), 'card_holder' => strtoupper(auth()->user()->full_name)]);
        return back();
    })->name('fake_pay');


    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});
