<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return view('welcome');
        })->name("welcome");

        Route::get('/meetings', function () {
            return view('meetings');
        })->name("meetings");

        Route::get('/meeting-details', function () {
            return view('meeting-details');
        })->name("meeting-details");

        // Auth routes for web only (Blade forms)
        require __DIR__ . '/auth.php';
        // Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::post('/reservations', [ReservationController::class, 'store'])
            ->name('reservations.store');

        Route::middleware("CheckAdmin")->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            Route::prefix('users')->name('user.')->controller(UserController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Categories Routes
            Route::prefix('categories')->name('category.')->controller(CategoryController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Products Routes
            Route::prefix('products')->name('product.')->controller(ProductController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Customers Routes
            Route::prefix('customers')->name('customer.')->controller(CustomerController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Orders Routes
            Route::prefix('orders')->name('order.')->controller(OrderController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Employees Routes
            Route::prefix('employees')->name('employee.')->controller(EmployeeController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Sales Routes
            Route::prefix('sales')->name('sale.')->controller(SaleController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/show/{id}', 'show')->name('show');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/update', 'update')->name('update');
                Route::delete('/delete/{id}', 'delete')->name('delete');
            });

            // Reservations Routes
            Route::get('/reservations', [ReservationController::class, 'index'])
                ->name('reservations.index');

            Route::post('/reservations/{id}/confirm', [ReservationController::class, 'confirm'])
                ->name('reservations.confirm');

            Route::post('/reservations/{id}/cancel', [ReservationController::class, 'cancel'])
                ->name('reservations.cancel');

            Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])
                ->name('reservations.delete');
        });
    }
);
