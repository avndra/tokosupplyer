<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderedItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TokoController;

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    return response()->json([
        'token' => $user->createToken('api-token')->plainTextToken,
        'user' => $user,
    ]);
});

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    Route::get('/me', function (Request $request) {
        return $request->user();
    })->name('me');

    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    })->name('logout');

    // Resource routes
    Route::apiResource('products', ProductController::class);
    Route::get('/my-products', [ProductController::class, 'myProducts']);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('orders.items', OrderedItemController::class)->scoped();
    Route::apiResource('suppliers', SupplierController::class);
    Route::apiResource('tokos', TokoController::class);
});
