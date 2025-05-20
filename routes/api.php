<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::get('/ping', function () {
    return response()->json(['message' => 'API working'], 200);
});

Route::post('/login', [AuthController::class, 'login']);
