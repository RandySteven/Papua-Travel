<?php

use App\Http\Controllers\AirplaneController;
use App\Http\Controllers\AirplaneTransactionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTransactionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TraditionController;
use App\Models\Category;
use App\Models\Restaurant;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Category
Route::prefix('category')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create')->middleware(['role:admin', 'auth']);
    Route::post('/create', [CategoryController::class, 'store'])->name('category.store')->middleware(['role:admin', 'auth']);
    Route::get('/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/edit/{category:slug}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update/{category:slug}', [CategoryController::class, 'update'])->name('category.update');
});

//Restaurant
Route::prefix('restaurant')->group(function(){
    Route::get('/', [RestaurantController::class, 'index'])->name('restaurant.index');
    Route::middleware('auth')->group(function(){
        Route::get('/create', [RestaurantController::class, 'create'])->name('restaurant.create')->middleware('role:admin');
        Route::post('/create', [RestaurantController::class, 'store'])->name('restaurant.store')->middleware('role:admin');
        Route::delete('/delete/{restaurant:slug}', [RestaurantController::class, 'delete'])->name('restaurant.delete')->middleware('role:admin');
        Route::get('/edit/{restaurant:slug}', [RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::put('/update/{restaurant:slug}', [RestaurantController::class, 'update'])->name('restaurant.update');
    });
    Route::get('/{restaurant:slug}', [RestaurantController::class, 'show'])->name('restaurant.show');

    //Food
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::post('/create-food', [FoodController::class, 'store'])->name('food.store');
        Route::delete('/delete-food/{food:slug}', [FoodController::class, 'delete'])->name('food.delete');
    });
});

Route::prefix('hotel')->group(function(){
    Route::get('/', [HotelController::class, 'index'])->name('hotel.index');
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('/create', [HotelController::class, 'create'])->name('hotel.create');
        Route::post('/create', [HotelController::class, 'store'])->name('hotel.store');
        Route::delete('/delete/{hotel:slug}', [HotelController::class, 'delete'])->name('hotel.delete');
        Route::get('/edit/{hotel:slug}', [HotelController::class, 'edit'])->name('hotel.edit');
        Route::put('/update/{hotel:slug}', [HotelController::class, 'update'])->name('hotel.update');
    });
    Route::get('/{hotel:slug}', [HotelController::class, 'show'])->name('hotel.show');

    //Room
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::post('/create-room', [RoomController::class, 'store'])->name('room.store');
        Route::delete('/delete-room/{room:room_number}', [RoomController::class, 'delete'])->name('room.delete');
    });
    Route::get('/room/{room:room_number}', [RoomController::class, 'show'])->name('room.show');
});

//Rating
Route::prefix('rating')->group(function(){
    Route::get('/', [RatingController::class, 'index'])->name('rating.index');
    Route::get('/{rating:slug}', [RatingController::class, 'show'])->name('rating.show');
});

//Travel Place
Route::prefix('travel-place')->group(function(){
    Route::get('/', [PlaceController::class, 'index'])->name('place.index');
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('/create', [PlaceController::class, 'create'])->name('place.create');
        Route::post('/create', [PlaceController::class, 'store'])->name('place.store');
        Route::get('/edit/{place:slug}', [PlaceController::class, 'edit'])->name('place.edit');
        Route::put('/update/{place:slug}', [PlaceController::class, 'update'])->name('place.update');
        Route::delete('/delete/{place:slug}', [PlaceController::class, 'delete'])->name('place.delete');
    });
    Route::get('/{place:slug}', [PlaceController::class, 'show'])->name('place.show');
});

//Tradition
Route::prefix('tradition')->group(function(){
    Route::get('/', [TraditionController::class, 'index'])->name('tradition.index');
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('/create', [TraditionController::class, 'create'])->name('tradition.create');
        Route::post('/create', [TraditionController::class, 'store'])->name('tradition.store');
        Route::get('/edit/{tradition:slug}', [TraditionController::class, 'edit'])->name('tradition.edit');
        Route::put('/update/{tradition:slug}', [TraditionController::class, 'update'])->name('tradition.update');
        Route::delete('/delete/{tradition:slug}', [TraditionController::class, 'delete'])->name('tradition.delete');
    });
    Route::get('/{tradition:slug}', [TraditionController::class, 'show'])->name('tradition.show');
});

//Diary
Route::prefix('diary')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::get('/create', [PostController::class, 'create'])->name('diary.create');
        Route::post('/create', [PostController::class, 'store'])->name('diary.store');
        Route::delete('delete/{post:slug}', [PostController::class, 'delete'])->name('post.delete');
    });
    Route::get('', [PostController::class, 'index'])->name('post.index');
    Route::get('{post:slug}', [PostController::class, 'show'])->name('post.show');
});

Route::middleware('auth')->group(function(){
    //Cart
    Route::post('/add-to-cart', [CartController::class, 'store'])->name('add.to.cart');
    Route::get('/cart', [CartController::class, 'index'])->name('carts');
    Route::post('/hotel-transaction', [HotelTransactionController::class, 'store'])->name('hotel.transaction.store');
    Route::delete('/cart/{cart:room_id}', [CartController::class, 'delete'])->name('cart.delete');

    //Booking
    Route::get('booking/{schedule:id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('add-to-booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('store-airplane-transaction', [AirplaneTransactionController::class, 'store'])->name('airplane.transaction.store');
    Route::delete('booking/{booking:seat_id}', [BookingController::class, 'delete'])->name('booking.delete');

});


//Airplane
Route::prefix('airplane')->group(function(){
    Route::get('', [AirplaneController::class, 'index'])->name('airplane.index');
    Route::middleware(['auth', 'role:admin'])->group(function(){
        Route::get('/create', [AirplaneController::class, 'create'])->name('airplane.create');
        Route::post('/create', [AirplaneController::class, 'store'])->name('airplane.store');
        Route::get('/edit/{airplane:slug}', [AirplaneController::class, 'edit'])->name('airplane.edit');
        Route::put('/update/{airplane:slug}', [AirplaneController::class, 'update'])->name('airplane.update');
        Route::delete('/delete/{airplane:slug}', [AirplaneController::class, 'delete'])->name('airplane.delete');
        Route::post('/add-seat', [SeatController::class, 'store'])->name('seat.store');
        Route::post('/add-schedule', [ScheduleController::class, 'store'])->name('schedule.controller');
    });
    Route::get('/{airplane:slug}', [AirplaneController::class, 'show'])->name('airplane.show');
});

Route::middleware('auth')->group(function(){
    //Hotel Transaction
    Route::get('/hotel-transaction', [HotelTransactionController::class, 'index'])->name('hotel.transaction.index');
    Route::get('/hotel-transaction/{hotel_transaction:id}', [HotelTransactionController::class, 'show'])->name('hotel.transaction.show');

    //Airplane Transaction
    Route::get('airplane-transaction', [AirplaneTransactionController::class, 'index'])->name('airplane.transaction.index');
    Route::get('airpalane-transaction/{airplane_transaction:id}', [AirplaneTransactionController::class, 'show'])->name('airplane.transaction.show');

});
require __DIR__.'/auth.php';
