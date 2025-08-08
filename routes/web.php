<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderedItemController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout')->middleware('auth');

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'gender' => 'required|in:male,female',
    ]);

    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'gender' => $request->gender,
        'city_code' => 1,      // default
        'role' => 'user'       // default
    ])->name('register');


    Auth::login($user);

    $toko = \App\Models\Toko::where('owner_id', $user->id)->first();
    return redirect($toko ? '/products' : '/tokos-check');
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid credentials');
    }

    Auth::login($user);
    $toko = \App\Models\Toko::where('owner_id', $user->id)->first();
    return redirect($toko ? '/products' : '/toko-check');
});

Route::get('/toko-check', function () {
    return view('tokos.check');
})->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('role:admin')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('tokos', TokoController::class);
    // Admins can create, update, and delete suppliers
    Route::resource('suppliers', SupplierController::class)->except(['index', 'show']);
});

// Orders
Route::resource('orders', OrderController::class);

// All authenticated users can view suppliers
Route::resource('suppliers', SupplierController::class)->only(['index', 'show'])->middleware('auth');

// Products
Route::resource('products', ProductController::class);

Route::get('/my-products', [ProductController::class, 'myProducts'])->name('products.my');

// Ordered Items
Route::get('/orders/{order}/items', [OrderedItemController::class, 'index'])->name('orders.items');
Route::get('/orders/{order}/items/create', [OrderedItemController::class, 'create'])->name('orders.items.create');
Route::post('/ordered-items', [OrderedItemController::class, 'store'])->name('ordered-items.store');
