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
     * @return void
     */
    protected function prepareForValidation(): void
    {
        parent::prepareForValidation();

        $post = Post::where('slug', $this->input('slug'))->first();

        if ($post) {
            $this->merge([
                'id' => $post->id,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable','max:255'],
            'tag' => ['nullable','max:255'],
            'slug' => ['nullable','max:255', Rule::unique('posts')->ignore($this->id)],
            'description' => ['nullable','max:2550'],
            'body' => ['nullable'],
            'image' => ['nullable','mimes:svg,png,webp,jpg,jpeg'],
        ];
    }
}
