<?php

namespace Jacobfitzp\NovaTinymce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttachImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'image',
                'size:' . config('nova-tinymce.storage_max'),
            ],
        ];
    }
}
