<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ✅ CSRF cookie for Sanctum
// Route::get('/sanctum/csrf-cookie', function () {
//     return response()->json(['message' => 'CSRF cookie set']);
// });

// ✅ Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ✅ Protected routes (require token)
// Route::middleware('auth:sanctum')->group(function () {
Route::get('/user', function (Request $request) {
    return $request->user();
    // });

    Route::middleware('auth:sanctum')->get('/dashboard/stats', function () {
        return response()->json([
            'users' => \App\Models\User::count(),
            'products' => \App\Models\Product::count(),
            'orders' => \App\Models\Order::count(),
            'revenue' => \App\Models\Sale::count(),
        ]);
    });

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });

    // CRUD Category
    Route::get("/category/all", [CategoryController::class, "index"]);
    Route::get("/category/show/{id}", [CategoryController::class, "show"]);
    Route::post("/category/store", [CategoryController::class, "store"]);
    Route::post("/category/update", [CategoryController::class, "update"]);
    Route::post("/category/delete", [CategoryController::class, "delete"]);

    // CRUD Customer
    Route::get("/customer/all", [CustomerController::class, "index"]);
    Route::get("/customer/show/{id}", [CustomerController::class, "show"]);
    Route::post("/customer/store", [CustomerController::class, "store"]);
    Route::post("/customer/update", [CustomerController::class, "update"]);
    Route::post("/customer/delete", [CustomerController::class, "delete"]);

    // CRUD Employee
    Route::get("/employee/all", [EmployeeController::class, "index"]);
    Route::get("/employee/show/{id}", [EmployeeController::class, "show"]);
    Route::post("/employee/store", [EmployeeController::class, "store"]);
    Route::post("/employee/update", [EmployeeController::class, "update"]);
    Route::post("/employee/delete", [EmployeeController::class, "delete"]);

    // CRUD User
    Route::get("/user/all", [UserController::class, "index"]);
    Route::get("/user/show/{id}", [UserController::class, "show"]);
    Route::post("/user/store", [UserController::class, "store"]);
    Route::post("/user/update", [UserController::class, "update"]);
    Route::post("/user/delete", [UserController::class, "delete"]);

    // CRUD Product
    Route::get("/product/all", [ProductController::class, "index"]);
    Route::get("/product/show/{id}", [ProductController::class, "show"]);
    Route::post("/product/store", [ProductController::class, "store"]);
    Route::post("/product/update", [ProductController::class, "update"]);
    Route::post("/product/delete", [ProductController::class, "delete"]);

    // CRUD Order
    Route::get("/order/all", [OrderController::class, "index"]);
    Route::get("/order/show/{id}", [OrderController::class, "show"]);
    Route::post("/order/store", [OrderController::class, "store"]);
    Route::post("/order/update", [OrderController::class, "update"]);
    Route::post("/order/delete", [OrderController::class, "delete"]);

    // CRUD Sale
    Route::get("/sale/all", [SaleController::class, "index"]);
    Route::get("/sale/show/{id}", [SaleController::class, "show"]);
    Route::post("/sale/store", [SaleController::class, "store"]);
    Route::post("/sale/update", [SaleController::class, "update"]);
    Route::post("/sale/delete", [SaleController::class, "delete"]);

    // Reservations
    Route::get('/reservations', [ReservationController::class, 'index']);
    Route::post('/reservations', [ReservationController::class, 'store']);
    Route::post('/reservations/{id}/confirm', [ReservationController::class, 'confirm']);
    Route::post('/reservations/{id}/cancel', [ReservationController::class, 'cancel']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
});
