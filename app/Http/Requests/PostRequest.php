<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $rules = [
            'title' => 'required',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|array|exists:categories,id',
            'status' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
        ];
        if($this->method() == 'POST'){
            $rules['image'] = 'required|image|mimes:png,jpg';
        }else{
            $rules['image'] = 'nullable|image|mimes:png,jpg';
        }
        return $rules;
    }
}
