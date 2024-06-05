<?php

use Illuminate\Support\Facades\Route;
use Jacobfitzp\NovaTinymce\Http\Controllers\ImageAttachmentController;

Route::post('/images', [ImageAttachmentController::class, 'store']);
