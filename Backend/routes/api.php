<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainingController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('membership', MembershipController::class);

Route::resource('room', RoomController::class);

Route::get('member', [MemberController::class, 'index']);
Route::get('member/{id}', [MemberController::class, 'show']);
Route::post('member', [MemberController::class, 'store']);
Route::put('member/{id}', [MemberController::class, 'update']);
Route::delete('member/{id}', [MemberController::class, 'destroy']);

Route::get('training', [TrainingController::class, 'index']);
Route::get('training/{id}', [TrainingController::class, 'show']);
Route::post('training', [TrainingController::class, 'store']);
Route::put('training/{id}', [TrainingController::class, 'update']);
Route::delete('training/{id}', [TrainingController::class, 'destroy']);

Route::post('training/{training_id}/member/{member_id}', [TrainingController::class, 'addMember']);
Route::delete('training/{training_id}/member/{member_id}', [TrainingController::class, 'removeMember']);

Route::post('training/{training_id}/room/{room_id}', [TrainingController::class, 'addRoom']);
Route::delete('training/{training_id}/room/{room_id}', [TrainingController::class, 'removeRoom']);