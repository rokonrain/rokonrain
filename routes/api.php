<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;
use Dompdf\Dompdf;



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
Route::get('dropdown', [DropdownController::class, 'view'])->name('dropdownView');
Route::get('get-districts', [DropdownController::class, 'getDistricts'])->name('getDistricts');
Route::get('get-thanas', [DropdownController::class, 'getThanas'])->name('getThanas');
Route::get('get-unions', [DropdownController::class, 'getUnions'])->name('getUnions');


