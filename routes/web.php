<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('send-signature',[SignatureController::class,'sendSignature'])->name('send.signature');