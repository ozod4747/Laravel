<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'content' => 'nullable|string',
//            'image' => 'nullable|string',
            'category_id' => 'nullable|integer',
//            'tags' => 'nullable|array',
        ];
    }
}
