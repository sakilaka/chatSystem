<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;

//auth
Route::post('register',[RegisterController::class, 'register']);
Route::post('login',[LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/chat/get-chats',[ChatController::class, 'getChats']);
    Route::post('/chat/create-chat',[ChatController::class, 'createChat']);
    Route::get('/chat/get-chat-by-id/{chat}',[ChatController::class, 'getChatById']);
    Route::post('/chat/send-text-message',[ChatController::class, 'sendTextMessage']);
    Route::post('/chat/search-user',[ChatController::class, 'searchUsers']);
    Route::get('/chat/message-status/{message}',[ChatController::class, 'messageStatus']);
});

Broadcast::routes(['middleware' => ['auth:sanctum']]);
