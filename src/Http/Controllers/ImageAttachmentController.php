<?php

namespace Jacobfitzp\NovaTinymce\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Jacobfitzp\NovaTinymce\Events\ImageWasAttached;
use Jacobfitzp\NovaTinymce\Http\Requests\AttachImageRequest;

/**
 * Image attachment controller.
 *
 * @author Jacob Fitzpatrick
 */
class ImageAttachmentController extends Controller
{
    /**
     * Store an uploaded image and respond with the public URL.
     *
     * @param AttachImageRequest $request
     * @return JsonResponse
     */
    public function store(AttachImageRequest $request): JsonResponse
    {
        // Retrieve config values.
        $storagePath = config('nova-tinymce.storage_path');
        $storageDisk = config('nova-tinymce.storage_disk') ?? config('nova.storage_disk');

        // Store the uploaded file.
        $location = $request
            ->file('file')
            ?->storePublicly($storagePath, $storageDisk);

        // Return the location of the uploaded file.
        if (filled($location)) {
            // Dispatch attachment event.
            ImageWasAttached::dispatch($location, $storageDisk);

            // Respond with the location.
            return response()->json([
                'location' => Storage::disk($storageDisk)->url($location),
            ]);
        }

        // Nothing was uploaded.
        return response()
            ->json(['error' => 'Upload failed.']);
    }
}
