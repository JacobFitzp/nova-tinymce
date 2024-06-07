<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Jacobfitzp\NovaTinymce\Http\Controllers\ImageAttachmentController;

Route::post('/upload', [ImageAttachmentController::class, 'store'])
    ->withoutMiddleware(VerifyCsrfToken::class)
    ->name('nova-tinymce.upload');
