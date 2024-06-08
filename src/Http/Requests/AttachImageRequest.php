<?php

namespace Jacobfitzp\NovaTinymce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'disk' => [
                Rule::in(array_keys(config('filesystems.disks'))),
            ],
            'file' => [
                'required',
                'image',
                'max:' . config('nova-tinymce.storage_max'),
            ],
        ];
    }
}
