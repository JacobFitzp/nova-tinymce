<?php

namespace Jacobfitzp\NovaTinymce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Attach image form request.
 *
 * @author Jacob Fitzpatrick
 */
class AttachImageRequest extends FormRequest
{
    /**
     * @return array<string, string|array<string>>
     */
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'image',
                'max:' . config('nova-tinymce.storage_max'),
            ],
        ];
    }
}
