<?php

use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportController::class); //isso aqui pega todas as rotas de /supports para usar na api rest
