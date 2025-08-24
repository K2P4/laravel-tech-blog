<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:5120',
            'slug' => ['required', 'string', 'max:300', Rule::unique('blogs', 'slug')->ignore($this->blog->id)],
            'intro' => 'nullable|string|max:200',
            'body' => 'required|string',
        ];
    }
}
