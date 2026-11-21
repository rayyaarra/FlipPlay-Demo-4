<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $mediaId = $this->route('media')?->id;

        return [
            'judul' => [
                'required',
                'string',
                'max:255',
                Rule::unique('media', 'judul')->ignore($mediaId),
            ],
            'jenis' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ];
    }
}