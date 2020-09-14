<?php

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

Route::get('bookables', function (Request $request) {
    return Bookable::all();
});

Route::get('bookables/{id}', function (Request $request, $id) {
    return Bookable::findOrFail($id); //If noting find return 400
    // return Bookable::find($id);//If noting find return 200 OK
});

// Route::get('bookables/{id}/{optional?}', function (Request $request, $id, $optional = "Jhon") {
//     dd($id, $optional);
//     return Bookable::find($id);
// });
