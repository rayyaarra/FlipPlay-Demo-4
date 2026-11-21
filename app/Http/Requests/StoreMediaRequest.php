<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255|unique:media,judul',
            'jenis' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
        ];
    }
}