<?php

use Illuminate\Support\Facades\Route;
use Jacobfitzp\NovaTinymce\Http\Controllers\ImageAttachmentController;

Route::post('/upload', [ImageAttachmentController::class, 'store']);
