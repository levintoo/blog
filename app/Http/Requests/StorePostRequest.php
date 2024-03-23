<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required','max:255'],
            'tag' => ['required','max:255'],
            'slug' => ['required','unique:posts','max:255'],
            'description' => ['required','max:2550'],
            'body' => ['required'],
            'image' => ['required','mimes:svg,png,webp,jpg,jpeg'],
        ];
    }
}
