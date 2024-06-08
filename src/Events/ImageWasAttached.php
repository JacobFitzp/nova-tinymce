<?php

namespace Jacobfitzp\NovaTinymce\Events;

use Illuminate\Foundation\Events\Dispatchable;

/**
 * Image attachment event.
 * Dispatched when an image is uploaded to the TinyMCE field.
 *
 * @author Jacob Fitzpatrick
 */
class ImageWasAttached
{
    use Dispatchable;

    public function __construct(
        public string $location,
        public string $disk
    ) {}
}
