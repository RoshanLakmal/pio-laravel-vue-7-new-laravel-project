<?php

use App\Http\Controllers\Api\BookableAvailabilityController;
use App\Http\Controllers\Api\BookableController;
use App\Http\Controllers\Api\BookablePriceController;
use App\Http\Controllers\Api\BookableReviewController;
use App\Http\Controllers\Api\BookingByReviewController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ReviewController;
use App\Models\Bookable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**Both are correct */
// Route::get('bookables', 'App\Http\Controllers\Api\BookableController@index');
// Route::get('bookables/{id}', 'App\Http\Controllers\Api\BookableController@show');
// Route::get('bookables', [BookableController::class, 'index']);
// Route::get('bookables/{id}', [BookableController::class, 'show']);

/**But resource is much better */
// Route::apiResource('bookables', 'App\Http\Controllers\Api\BookableController');
// Route::apiResource('bookables', BookableController::class); //All 
Route::apiResource('bookables', BookableController::class)->only([
    'index', 'show'
]);
Route::get('bookables/{bookable}/availability', BookableAvailabilityController::class)->name('bookables.availability.show');
Route::get('bookables/{bookable}/reviews', BookableReviewController::class)->name('bookables.reviews.index');
Route::get('bookables/{bookable}/price', BookablePriceController::class)->name('bookables.price.show');

Route::get('booking-by-review/{reviewKey}', BookingByReviewController::class)->name('booking.by-review.show');
Route::apiResource('reviews', ReviewController::class)->only(['show', 'store']);
Route::post('checkout', CheckoutController::class)->name('checkout');
/**Using closure */
// Route::get('bookables', function (Request $request) {
//     return Bookable::all();
// });

// Route::get('bookables/{id}', function (Request $request, $id) {
//     return Bookable::findOrFail($id); //If noting find return 400
//     // return Bookable::find($id);//If noting find return 200 OK
// });

// Route::get('bookables/{id}/{optional?}', function (Request $request, $id, $optional = "Jhon") {
//     dd($id, $optional);
//     return Bookable::find($id);
// });
