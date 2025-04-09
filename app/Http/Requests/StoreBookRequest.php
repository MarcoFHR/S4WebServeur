<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class StoreBookRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],

            'year' => ['required', 'integer'],
            'price' => ['required', 'integer'],

            'author_id' => ['required', 'integer'],
        ];
    }

    public function messages(){
      return[
        'title.required' => 'Le titre est requis.'
      ];
    }

    public function prepareForValidation(){
      $this->merge([
        'is_published' => $this->has('is_published') ? 1 : 0
      ]);
    }
}
