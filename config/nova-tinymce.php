<?php

return [
    // API key.
    // Get yours at https://www.tiny.cloud/auth/signup/
    'api_key' => env('TINYMCE_API_KEY', ''),

    // Plugins used by the editor.
    // See https://www.tiny.cloud/docs/tinymce/latest/plugins/ for a list of available plugins.
    'plugins' => ['accordion', 'autolink', 'lists', 'link', 'image', 'table', 'code', 'help', 'wordcount'],

    // Additional editor properties, passed to the editors `init` prop.
    'init' => [
        'file_picker_types' => 'image',
        'image_caption' => true,
    ],

    // Storage disk to use for storing uploaded images.
    // Leave blank to use the default nova storage disk.
    'storage_disk' => null,

    // Path to store uploaded images in.
    // Leave blank to use the root directory.
    'storage_path' => 'tinymce-images',
];
