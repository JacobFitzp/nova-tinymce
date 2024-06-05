<?php

namespace Jacobfitzp\NovaTinymce\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Jacobfitzp\NovaTinymce\Http\Requests\AttachImageRequest;

class ImageAttachmentController extends Controller
{
    public function store(AttachImageRequest $request): JsonResponse
    {
        $storagePath = config('nova-tinymce.storage_path');
        $storageDisk = config('nova-tinymce.storage_disk') ?? config('nova.storage_disk');

        $location = $request
            ->file('file')
            ?->storePublicly($storagePath, $storageDisk);

        return response()->json([
            'location' => Storage::disk($storageDisk)->url($location),
        ]);
    }
}
