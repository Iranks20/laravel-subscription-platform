<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;

Route::post('/websites/{websiteId}/subscribe', [SubscriptionController::class, 'subscribe']);
Route::post('/websites/{websiteId}/posts', [PostController::class, 'store']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/websites', [WebsiteController::class, 'store']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
