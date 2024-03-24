<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => ['required'],
            'title' => ['nullable','max:255'],
            'tag' => ['nullable','max:255'],
            'slug' => ['nullable', Rule::unique('posts', 'slug')->ignore($this->id),'max:255'],
            'description' => ['nullable','max:2550'],
            'body' => ['nullable'],
        ];
    }
}
